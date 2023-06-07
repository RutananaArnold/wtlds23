<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
            return view('devices.ViewOnMap');
    }
    
}
