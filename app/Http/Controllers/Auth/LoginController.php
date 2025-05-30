<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function login(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if(auth()->user()->status == 'Confirmed')
            {   
                if (auth()->user()->type == 'admin') 
                {return redirect()->route('admin.home');}

                if (auth()->user()->type == 'manager') 
                {return redirect()->route('manager.home');}
                
                else 
                {return redirect()->route('customer.home');}
            }
            if(auth()->user()->status == 'Pending')
            {
                {return redirect()->route('pendingAccount');}
            }
            else
            {
                {return redirect()->route('blockedAccount');}
            }
        }
        else    {return redirect()->route('loginIn')->with('error','Invalid email address or password. Please try again.');}
    }

}
