<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use Illuminate\Http\Request;
use App\Models\Reading;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Notifications;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $readings = Reading::paginate();

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
        return view('reports_and_analytics.analytics', compact('readings', 'sensor1Data', 'sensor2Data', 'labels', 'ilabels', 'counts'));


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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function show(Analytics $analytics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function edit(Analytics $analytics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analytics $analytics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analytics $analytics)
    {
        //
    }
}