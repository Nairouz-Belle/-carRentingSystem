<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'User Users',
               'gender'=>'male',
               'address'=>'Address',
               'phone'=>'75521489',
               'type'=>'user',
               'is_verified'=>1,
               'birthDate'=>'2024-11-9',
               'ProfilePic'=>'pic.png',
               'email'=>'user@user.com',
               'password'=> bcrypt('123456'),
               'IDLicense'=>'123456789',
               'IDLicenseDate'=>'2024-11-9',
               'IDLicenseExpiry'=>'2024-11-9',
               'LicenseDoc'=>'2024-11-9',
               'IDPassport'=>'123456789',
               'IDPassportDate'=>'2024-11-9',
               'IDPassportExpiry'=>'2024-11-9',
               'PassportDoc'=>'2024-11-9',
           ],

           [
               'name'=>'Manager Managers',
               'gender'=>'male',
               'address'=>'Address',
               'phone'=>'755217489',
               'type'=>'manager',
               'is_verified'=>1,
               'birthDate'=>'2024-11-9',
               'ProfilePic'=>'pic.png',
               'email'=>'manager@manager.com',
               'password'=> bcrypt('123456'),
               'IDLicense'=>'1234576789',
               'IDLicenseDate'=>'2024-11-9',
               'IDLicenseExpiry'=>'2024-11-9',
               'LicenseDoc'=>'2024-11-9',
               'IDPassport'=>'1234576789',
               'IDPassportDate'=>'2024-11-9',
               'IDPassportExpiry'=>'2024-11-9',
               'PassportDoc'=>'2024-11-9',
           ],

           [
               'name'=>'Admin Admins',
               'gender'=>'male',
               'address'=>'Address',
               'phone'=>'7559217489',
               'type'=>'admin',
               'is_verified'=>1,
               'birthDate'=>'2024-11-9',
               'ProfilePic'=>'pic.png',
               'email'=>'admin@admin.com',
               'password'=> bcrypt('123456'),
               'IDLicense'=>'12734576789',
               'IDLicenseDate'=>'2024-11-9',
               'IDLicenseExpiry'=>'2024-11-9',
               'LicenseDoc'=>'2024-11-9',
               'IDPassport'=>'17234576789',
               'IDPassportDate'=>'2024-11-9',
               'IDPassportExpiry'=>'2024-11-9',
               'PassportDoc'=>'2024-11-9',
           ],


            
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}