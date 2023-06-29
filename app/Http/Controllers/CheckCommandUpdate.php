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
        $deviceId = $request->device_id;
        
        // Retrieve the corresponding device from the database
        $device = Devices::where('id', $deviceId)->first();
        if ($device) {
             // Return the response to the Arduino
            return response("open_valve");
                
        }    
            
    }

}
