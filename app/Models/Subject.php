<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'case_status',
        'case',
        'court',
        'additional_info',
    ];

    /**
     * The user that owns the subject.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'owner_id');
    }
}
