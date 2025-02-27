<?php

namespace App\Http\Controllers;

use App\Models\MenuImages;
use App\Models\MenuRecipe;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Material;
use App\Models\Menu;
use App\Models\MenuCategory;

class MenuController extends Controller
{
    public function index() {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $menus = Menu::get();

        return view('menu.index', [
            "title" => env("APP_NAME") . " - Manage Menu",
            "page_title" => "Manage Menu",
            "menus" => $menus,
            "user_id" => $user_id
        ]);
    }

    public function show(Request $request, $menu_id) {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $menu = Menu::where('id', $menu_id)->first();
        $menu_images = MenuImages::where('menu_id', $menu_id)->get();
        $materials = Material::get();
        $menu_recipes = MenuRecipe::where('menu_id', $menu_id)->get();
        $units = Unit::get();

        $total_cost = 0;
        foreach($menu_recipes as $menu_recipe) {
            $menu_recipe["total_cost"] = ($menu_recipe->convertWeight($menu_recipe->weight, $menu_recipe->unit, $menu_recipe->material->weight, $menu_recipe->material->unit) * $menu_recipe->material->price);
            $total_cost += $menu_recipe["total_cost"];
        }

        return view('menu.view', [
            "title" => env("APP_NAME") . " - Manage Menu",
            "page_title" => "Manage Menu",
            "menu" => $menu,
            "menu_images" => $menu_images,
            "menu_recipes" => $menu_recipes,
            "materials" => $materials,
            "units" => $units,
            "total_cost" => $total_cost,
            "user_id" => $user_id
        ]);
    }

    public function create(Request $request) {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $menu_categories = MenuCategory::get();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                    'name' => 'required',
                    'menu_category_id' => 'required',
                    'image-multiple' => 'required',
                    'description' => 'required',
            ]);

            $result = Menu::create([
                'name' => $request->name,
                'menu_category_id' => $request->menu_category_id,
                'description' => $request->description ?: "",
            ]);
            $image_paths = CommonFunction::uploadFiles($request->file('image-multiple'), "MENU_IMAGE");
            foreach($image_paths as $image) {
                MenuImages::create([
                    "menu_id" => $result->id,
                    "path" => $image
                ]);
            }

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan Menu!');
            }
            return redirect('/resep')->with('success', 'Berhasil menambahkan Menu baru!');

        } else {
            return view('menu.create', [
                "title" => env("APP_NAME") . " - Manage Menu",
                "page_title" => "Create Data Menu",
                "user_id" => $user_id,
                "menu_categories" => $menu_categories
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
