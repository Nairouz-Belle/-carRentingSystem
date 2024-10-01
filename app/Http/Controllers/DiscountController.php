<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
class DiscountController extends Controller
{
   public function index()
    {
        $discounts = Discount::orderBy('created_at', 'desc')->get();

       
        if (Auth::user()->type == 'admin')
          {
           return view('admin.discounts.index',compact('discounts'));
          }
        else
          {
           return view('Manager.discounts.index',compact('discounts'));
          }
        
    }
  
    public function Disactivate(string $id)
    {
        
        $discount = Discount::findOrFail($id);
        $discount->update(['status'=> 'Disactivate']);
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->type == 'admin')
          {
           return view('admin.discounts.create');
          }
        else
          {
           return view('Manager.discounts.create');
          }
        
    }
  
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
       
        $request->validate([]);
        
        
        Discount::create($request->all());
        if (Auth::user()->type == 'admin')
          {
           return redirect()->route('Discounts.index')->with('success','Data has been created successfully.');
          }
        else
          {
           return redirect()->route('manager.discounts.index')->with('success','Data has been created successfully.');
          }

    }
  
    /**
     * Display the specified resource.
     */
   public function show(string $id): View
    {
        $discount = Discount::findOrFail($id);
        if (Auth::user()->type == 'admin')
          {
           return view('admin.discounts.show', compact('discount'));
          }
        else
          {
           return view('Manager.discounts.show', compact('discount'));
          }

    }
  
    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id): View
    {
        $discount = Discount::findOrFail($id);
        if (Auth::user()->type == 'admin')
          {
           return view('admin.discounts.edit', compact('discount'));
          }
        else
          {
           return view('Manager.discounts.edit', compact('discount'));
          }
        
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $discount = Discount::findOrFail($id);
        $discount->update($request->all());        
        if (Auth::user()->type == 'admin')
          {
           return redirect()->route('Discounts.index')->with(['success' => 'Data has been updated successfully']);
          }
        else
          {
           return redirect()->route('manager.discounts.index')->with(['success' => 'Data has been updated successfully']);
          }

    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {


        $discount=Discount::findOrfail($id);
        
       
        $discount->delete();
        
        return redirect()->route('Discounts.index');
                        
    }
}
