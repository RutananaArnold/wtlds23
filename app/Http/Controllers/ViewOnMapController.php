<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Devices;
use DB;

class ViewOnMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinates = Devices::all();
            return view('devices.ViewOnMap', compact('coordinates'));
    }
    
}
