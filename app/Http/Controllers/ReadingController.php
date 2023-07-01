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

class ReadingController extends Controller
{
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
        DB::table('readings')->insert([
            'device_id' =>(int)$request->device_id,
            'sensor1Reading' => (float)$request->sensor1Reading,
            'sensor2Reading' => (float)$request->sensor2Reading,
            'date' => Carbon::now()->format('y-m-d'),
            'time' => Carbon::now()->format('h:i:s'),
        ]);
         // Update the device status in the "devices" table
         $deviceId = (int)$request->device_id;
        $device = Devices::find($deviceId);
        $incident = (int)$request->incidentDetected;
        $device->valveStatus = ($incident == 1) ? 'off' : 'on';
        $device->save();

        // Generate notification if incident detected
        if ($incident == 1) {
            // Create a new notification in the "notifications" table
            $notification = Notifications::create([
                'device_id' => $deviceId,
                'title' => 'Incident detected!',
                'message' => 'Incident detected on ' . $device->name . ' deployed in ' . $device->deploymentLocation,
                'time' => now()->format('H:i:s'),
                'date' => now()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

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