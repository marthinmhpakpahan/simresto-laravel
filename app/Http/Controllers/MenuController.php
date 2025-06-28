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
    public function index()
    {
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

    public function show(Request $request, $menu_id)
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $menu = Menu::where('id', $menu_id)->first();
        $menu_images = MenuImages::where('menu_id', $menu_id)->get();
        $materials = Material::get();
        $menu_recipes = MenuRecipe::where('menu_id', $menu_id)->get();
        $units = Unit::get();

        $total_cost = 0;
        foreach ($menu_recipes as $menu_recipe) {
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

    public function create(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $menu_categories = MenuCategory::get();

        if ($request->method() == "POST") {
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
            foreach ($image_paths as $image) {
                MenuImages::create([
                    "menu_id" => $result->id,
                    "path" => $image
                ]);
            }

            if (!$result) {
                return back()->withInput()->with('failed', 'Gagal menambahkan Menu!');
            }
            return redirect('/menu')->with('success', 'Berhasil menambahkan Menu baru!');
        } else {
            return view('menu.create', [
                "title" => env("APP_NAME") . " - Manage Menu",
                "page_title" => "Create Data Menu",
                "user_id" => $user_id,
                "menu_categories" => $menu_categories
            ]);
        }
    }

    public function edit(Request $request, $menu_id)
    {
        $menu = Menu::where('id', $menu_id)->first();
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $menu_categories = MenuCategory::get();

        if ($request->method() == "POST") {
            $credentials = $request->validate([
                "name" => "required",
                'menu_category_id' => 'required',
                "description" => "required",
            ]);

            $menu->name = $request->name;
            $menu->menu_category_id = $request->menu_category_id;
            $menu->description = $request->description;

            if ($request->file('image-multiple')) {
                $image_paths = CommonFunction::uploadFiles($request->file('image-multiple'), "MENU_IMAGE");
                // delete all images first
                foreach ($image_paths as $image) {
                    MenuImages::create([
                        "menu_id" => $menu->id,
                        "path" => $image
                    ]);
                }
            }

            $result = $menu->save();

            if (!$result) {
                return back()->withInput()->with('failed', 'Gagal mengubah Menu!');
            }
            return redirect('/menu')->with('success', 'Berhasil mengubah Menu!');
        } else {
            return view('menu.edit', [
                "title" => env("APP_NAME") . " - Edit Menu",
                "page_title" => "Edit Data Menu",
                "menu" => $menu,
                "menu_categories" => $menu_categories
            ]);
        }
    }

    public function delete($karyawan_id)
    {
        $karyawan = User::where('id', $karyawan_id)->first();
        $karyawan->status = 0;
        $karyawan->save();
        return redirect('/karyawan')->with('success', 'Berhasil menghapus data karyawan!');
    }
}
