<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\Http\Requests\StoreReadingRequest;
use App\Http\Requests\UpdateReadingRequest;
use Illuminate\Http\Request;
use DB;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'sensor1Reading' => ['required', 'string', 'max:255'],
            'sensor2Reading' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:255'],
        ]);
    }

    public function create(Request $request)
    {

        DB::table('readings')->insert([
            'device_id'=>1,
            'sensor1Reading'=>$request->sensor2Reading,
            'sensor2Reading'=>$request->sensor2Reading,
            'date'=>$request->date,
            'time'=>$request->time,

        ]);
        return back()->with('reports_and_analytics.addReading', 'Reading added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReadingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReadingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function show(Reading $reading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function edit(Reading $reading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReadingRequest  $request
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReadingRequest $request, Reading $reading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reading $reading)
    {
        //
    }
}
