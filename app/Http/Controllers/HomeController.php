<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        
        return redirect()->to(url('/Customer/Users/'.$user->id));
         
    }

    public function AdminHome()
    {
        return view('admin.Dashboard.dashboard');
    }

    public function ManagerHome()
    {
        return view('Manager.Dashboard.dashboard');
    }

}
