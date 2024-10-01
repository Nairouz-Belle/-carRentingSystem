<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use DB;
use Illuminate\Support\Facades\Auth;
class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([]);

        
        
        Rating::create($request->all());
        if (Auth::user()->type == 'customer')
          {
            return redirect()->back()->with('success', 'The data has been created successfully !.');
          }
        elseif (Auth::user()->type == 'admin')
          {
            return redirect()->back()->with('success', 'The data has been created successfully !.');
          }
        else
          {
             return redirect()->back()->with('success', 'The data has been created successfully !.');
          }
        
        
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
        if (Auth::user()->type == 'customer')
          {
            return redirect()->back()->with('success', 'The data has been created successfully !.');
          }
        elseif (Auth::user()->type == 'admin')
          {
            return redirect()->back()->with('success', 'The data has been created successfully !.');
          }
        else
          {
             return redirect()->back()->with('success', 'The data has been created successfully !.');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
