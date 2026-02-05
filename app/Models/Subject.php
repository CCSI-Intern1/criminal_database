<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
    ];

    /**
     * The user that owns the subject.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
