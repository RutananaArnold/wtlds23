<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\User;
use App\Models\DeviceStatus;
use App\Models\Notifications;
use DB;
use App\Models\Reading;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_devices = Devices::paginate();
        $active_devices =DB::table('device_statuses')->where('status', '=', "active")->get();
        $inactive_devices =DB::table('device_statuses')->where('status', '!=', "active")->get();
        $incidents =DB::table('notifications')->get();

        $sensorReadings = Reading::orderBy('created_at')
        ->get();
    $labels = $sensorReadings->pluck('time');
    $sensor1Data = $sensorReadings->pluck('sensor1Reading');
    $sensor2Data = $sensorReadings->pluck('sensor2Reading');


    $notifications = Notifications::select(
        DB::raw('DATE(created_at) as date1'),
        DB::raw('COUNT(*) as count')
    )
    ->groupBy('date1')
    ->get();

     $ilabels = $notifications->pluck('date1')->toArray();
     $counts = $notifications->pluck('count')->toArray();
    return view('home', compact('total_devices', 'active_devices', 'inactive_devices', 'incidents', 'sensor1Data', 'sensor2Data', 'labels', 'ilabels', 'counts'));

    }
}
