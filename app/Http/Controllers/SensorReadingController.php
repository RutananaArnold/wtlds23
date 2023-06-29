<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorReading;
use App\Models\Device;
use App\Models\Notification;
use Illuminate\Support\Facades\Notification as LaravelNotification;
use App\Notifications\IncidentDetectedNotification;
use App\Models\User;

class SensorReadingController extends Controller
{
    public function store(Request $request)
    {
        $sensor1 = $request->input('sensor1_reading');
        $sensor2 = $request->input('sensor2_reading');
        $incident = $request->input('incident_detected');
        $deviceId = $request->input('device_id');

        // Create a new SensorReading instance with the provided data
        $sensorReading = new SensorReading([
            'device_id' => $request->device_id,
            'sensor1' => $request->sensor1_reading,
            'sensor2' => $request->sensor2_reading,
            'date' => now()->format('Y-m-d'),
            'time' => now()->format('H:i:s'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $sensorReading->save();

        // Update the device status in the "devices" table
        $device = Device::find($deviceId);
        $device->status = ($incident == 1) ? 'off' : 'on';
        $device->save();

        // Generate notification if incident detected
        if ($incident == 1) {
            // Create a new notification in the "notifications" table
            $notification = Notification::create([
                'device_id' => $deviceId,
                'message' => 'Incident detected!',
                'time' => now()->format('H:i:s'),
                'date' => now()->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            
             // Broadcast the notification event
             event(new NotificationEvent($notification));
           
        }

        return response()->json(['message' => 'Sensor readings stored successfully']);
    }
}
