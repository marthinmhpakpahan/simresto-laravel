<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login() {
        return view('user.login', [
            "title" => env("APP_NAME") . " - Login"
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            $user_id = Auth::id();
            $user = User::where('id', $user_id)->first();
            if($user->role_id == 1) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->route("karyawan.attendance");
            }
        }

        return back()->withInput()->with('failed','Login Failed!');
    }

    public function profile() {
        return view('user.profile', [
            "title" => env("APP_NAME") . " - Profile",
            "page_title" => "Profil",
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
