<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuImages extends Model
{
    protected $table = 'menu_images';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'menu_id',
        'path',
    ];
}
