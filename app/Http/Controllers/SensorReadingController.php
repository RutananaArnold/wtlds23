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
        $sensor1 =$request->input('sensor1Reading');
        $sensor2 =$request->input('sensor2Reading');
        $incident =$request->input('incidentDetected');
        $deviceId =$request->input('device_id');

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
        $device->valveStatus = ($incident == 1) ? '1' : '0'; // 1  dectection , 0 for  no detection
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

        //query the devices table for the status you will send back to arduino
    
            $result = DB::table('your_table_name')
                        ->select('valveStatus')
                        ->where('id', $deviceId)
                        ->first();

            if ($result) {
                $value = $result->valveStatus;
            } else {
                $value = null; // No record found with the given ID
            }

          return "<?php echo $value; ?>";

    }
}
