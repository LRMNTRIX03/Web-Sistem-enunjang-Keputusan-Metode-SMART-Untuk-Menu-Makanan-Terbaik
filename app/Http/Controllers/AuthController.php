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
public function resetPassword(){
    try {
        $user = User::where('username', 'admin')->first();

        if (!$user) {
            return back()->with('error', 'Pengguna admin tidak ditemukan!');
        }

        $user->password = Hash::make('admin'); // pasti beda kalau pakai random salt
        $user->name = 'admin12';
        $user->save();

        return back()->with('success', 'Reset Password Berhasil !');
    } catch (\Exception $e) {
        return back()->with('error', 'Reset Password Gagal! Error: ' . $e->getMessage());
    }
}

    public function ChangePassword(Request $request){
        $validate = $request->validate([
            'password' => 'required',
            'password_baru' => 'required',
            'password_confirmation' => 'required|same:password_baru',
            
        ]);
        try{
            if($validate['password_baru'] == $validate['password_confirmation'] && Hash::check($validate['password'], Auth::user()->password)){
            User::where('name', 'admin')->update([
                'password' => Hash::make($validate['password_baru'])
            ]);
            return back()->with('success', 'Change Password Berhasil !');
        }
        }
        catch(\Exception $e){
            return back()->with('error', 'Change Password Gagal !');
        }
    }
    public function passwordView(){
        $title = 'Change Password';
        $style = 'css/dashboard.css';
        return view('changePassword', compact('title', 'style'));
    }
}
