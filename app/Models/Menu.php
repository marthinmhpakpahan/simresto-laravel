<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'menu_category_id',
        'name',
        'description'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function menu_category(): BelongsTo
    {
        return $this->belongsTo(MenuCategory::class, "menu_category_id");
    }
}
