<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function changePassword()
    {
       return view('auth.change-password');
    }
    public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'email'=>'required',
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);


            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }
// dd($request->email);

            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'email'=>$request->email,
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("status", "Password changed successfully!");
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('Admin.index');
    }
}
