<?php

namespace App\Http\Controllers;

use App\Models\MenuImages;
use App\Models\MenuRecipe;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\MaterialPurchaseHistory;

class MaterialPurchaseHistoryController extends Controller
{
    public function create(Request $request)
    {
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();

        if ($request->method() == "POST") {
            $validation = $request->validate([
                'material_id' => 'required',
                'invoice' => 'required',
                'unit' => 'required',
                'price' => 'required',
                'weight' => 'required',
            ]);

            $result = MaterialPurchaseHistory::create([
                'material_id' => $request->material_id,
                'invoice' => $request->invoice,
                'unit' => $request->unit,
                'price' => $request->price,
                'weight' => $request->weight,
                'store_name' => $request->store_name ?: "",
                'store_details' => $request->store_details ?: "",
                'invoice' => CommonFunction::uploadFiles($request->file('invoice'), "INVOICE"),
            ]);

            if (!$result) {
                return back()->withInput()->with('failed', 'Gagal menambahkan Menu!');
            }
            return redirect()->route('material.show', $request->material_id);
        }
    }

    public function delete($material_purchase_history_id)
    {
        $material_purchase_history = MaterialPurchaseHistory::where("id", $material_purchase_history_id)->delete();
        return redirect()->route('material.show', $$material_purchase_history->material_id);
    }
}
