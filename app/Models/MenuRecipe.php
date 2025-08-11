<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuRecipe extends Model
{
    protected $table = 'menu_recipe';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'menu_id',
        'material_id',
        'unit',
        'weight'
    ];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, "menu_id");
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, "material_id");
    }

    public function convertWeight($total, $unit_source, $total_target, $unit_target) {
        if($unit_source == "KG" && $unit_target == "G") {
            $new_total = $total * 1000;
        } else if($unit_source == "OZ" && $unit_target == "G") {
            $new_total = $total * 100;
        } else if($unit_source == "KW" && $unit_target == "G") {
            $new_total = $total * 100000;
        } else if($unit_source == "T" && $unit_target == "G") {
            $new_total = $total * 1000000;
        } else if($unit_source == "G" && $unit_target == "MG") {
            $new_total = $total * 10;
        } else if($unit_source == "KG" && $unit_target == "MG") {
            $new_total = $total / 100000;
        } else if($unit_source == "MG" && $unit_target == "G") {
            $new_total = $total / 10;
        } else if($unit_source == "G" && $unit_target == "KG") {
            $new_total = $total / 1000;
        } else if($unit_source == "G" && $unit_target == "KW") {
            $new_total = $total / 100;
        } else if($unit_source == "L" && $unit_target == "ML") {
            $new_total = $total * 1000;
        } else if($unit_source == "ML" && $unit_target == "L") {
            $new_total = $total / 1000;
        } else {
            $new_total = $total;
        }

        return $new_total / $total_target;
    }
}
