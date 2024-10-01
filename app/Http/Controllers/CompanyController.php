<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $companies = Company::all();
         if (Auth::user()->type == 'admin')
          {
            return view('admin.company.index',compact('companies'));
          }
        else
          {
            return view('Manager.company.index',compact('companies'));
          } 
        
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->type == 'admin')
          {
            return view('admin.company.create');
          }
        else
          {
            return view('Manager.company.create');
          } 
        
    }
  
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            
          
        ]);
        $image = $request->file('image')->store('public/images');
       
       
        Company::create(array_merge($request->all(), ['image' => $image]));
        if (Auth::user()->type == 'admin')
          {
            return redirect()->route('Company.index')->with('success','Company created successfully.');
          }
        else
          {
            return redirect()->route('manager.company.index')->with('success','Company created successfully.');
          } 

        
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        
        $company = Company::findOrFail($id);
        
       if (Auth::user()->type == 'admin')
          {
            return view('admin.company.show', compact('company'));
          }
        else
          {
            return view('Manager.company.show', compact('company'));
          } 

        
    }
  
    /**
     * Show the form for editing the specified resource.
     */
     public function edit(string $id): View
    {
        
        $company = Company::findOrFail($id);
        
       if (Auth::user()->type == 'admin')
          {
            return view('admin.company.edit', compact('company'));
          }
        else
          {
            return view('Manager.company.edit', compact('company'));
          } 
        
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id): RedirectResponse
    {
        $request->validate([
            
        ]);

        
    
        $company = Company::findOrFail($id);
        $oldimage=$company->image;
        if ($request->image != null)
        {
        $CompanyLogo = $request->file('image')->store('public/images');
        $company->update([
                'image'              => $CompanyLogo,
                'email'              => $request->email,
                'address'            => $request->address,
                'phone'              => $request->phone, 
                'facebook'           => $request->facebook,
                'instagram'          => $request->instagram,
                'twitter'            => $request->twitter,
                'linkedin'           => $request->linkedin,
                'companyName'        => $request->companyName,
                'website'            => $request->website,
                'created_at'         => now(),
                'updated_at'         => now(),
                'owner'              => $request->owner,
                'description'        => $request->description,
                ]);
        Storage::delete($oldimage);
        }
        else
        {
        $company->update([
                
                'email'              => $request->email,
                'address'            => $request->address,
                'phone'              => $request->phone, 
                'facebook'           => $request->facebook,
                'instagram'          => $request->instagram,
                'twitter'            => $request->twitter,
                'linkedin'           => $request->linkedin,
                'companyName'        => $request->companyName,
                'website'            => $request->website,
                'created_at'         => now(),
                'updated_at'         => now(),
                'owner'              => $request->owner,
                'description'        => $request->description,

                
            ]);
        }
            
            if (Auth::user()->type == 'admin')
          {
            return redirect()->route('Company.index')
                        ->with('success','Company updated successfully');
          }
        else
          {
           return redirect()->route('manager.company.index')
                        ->with('success','Company has been updated successfully');
          } 
            
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $company= Company::findOrfail($id);
        $company->delete();
         
        return redirect()->route('Company.index');
                       
    }
}
