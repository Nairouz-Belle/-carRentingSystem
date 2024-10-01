<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Company extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'image',
        'companyName',
        'address',
        'phone',
        'email',
        'owner',
        'description',
        'siteweb',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];
}
