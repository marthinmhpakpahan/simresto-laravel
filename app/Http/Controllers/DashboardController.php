<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        //Tampilan index di dalam folder dashboard
        return view('dashboard.index', [
            "title" => env("APP_NAME") . " - Dashboard",
            "page_title" => "Dashboard"
        ]);
    }
}
