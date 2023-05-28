<?php

namespace App\Http\Controllers;

use App\Models\DeviceStatus;
use App\Http\Requests\StoreDeviceStatusRequest;
use App\Http\Requests\UpdateDeviceStatusRequest;

class DeviceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('devices.deviceStatus');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
