<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    protected $table = 'leave';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'user_id',
        'admin_id',
        'title',
        'start_date',
        'end_date',
        'description',
        'attachment',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, foreignKey: "user_id");
    }
}
