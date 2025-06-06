<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Material;
use App\Models\Menu;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $karyawans = User::where('role_id', 2)->where("status", 1)->get();
        $materials = Material::get();
        $menus = Menu::get();

        //Tampilan index di dalam folder dashboard
        return view('dashboard.index', [
            "title" => env("APP_NAME") . " - Dashboard",
            "page_title" => "Dashboard",
            "body_class" => "bg-primary",
            "karyawans" => $karyawans,
            "materials" => $materials,
            "menus" => $menus
        ]);
    }
}
