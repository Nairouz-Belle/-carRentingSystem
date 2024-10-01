<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'image',
        'brand',
    ];
    public function vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class);
    }
}
