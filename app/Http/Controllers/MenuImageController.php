<?php

namespace App\Http\Controllers;

use App\Models\MenuImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MenuImageController extends Controller
{
    public function delete($menu_id, $menu_image_id) {
        $menu_image = MenuImages::where('id', $menu_image_id)->delete();
        return redirect()->route('menu.show', $menu_id);
    }
}
