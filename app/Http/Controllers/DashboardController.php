<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Material;
use App\Models\Menu;
use App\Models\Leave;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $active_karyawans = User::where('role_id', 2)->where("status", 1)->get();
        $all_karyawan = User::where('role_id', 2)->get();
        $materials = Material::get();
        $menus = Menu::get();
        $leaves = Leave::get();

        //Tampilan index di dalam folder dashboard
        return view('dashboard.index', [
            "title" => env("APP_NAME") . " - Dashboard",
            "page_title" => "Dashboard",
            "body_class" => "bg-primary",
            "karyawans" => $all_karyawan,
            "total_karyawan" => count($all_karyawan),
            "materials" => $materials,
            "total_material" => count($materials),
            "menus" => $menus,
            "total_menu" => count($menus),
            "total_active_karyawan" => count($active_karyawans),
            "leaves" => $leaves,
            "total_leave" => count($leaves)
        ]);
    }
}
