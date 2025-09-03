<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CombinedMaterial extends Model
{
    protected $table = 'combined_materials';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'material_id',
        'material_combined',
        'weight',
        'unit'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, "material_combined");
    }
}
