<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Vehicule;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'gender',
        'address',
        'phone',
        'type',
        'birthDate',
        'ProfilePic',
        'email',
        'LicenseDoc',
        'IDLicenseDate',
        'IDLicenseExpiry',
        'IDLicense',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = 
    [
        'email_verified_at' => 'datetime',
    ];

    public function getRedirectRoute()
    {
        return match((int)$this->type) {
            'customer' => '',
            'manager'  => 'Manager.Dashboard.dashboard',
            'admin' => 'admin.Dashboard.dashboard'
        };
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
    
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
    public function vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class);
    }

}
