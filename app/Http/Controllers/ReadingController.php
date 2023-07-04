<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\Http\Requests\StoreReadingRequest;
use App\Http\Requests\UpdateReadingRequest;
use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Notifications;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;


class ReadingController extends Controller
{

    private $SMS_URL;
    private $SMS_USERNAME;
    private $SMS_PASSWORD;

    public function __construct()
    {
        $this->SMS_URL = config('app.SMS_API_URL');
        $this->SMS_USERNAME = config('app.SMS_USERNAME');
        $this->SMS_PASSWORD = config('app.SMS_PASSWORD');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'sensor1Reading' => ['required', 'float', 'max:255'],
            'sensor2Reading' => ['required', 'float', 'max:255'],
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'device_id' => 'required|integer',
            'sensor1Reading' => 'required|string',
            'sensor2Reading' => 'required|string',
            'incidentDetected' => 'required|string'
        ]);

        DB::table('readings')->insert([
            'device_id' =>(int)$request->device_id,
            'sensor1Reading' => (float)$request->sensor1Reading,
            'sensor2Reading' => (float)$request->sensor2Reading,
            'date' => Carbon::now()->format('y-m-d'),
            'time' => Carbon::now()->format('h:i:s'),
        ]);
        $deviceId = (int)$request->device_id;
        $device = Devices::find($deviceId);
        $incident = (int)$request->incidentDetected;
        // Generate notification if incident detected
        if ($incident == 1) {
            //the status changes
            // Update the device status in the "devices" table
           if(!$device)
           {
            return response()->json("No device found with given ID!", 404);
           }
            $device->valveStatus ='off';
            $device->save();
            // Create a new notification in the "notifications" table

            $notification = new Notifications();
            $notification->device_id = $deviceId;
            $notification->title = 'Incident detected!';
            $notification->message = 'Incident detected on ' . $device->name . ' deployed in ' . $device->deploymentLocation;
            $notification->time = now()->format('H:i:s');
            $notification->date = now()->format('Y-m-d');
            $notification->save();

            // send sms to the logged in user

            $users = DB::table('users')->get();

            $sms_responses = array();

            foreach($users as $user)
            {

                $response = Http::withOptions([
                    'verify' => false,
                ])->get($this->SMS_URL,[
                    "user" => $this->SMS_USERNAME,
                    "password"=> $this->SMS_PASSWORD,
                    "sender"=> "SRES",
                    "message"=> $notification->message,
                    'reciever'=> $user->contact
                ]);

                array_push($sms_responses, $response);
            }


            return response()->json([
                'message' => 'Data inserted successfully. ',
                'responses' => $sms_responses], 201);
            
        }



        return response()->json(['message' => 'Data inserted successfully'], 201);

        //return back()->with('reports_and_analytics.addReading', 'Reading added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReadingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReadingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function show(Reading $reading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function edit(Reading $reading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReadingRequest  $request
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReadingRequest $request, Reading $reading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reading $reading)
    {
        //
    }
}