<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;
class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                  
        $users = User::orderBy('created_at', 'desc')->get();
          

          if (Auth::user()->type == 'admin')
          {
           return view('admin.users.index',compact('users'));
          }
        else
          {
           return view('Manager.users.index',compact('users'));
          }
        
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->type == 'admin')
          {
           return view('admin.users.create');
          }
        else
          {
           return view('Manager.users.create');
          }
        
    }
  
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([]);

        
        $password = \Hash::make($request->password);
        //dd(Auth::user()->type);

        if ($request->ProfilePic != null && $request->LicenseDoc != null) 
        {
            $ProfilePicture = $request->file('ProfilePic')->store('public/images');
            
            $LicensePicture = $request->file('LicenseDoc')->store('public/images');
            
            User::create(array_merge($request->all(), ['password' => $password],['ProfilePic' => $ProfilePicture],['LicenseDoc' => $LicensePicture]));
        }
        else if ($request->ProfilePic == null && $request->LicenseDoc != null) 
        {
            
            $LicensePicture = $request->file('LicenseDoc')->store('public/images');  
            User::create(array_merge($request->all(), ['password' => $password],['LicenseDoc' => $LicensePicture]));        
        }

        else if ($request->ProfilePic != null && $request->LicenseDoc == null) 
        {   
            $ProfilePicture = $request->file('ProfilePic')->store('public/images');
            User::create(array_merge($request->all(), ['password' => $password],['ProfilePic' => $ProfilePicture]));
        }

        else 
        {   
                
                User::create(array_merge($request->all(), ['password' => $password]));
        }
          
    if (Auth::check()) 
    {
        if (Auth::user()->type == 'admin') 
        {
            return redirect()->route('Users.index')->with('success', 'Customer created successfully.');
        } 
        elseif (Auth::user()->type == 'customer') 
        {
            return redirect()->route('users.index')->with('success', 'Customer created successfully.');
        } 
        else 
        {
            return redirect()->route('manager.users.index')->with('success', 'Customer created successfully.');
        }
    } 
    else 
    {
    return redirect()->back()->with('success', 'Registration successful! Your account will be activated once it is approved by an admin.');
    }
        
    }
  
    /**
     * Display the specified resource.
     */
   public function show(string $id): View
    {
        
        $user = User::findOrFail($id);
        
       if (Auth::user()->type == 'customer')
          {
            return view('Customer.users.show', compact('user'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.users.show', compact('user'));
          }
        else
          {
            return view('Manager.users.show', compact('user'));
          }
        
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id): View
    {
        
        $user = User::findOrFail($id);
        if (Auth::user()->type == 'customer')
          {
            return view('Customer.users.edit', compact('user'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.users.edit', compact('user'));
          }
        else
          {
            return view('Manager.users.edit', compact('user'));
          }
       
        
    }

    public function Confirmed(string $id)
    {
        
        $user = User::findOrFail($id);
        $user->update(['status'=> 'Confirmed']);
       if (Auth::user()->type == 'admin')
          {
           return redirect()->back();
          }
        else
          {
           return redirect()->back();
          }
        
    }

    public function Blocked(string $id)
    {
        
        $user = User::findOrFail($id);
        $user->update(['status'=> 'Blocked']);
       if (Auth::user()->type == 'admin')
          {
           return redirect()->back();
          }
        else
          {
           return redirect()->back();
          }
        
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        
        $this->validate($request, [
            
        ]);

        $user = User::findOrFail($id);
        
        $oldimage=$user->ProfilePic;
        $oldLicenseDoc=$user->LicenseDoc;

        if ($request->ProfilePic != null && $request->LicenseDoc != null) 
        {

                      
            $ProfilePicture = $request->file('ProfilePic')->store('public/images');
            $LicensePicture = $request->file('LicenseDoc')->store('public/images');
            
              

            $user->update([
                'name'              => $request->name,
                'type'              => $request->type,
                'email'             => $request->email,
                'gender'            => $request->gender,
                'status'            => $request->status,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'ProfilePic'        => $ProfilePicture,
                'birthDate'         => $request->birthDate,
                'IDLicense'         => $request->IDLicense,
                'IDLicenseDate'     => $request->IDLicenseDate,
                'IDLicenseExpiry'   => $request->IDLicenseExpiry,
                'LicenseDoc'        => $LicensePicture,
            ]);
            Storage::delete($oldimage);
            Storage::delete($oldLicenseDoc);

        }
        else if ($request->ProfilePic == null && $request->LicenseDoc != null) 
        {
             
            $LicensePicture = $request->file('LicenseDoc')->store('public/images');
           
            
            
            $user->update([
                'name'              => $request->name,
                'type'              => $request->type,
                'email'             => $request->email,
                'gender'            => $request->gender,
                'status'            => $request->status,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'birthDate'         => $request->birthDate,
                'IDLicense'         => $request->IDLicense,
                'IDLicenseDate'     => $request->IDLicenseDate,
                'IDLicenseExpiry'   => $request->IDLicenseExpiry,
                'LicenseDoc'        => $LicensePicture,
            ]);
            Storage::delete($oldLicenseDoc);

        } 
        else if ($request->ProfilePic != null && $request->LicenseDoc == null) 
        {

            
            $ProfilePicture = $request->file('ProfilePic')->store('public/images');
            
            $user->update([
                'name'              => $request->name,
                'type'              => $request->type,
                'email'             => $request->email,
                'gender'            => $request->gender,
                'status'            => $request->status,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'ProfilePic'        => $ProfilePicture,
                'birthDate'         => $request->birthDate,
                'IDLicense'         => $request->IDLicense,
                'IDLicenseDate'     => $request->IDLicenseDate,
                'IDLicenseExpiry'   => $request->IDLicenseExpiry,
            ]);
            Storage::delete($oldimage);
            

        } 
        else 
        {
                
        
                $user->update([
                'name'              => $request->name,
                'type'              => $request->type,
                'email'             => $request->email,
                'gender'            => $request->gender,
                'status'            => $request->status,
                'address'           => $request->address,
                'phone'             => $request->phone,
                'birthDate'         => $request->birthDate,
                'IDLicense'         => $request->IDLicense,
                'IDLicenseDate'     => $request->IDLicenseDate,
                'IDLicenseExpiry'   => $request->IDLicenseExpiry,
                
            ]);
        }
        if (Auth::user()->type == 'customer')
          {
            return redirect()->back()->with(['EditUser' => 'Data has been updated successfully']);
          }
        elseif (Auth::user()->type == 'admin')
          {
            return redirect()->route('Users.index')->with(['EditUser' => 'Data has been updated successfully']);
          }
        else
          {
            return redirect()->route('manager.users.index')->with(['EditUser' => 'Data has been updated successfully']);
          }
        
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {

        $user=User::findOrfail($id);
        //search the vehicle id in reservation table soi can change the status of this vehicle
        $searchVehicle=DB::table('reservations')
                                                ->where('user_id','=',$user->id)
                                                ->value('vehicule_id');
                                                
                                               // dd($searchVehicle);
        $changeStatus=DB::table('vehicules')
                                                ->where('id','=',$searchVehicle)
                                                ->update(['status'=>'Available']);
        
        
        $user->delete();
        return redirect()->route('Users.index');
                        
    }
}
