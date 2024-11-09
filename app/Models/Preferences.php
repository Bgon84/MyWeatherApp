<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Preferences extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'favorite_location',
        'temp_metric',
        'pressure_millibar',
        'wind_metric',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
