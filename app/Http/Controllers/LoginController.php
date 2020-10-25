<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $remember = $request->remember == '1' ? true : false;

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $remember)){
            if(Auth::user()->role == "admin"){
                echo "ADMIN";
            }
            else if(Auth::user()->role == "staff"){
                echo "STAFF";
            }
            else if(Auth::user()->role == "client"){
                echo "CLIENT";
            }
        } else {
            return redirect()->route('login')->withErrors(['Invalid Email / Password']);
        }
    }
}
