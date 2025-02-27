<?php

namespace App\Http\Controllers;

use App\Models\MenuRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MenuRecipeController extends Controller
{
    public function create(Request $request, $menu_id) {
        $user_id = Auth::id();

        if($request->method() == "POST") {
            $result = MenuRecipe::create([
                'menu_id' => $menu_id,
                'material_id' => $request->bahan,
                'weight' => $request->weight,
                'unit' => $request->unit,
            ]);
            if($result) {
                return redirect()->route('menu.show', $menu_id);
            } else {
                return back()->withInput()->with('failed','Gagal menambahkan Menu!');
            }
        }
    }

    public function edit(Request $request, $menu_id) {
        if($request->method() == "POST") {
            $menu_recipe = MenuRecipe::where("id", $request->menu_recipe_id)->first();
            $menu_recipe->material_id = $request->bahan;
            $menu_recipe->weight = $request->weight;
            $menu_recipe->unit = $request->unit;
            $result = $menu_recipe->save();

            if($result) {
                return redirect()->route('menu.show', $menu_id);
            } else {
                return back()->withInput()->with('failed','Gagal menambahkan Menu!');
            }
        }
    }
}
