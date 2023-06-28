<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $devices = Devices::paginate();
        $searchTerm = $request->input('search');

        if ($searchTerm){
            $device = Devices::where('name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('deploymentLocation', 'LIKE', '%' . $searchTerm . '%')
                ->get();
        
            return view('devices.devices', ['devices' => $device]);
        }

        return view('devices.devices', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'float'],
            'longitude' => ['required', 'float',],
            'deploymentLocation' => ['required', 'string', 'max:255'],
            'valveStatus' => ['required', 'string', 'max:255'],
            'openCommand' => ['required', 'string', 'max:255'],
        ]);
    }

    public function create(Request $request)
    {

        DB::table('devices')->insert([
            'user_id'=>$request->user()->id,
            'name'=>$request->name,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'deploymentLocation'=>$request->deploymentLocation,
            'valveStatus' => $request->valveStatus,
            'openCommand' => 'off',

        ]);
        return back()->with('devices.addDevice', 'Device added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function show(Devices $devices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function edit(Devices $devices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function update(Devices $device)
    {
        $device->valveStatus = '0';
        $device->save();
        if($device->save)
        {
             //generate a notification on valve closure
                // Create a new notification in the "notifications" table
                $notification = Notifications::create([
                    'device_id' => $deviceId,
                    'title' =>'valve-openning',
                    'message' => 'valve for'+$device->name,
                    'time' => now()->format('H:i:s'),
                    'date' => now()->format('Y-m-d'),
                    
                ]);
    
                 // Broadcast the notification event
                event(new ValveNotificationEvent($notification));
                
        }

        return redirect()->back()->with('success', 'Valve status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devices $devices)
    {
        //
    }

    public function open()
    {
        $devices = Devices::where('valveStatus', 'off')->get();

        return view('devices.openValve', compact('devices'));
    }
}
