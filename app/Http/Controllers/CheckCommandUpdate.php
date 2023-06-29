<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\Notifications;
use App\Events\ValveNotificationEvent;

class CheckCommandUpdate extends Controller
{
    
    public function checkUpdate(Request $request)
    {
        // Retrieve device ID from the request
        $deviceId = $request->input('device_id');
        
        // Retrieve the corresponding device from the database
        $device = Devices::where('id', $deviceId)->first();
        if ($device) {
            // Check if the valvestatus field is set to "closed" in the database
            if ($device->valveStatus === 'off') {
                
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
            $device->valveStatus = 'on'; // Update the valvestatus to "on"
            $device->save();
        
                // Return the response to the Arduino
               return response("open_valve");
                
            }
        }    
            
    }

}
