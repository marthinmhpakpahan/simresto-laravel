<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'user_id',
        'started_at',
        'finished_at',
        'started_path',
        'finished_path',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, foreignKey: "user_id");
    }
}
