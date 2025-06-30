<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MaterialPurchaseHistory extends Model
{
    protected $table = 'material_purchase_history';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'material_id',
        'store_name',
        'store_details',
        'invoice',
        'unit',
        'price',
        'weight'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, "material_id");
    }
}
