<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login() {
        return view('login', [
            "title" => env("APP_NAME") . " - Login"
        ]);
    }

    public function register() {
        return view('register', [
            "title" => env("APP_NAME") . " - Register"
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withInput()->with('failed','Login Failed!');
    }

    public function uploadFiles($file, $type) {
        $FOLDER_DESTINATION = [
            'PHOTO' => "assets/img/users/photos/",
            'ID_CARD' => "assets/img/users/id_cards/",
            "LOGO" => "assets/img/users/logos/"
        ];

		$file_extension = $file->getClientOriginalExtension();
		$folder_destination = $FOLDER_DESTINATION[$type];
        $destination_filename = str()->random(10) . "" . time() . "." . $file_extension;
		$file->move($folder_destination, $destination_filename);
        
        return $folder_destination . $destination_filename;
    }

    public function create(Request $request) {
        $user_type = "USER";
        $role_id = 3;
        $user_type_checkbox = $request->user_type;
        if($user_type_checkbox) {
            $user_type = "MITRA";
            $role_id = 2;
        }

        $rules = [
            "USER" => [
                'full_name' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password',
                'phone_no' => 'required',
                'photo' => 'required'
            ],
            "MITRA" => [
                'full_name' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8|same:password',
                'phone_no' => 'required',
                'photo' => 'required',
                'company_name' => 'required',
                'company_id_card' => 'required',
                'company_logo' => 'required',
                'company_address' => 'required',
                'company_description' => 'required'
            ]
        ];

        $credentials = $request->validate($rules[$user_type]);

        if($user_type == "MITRA") {
            $company = Company::create([
                'name' => $request->company_name,
                'description' => $request->company_description,
                'id_card_image_path' => $this->uploadFiles($request->file('company_id_card'), "ID_CARD"),
                'logo_image_path' => $this->uploadFiles($request->file('company_logo'), "LOGO"),
                'address' => $request->company_address
            ]);
        }

        $result = User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_no' => $request->phone_no,
            'photo' => $this->uploadFiles($request->file('photo'), "PHOTO"),
            "role_id" => $role_id,
            "company_id" => $user_type == "MITRA" ? $company->id : null
        ]);

        if(!$result) {
            return back()->withInput()->with('failed','Gagal mendaftarkan akun!');
        }
        return redirect('/login')->with('success', 'Berhasil mendaftarkan akun anda!');
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
