<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devices;
use App\Models\User;
use App\Models\DeviceStatus;
use App\Models\Notifications;
use DB;

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
        return view('home', compact('total_devices', 'active_devices', 'inactive_devices', 'incidents'));
    }
}
