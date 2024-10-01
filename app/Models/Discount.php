<?php

namespace App\Models;

use App\Models\Discount;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;
     protected $fillable = 
    [
        'code',
        'type',
        'discountAmount',
        'deadline',
        'status',
        'vehicle_id',
    ];
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicule::class,'vehicle_id');
    }
}
