<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Material;
use App\Models\MaterialPurchaseHistory;
use App\Models\CombinedMaterial;
use App\Models\Unit;

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
                'image' => $request->file('image') ? CommonFunction::uploadFiles($request->file('image'), "MATERIAL_IMAGE") : "",
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

    public function edit(Request $request, $material_id) {
        $material = Material::where('id', $material_id)->first();
        $units = Unit::get();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                'name' => 'required',
                'weight' => 'required',
                'price' => 'required',
                'unit' => 'required'
            ]);

            $material->name = $request->name;
            $material->weight = $request->weight;
            $material->price = $request->price;
            $material->unit = $request->unit;
            $material->description = $request->description;

            if($request->file("image")) {
                $material->image = CommonFunction::uploadFiles($request->file('image'), "MATERIAL_IMAGE");
            }

            $result = $material->save();
            
            if(!$result) {
                return back()->withInput()->with('failed','Gagal mengubah data Bahan!');
            }
            return redirect('/bahan')->with('success', 'Berhasil mengubah data Bahan!');
        } else {
            return view('material.edit', [
                "title" => env("APP_NAME") . " - Edit Bahan",
                "page_title" => "Edit Data Bahan",
                "material" => $material,
                "units" => $units
            ]);
        }
    }

    public function show($material_id) {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();
        $material = Material::where('id', $material_id)->first();
        $material_purchase_histories = MaterialPurchaseHistory::where("material_id", $material_id)->orderBy('created_at', 'desc')->get();
        $materials = Material::get();
        
        $combined_materials = CombinedMaterial::where('material_id', $material_id)->get();
        $material_total_price = 0;
        $material_total_weight = 0;
        foreach($combined_materials as $index => $combined_material) {
            $new_price = 0;
            $new_unit = $combined_material->unit;
            $existing_unit = $combined_material->unit;
            $combined_materials[$index]['unit_label'] = CommonFunction::getFullNameUnit($existing_unit);
            $combined_materials[$index]['price'] = CommonFunction::calculateNewPrice($combined_material->material->price, $combined_material->material->weight, $combined_material->material->unit, $combined_material->weight, $combined_material->unit);

            $material_total_weight += $combined_material->weight;
            $material_total_price += $combined_material->price;
        }

        if($material_total_weight > 0) {
            $material->weight = $material_total_weight;
        }

        if($material_total_price > 0) {
            $material->price = $material_total_price;
        }

        $material->save();

        $units = Unit::get();

        return view('material.view', [
            "title" => env("APP_NAME") . " - Detail Bahan",
            "page_title" => "Detail Bahan",
            "material" => $material,
            "materials" => $materials,
            "material_purchase_histories" => $material_purchase_histories,
            "combined_materials" => $combined_materials,
            "units" => $units,
            "user_id" => $user_id
        ]);
    }

    public function create_combined_material(Request $request) {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();

        if($request->method() == "POST") {
            $credentials = $request->validate([
                    'material_id' => 'required',
                    'material_combined' => 'required',
                    'material_weight' => 'required',
                    'material_unit' => 'required',
            ]);

            $result = CombinedMaterial::create([
                'material_id' => $request->material_id,
                'material_combined' => $request->material_combined,
                'weight' => $request->material_weight,
                'unit' => $request->material_unit,
            ]);

            if(!$result) {
                return back()->withInput()->with('failed','Gagal menambahkan Bahan!');
            }
            return redirect()->route('material.show', $request->material_id);
        } else {
            return redirect()->route('material.show', $request->material_id);
        }
    }

    public function delete($material_id) {
        $material = Material::where("id", $material_id)->delete();
        return redirect()->route('material.index');
    }

    public function delete_combined_material($material_id, $combined_material_id) {
        $material = CombinedMaterial::where("id", $combined_material_id)->delete();
        return redirect()->route('material.show', $material_id);
    }
}
