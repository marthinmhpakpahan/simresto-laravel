<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $karyawans = User::where('role_id', 2)->get();

        return view('karyawan.index', [
            "title" => env("APP_NAME") . " - Manage karyawan",
            "page_title" => "Manage karyawan",
            "karyawans" => $karyawans,
            "user_id" => $user_id
        ]);
    }

    public function create(Request $request) {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                    'full_name' => 'required',
                    'username' => 'required',
                    'phone_no' => 'required',
                    'email' => 'required',
                    'photo' => 'required',
                    'identity_card' => 'required',
                    'password' => 'required',
                    'confirm_password' => 'required',
                    'salary' => 'required',
                    'joined_since' => 'required',
            ]);

            $result = User::create([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'phone_no' => $request->phone_no,
                'email' => $request->email,
                'photo' => CommonFunction::uploadFiles($request->file('photo'), "PHOTO"),
                'identity_card' => CommonFunction::uploadFiles($request->file('identity_card'), "IDENTITY_CARD"),
                'password' => Hash::make($request->password),
                'salary' => $request->salary,
                'joined_since' => $request->joined_since,
            ]);

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan karyawan!');
            }
            return redirect('/karyawan')->with('success', 'Berhasil menambahkan karyawan anda!');

        } else {
            return view('karyawan.create', [
                "title" => env("APP_NAME") . " - Manage karyawan",
                "page_title" => "Manage karyawan",
                "user_id" => $user_id,
            ]);
        }
    }
}
