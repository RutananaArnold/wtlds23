<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate();

        $searchTerm = $request->input('search');

        if ($searchTerm){
            $user = User::where('fname', 'LIKE', '%' . $searchTerm . '%')->orwhere('lname', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('role', 'LIKE', '%' . $searchTerm . '%')->orwhere('email', 'LIKE', '%' . $searchTerm . '%')
                ->get();
        
            return view('users.index', ['users' => $user]);
        }

        return view('users.index', compact('users'));
    }

    public function create(Request $request)
    {

        DB::table('users')->insert([
            'role'=>$request->role,
            'email'=>$request->email,
            'contact'=>$request->contact,
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'password' => Hash::make($request['password']),

        ]);
        return back()->with('users.index', 'Personnel Registerd successfully');
    }
}
