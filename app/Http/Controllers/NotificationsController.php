<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;
use DB;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notifications = Notifications::paginate();
        $searchTerm = $request->input('search');

        if ($searchTerm){
            $noti = Notifications::where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('date', 'LIKE', '%' . $searchTerm . '%')
                ->get();
        
            return view('notifications.notifications', ['notifications' => $noti]);
        }
        return view('notifications.notifications', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);
    }

    public function create(Request $request)
    {

        DB::table('notifications')->insert([
            'device_id'=>1,
            'title'=>$request->title,
            'message'=>$request->message,
            'date'=> date('y-m-d'),

        ]);
        return back()->with('notifications.addNotifications', 'Notification added successfully');
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
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function show(Notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notifications $notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notifications $notifications)
    {
        //
    }

    public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $noti = Notifications::where('title', 'LIKE', '%' . $searchTerm . '%')
        ->orWhere('date', 'LIKE', '%' . $searchTerm . '%')
        ->get();

    return view('notifications.notifications', ['notifications' => $noti]);
}
}
