<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckCommandUpdate extends Controller
{
    
    public function checkUpdate(Request $request)
    {
        // Retrieve device ID from the request
        $deviceId = $request->input('device_id');
        
        // Retrieve the corresponding device from the database
        $device = Device::where('id', $deviceId)->first();
        if ($device) {
            // Check if the valvestatus field is set to "open" in the database
            if ($device->openCommand === 'open') {
                
                $device->valvestatus = 'open'; // Update the valvestatus to "open"
                $device->openCommand= "closed";// update back the valve command to closed
                $device->save();

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
        
                // Return the response to the Arduino
                return response()->json([
                    'status' => 'success',
                    'message' => 'UNLOCK_SOLENOID',
                ]);
            }
        }        
    }

}
