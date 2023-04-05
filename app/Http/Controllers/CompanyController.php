<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $companies = Company::with('companies')->get();
          
        return view('admin.company.index',compact('companies'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            
          
        ]);

        Company::create($request->all());

        return redirect()->route('admin.company.index')->with('success','Company created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.company.show',compact('company'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company) 
    {
        return view('admin.company.edit',compact('company'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            
        ]);
        
        $company->update($request->all());
        
        return redirect()->route('admin.company.index')
                        ->with('success','Company updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
         
        return redirect()->route('admin.company.index')
                        ->with('success','Company deleted successfully');
    }
}
