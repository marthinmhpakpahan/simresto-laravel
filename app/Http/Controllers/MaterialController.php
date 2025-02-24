<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $materials = Material::get();

        return view('material.index', [
            "title" => env("APP_NAME") . " - Manage Bahan",
            "page_title" => "Manage Bahan",
            "materials" => $materials,
            "user_id" => $user_id
        ]);
    }

    public function create(Request $request) {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'weight' => 'required',
                    'unit' => 'required',
            ]);

            $result = Material::create([
                'name' => $request->name,
                'price' => $request->price,
                'weight' => $request->weight,
                'unit' => $request->unit,
                'image' => CommonFunction::uploadFiles($request->file('image'), "MATERIAL_IMAGE"),
                'description' => $request->description ?: "",
            ]);

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan Bahan!');
            }
            return redirect('/bahan')->with('success', 'Berhasil menambahkan Bahan baru!');

        } else {
            return view('material.create', [
                "title" => env("APP_NAME") . " - Manage Bahan",
                "page_title" => "Create Data Bahan",
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
