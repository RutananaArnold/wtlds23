<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Devices;
use App\Models\Notifications;
use Illuminate\Support\Facades\Notification as LaravelNotification;
use App\Events\NotificationEvent;
use App\Models\Reading;

class SensorReadingController extends Controller
{
    public function store(Request $request)
    {
        $sensor1 = $request->input('sensor1');
        $sensor2 = $request->input('sensor2');
        $incident = $request->input('status');
        $deviceId = $request->input('device_id');

        // Create a new SensorReading instance with the provided data
        $Reading = new Reading([
            'device_id' => $deviceId,
            'sensor1Reading' => $sensor1,
            'sensor2Reading' => $sensor2,
            'date' => now()->format('Y-m-d'),
            'time' => now()->format('H:i:s'),
            
            
        ]);

        $Reading->save();

        // Update the device status in the "devices" table
        $device = Devices::find($deviceId);
        $device->valveStatus = ($incident == 1) ? 'closed' : 'open';
        $device->save();

        // Generate notification if incident detected
        if ($incident == 1) {
            // Create a new notification in the "notifications" table
            $notification = Notifications::create([
                'device_id' => $deviceId,
                'title' =>'incident',
                'message' => 'Incident detected!',
                'time' => now()->format('H:i:s'),
                'date' => now()->format('Y-m-d'),
                
            ]);

        
             // Broadcast the notification event
             event(new NotificationEvent($notification));
           
        }

        return response()->json(['message' => 'Sensor readings stored successfully']);
    }
}
