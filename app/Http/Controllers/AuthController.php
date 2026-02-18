<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        $title = 'Login';
        $style = 'css/auth.css';
        return view('auth.login', compact('title', 'style'));
    }
    public function login(Request $request){
        $credentials = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        try{
        if($credentials){
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->route('user.dashboard');
            }
            else{
                return back()->with('error', 'Login Gagal !');
            }
        }
    }
    catch(\Exception $e){
        return back()->with('error', 'Login Gagal !');
    }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
}
