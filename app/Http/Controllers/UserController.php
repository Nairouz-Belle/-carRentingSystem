<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                  
        $users = User::orderBy('created_at', 'desc')->get();
          
        return view('admin.users.index',compact('users'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([]);

        
        $password = \Hash::make($request->password);
        

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
        
        return redirect()->route('Users.index')->with('success','Customer created successfully.');
        
    }
  
    /**
     * Display the specified resource.
     */
   public function show(string $id): View
    {
        
        $user = User::findOrFail($id);
        
       
        return view('admin.users.show', compact('user'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id): View
    {
        
        $user = User::findOrFail($id);
        
       
        return view('admin.users.edit', compact('user'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        
        $this->validate($request, [
            
        ]);

        $user = User::findOrFail($id);
        $password = \Hash::make($request->password); 
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
                'password'          => $password,
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
                'password'          => $password,
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
                'password'          => $password,
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
                'password'          => $password,
                
            ]);
        }
        return redirect()->route('Users.index')->with(['success' => 'Data has been updated successfully']);
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {

        $user=User::findOrfail($id);
        
        $user->delete();
        return redirect()->route('Users.index');
                        
    }
}
