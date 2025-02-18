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
        $karyawans = User::where('role_id', 2)->where("status", 1)->get();

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
                "page_title" => "Create Data karyawan",
                "user_id" => $user_id,
            ]);
        }
    }

    public function edit(Request $request, $karyawan_id) {
        $karyawan = User::where('id', $karyawan_id)->first();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                    'full_name' => 'required',
                    'username' => 'required',
                    'phone_no' => 'required',
                    'email' => 'required',
                    'salary' => 'required',
                    'joined_since' => 'required',
            ]);

            $karyawan->full_name = $request->full_name;
            $karyawan->username = $request->username;
            $karyawan->phone_no = $request->phone_no;
            $karyawan->email = $request->email;
            if($request->file("photo")) {
                $karyawan->photo = CommonFunction::uploadFiles($request->file('photo'), "PHOTO");
            }
            if($request->file("identity_card")) {
                $karyawan->identity_card = CommonFunction::uploadFiles($request->file('identity_card'), "IDENTITY_CARD");
            }
            $karyawan->password = $request->password;
            $karyawan->salary = $request->salary;
            $karyawan->joined_since = $request->joined_since;
            $result = $karyawan->save();

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan karyawan!');
            }
            return redirect('/karyawan')->with('success', 'Berhasil menambahkan karyawan anda!');

        } else {
            return view('karyawan.edit', [
                "title" => env("APP_NAME") . " - Manage karyawan",
                "page_title" => "Edit Data Karyawan",
                "karyawan" => $karyawan
            ]);
        }
    }

    public function delete($karyawan_id) {
        $karyawan = User::where('id', $karyawan_id)->first();
        $karyawan->status = 0;
        $karyawan->save();
        return redirect('/karyawan')->with('success', 'Berhasil menghapus data karyawan!');
    }
}
