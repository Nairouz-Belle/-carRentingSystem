<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use DB;

class UpdatePasswordController extends Controller
{

    public function update(Request $request)
    {   

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors([
                'old_password' => 'The provided old password does not match your current password.',
            ]);
        }

        if ($request->new_password !== $request->new_password_confirmation) {
            return redirect()->back()->withErrors([
                'new_password' => 'The new password and confirm password must match.',
            ]);
        }

        if ($request->new_password == $request->new_password_confirmation) {
        $password = Hash::make($request->new_password);

        $ChangePassword = DB::table('users')
                        ->where('id','=',$user->id)
                        ->update(['password'=>$password]);

        if (Auth::user()->type == 'customer')
          {
            return redirect()->to(url('/Customer/Users/'.$user->id.'/edit'))->with('success','Password Has Been Chnaged Successfully');;
            
          }
        elseif (Auth::user()->type == 'admin')
          {
            return redirect()->to(url('/Admin/Users/'.$user->id.'/edit'))->with('success','Password Has Been Chnaged Successfully');;
          }
        else
          {
            return redirect()->to(url('/Manager/Users/'.$user->id.'/edit'))->with('success','Password Has Been Chnaged Successfully');
          }

        }
    }

}
