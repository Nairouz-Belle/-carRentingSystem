<?php

namespace App\Models;
use App\Models\Vehicule;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [

        'carName',
        'carPic',
        'fuelType',
        'seating',
        'airbags',
        'engine',
        'color',
        'productionYear',
        'price',
        'transmission',
        'description',
        'status',
        'category_id',
        'image',
        'shape',
        'type',
        'km',
        'vin',
        'LicensePlate',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function discount()
    {
        return $this->hasOne(Discount::class);
    }
}
