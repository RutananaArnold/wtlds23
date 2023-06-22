<?php

namespace App\Http\Controllers;

use App\Models\DeviceStatus;
use App\Http\Requests\StoreDeviceStatusRequest;
use App\Http\Requests\UpdateDeviceStatusRequest;
use Illuminate\Http\Request;
use DB;

class DeviceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = DeviceStatus::paginate();

        return view('devices.deviceStatus', compact('statuses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'status' => ['required', 'string', 'max:255'],
        ]);
    }

    public function create(Request $request)
    {

        DB::table('device_statuses')->insert([
            'device_id'=>1,
            'date'=> date('y-m-d'),
            'time'=> date('h:i:s'),
            'status'=>$request->status,
        ]);
        return back()->with('devices.addDeviceStatus', 'Status Updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeviceStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeviceStatus  $deviceStatus
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceStatus $deviceStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceStatus  $deviceStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceStatus $deviceStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceStatusRequest  $request
     * @param  \App\Models\DeviceStatus  $deviceStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceStatusRequest $request, DeviceStatus $deviceStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeviceStatus  $deviceStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceStatus $deviceStatus)
    {
        //
    }
}
