<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            
        'name'=>['required', 'string', 'max:255'],
        'gender'=> ['required', 'string', 'max:255'],
        'address'=> ['required', 'string', 'max:255'],
        'phone'=> ['required', 'string', 'max:255'],
        'type'=> ['string', 'max:255'],
        'is_verified'=> ['string', 'max:255'],
        'birthDate'=> ['required', 'string', 'max:255'],
        'ProfilePic'=> ['string', 'max:255'],
        'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
        'password'=> ['required', 'string', 'min:8', 'confirmed'],
        'LicenseDoc'=> ['string', 'max:255'],
        'IDLicenseDate'=> ['string', 'max:255'],
        'IDLicenseExpiry'=> ['string', 'max:255'],
        'IDLicense'=> ['string', 'max:255'],
        'IDPassport'=> ['string', 'max:255'],
        'IDPassportDate'=> ['string', 'max:255'],
        'IDPassportExpiry'=> ['string', 'max:255'],
        'PassportDoc'=> ['string', 'max:255'],
        


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
        'name'=> $data['name'],
        'password' => Hash::make($data['password']),
        'gender'=> $data['gender'],
        'address'=> $data['address'],
        'phone'=> $data['phone'],
        'type'=> $data['type'],
        'birthDate'=> $data['birthDate'],
        'ProfilePic'=> $data['ProfilePic'],
        'email'=> $data['email'],
        'LicenseDoc'=> $data['LicenseDoc'],
        'IDLicenseDate'=> $data['IDLicenseDate'],
        'IDLicenseExpiry'=> $data['IDLicenseExpiry'],
        'IDLicense'=> $data['IDLicense'],
        'IDPassport'=> $data['IDPassport'],
        'IDPassportDate'=> $data['IDPassportDate'],
        'IDPassportExpiry'=> $data['IDLicenseExpiry'],
        'PassportDoc'=> $data['PassportDoc'],
        'is_verified'=> $data['is_verified'],
        ]);
    }
}
