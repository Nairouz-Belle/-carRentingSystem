<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'method',
        'status',
        'reservation_id',
        'amount',
    ];


public function reservation(): HasOne
    {
        return $this->hasOne(Reservation::class);
    }
public function user(): BelongsTo
{
    return $this->belongsTo(User::class,'user_id');
}

public function added_by(): BelongsTo
{
    return $this->belongsTo(User::class,'created_by');
}
public function vehicule(): BelongsTo
{
    return $this->belongsTo(Vehicule::class,'vehicule_id');
}
}
