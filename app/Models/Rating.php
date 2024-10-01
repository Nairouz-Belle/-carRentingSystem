<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'rating',
        'review',
        'vehicule_id',
        'users_id',
    ];
    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class,'users_id');
    }
}
