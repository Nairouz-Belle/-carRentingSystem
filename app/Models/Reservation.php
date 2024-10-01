<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicule;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Reservation extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'borrow',
        'return',
        'price',
        'fine',
        'returned',
        'penalty',
        'status',
        'vehicule_id',
        'discountCode',
        'user_id',
        'Paiementstatus',
        'created_by',
    ];

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

public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class,'reservation_id');
    }
}

