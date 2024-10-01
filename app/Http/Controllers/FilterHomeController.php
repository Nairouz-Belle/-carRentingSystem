<?php

namespace App\Http\Controllers;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use DB;

class FilterHomeController extends Controller
{
    
    public function filterType(Request $request)
    {
        $array=$request->type;
        
        foreach($array as $arr)
            { 
                $vehicules=Vehicule::whereIn('shape',$array)->get();
            }
        return view('front-end.carList',compact('vehicules'));
    }


    public function filterBody(Request $request)
    {
        $array=$request->shape;

        foreach($array as $arr)
            { 
                $vehicules=Vehicule::whereIn('shape',$array)->get();
            }
        return view('front-end.carList',compact('vehicules'));
    }

    public function filterSeats(Request $request)
        {
        $selectedSeats = $request->seating;

        $vehicules = Vehicule::where(function ($query) use ($selectedSeats) {
        foreach ($selectedSeats as $seat) {
        if ($seat == '6+') {
            $query->orWhere('seating', '>', 6);
        } else {
            $query->orWhere('seating', $seat);
        }
        }
        })->get();

        return view('front-end.carList', compact('vehicules'));
        }


    public function filterEngine(Request $request)
        {
        $engines = $request->input('engine');
        
        $query = Vehicule::query();

        if (in_array('one', $engines)) {
        $query->orWhereBetween('engine', [1000, 2000]);
        }

        if (in_array('two', $engines)) {
        $query->orWhereBetween('engine', [2000, 4000]);
        }

        if (in_array('three', $engines)) {
        $query->orWhereBetween('engine', [4000, 6000]);
        }

        if (in_array('four', $engines)) {
        $query->orWhere('engine', '>', 6000);
        }

        $vehicules = $query->get();

        return view('front-end.carList', compact('vehicules'));
        }


    public function filterPrice(Request $request)
    {
        $minPrice = (int)$request->input('minPrice');
        $maxPrice = (int)$request->input('maxPrice');

        $vehicules = DB::table('vehicules')
           ->whereBetween('price', [$minPrice,$maxPrice])
           ->orderBy('created_at', 'desc')->get();

        

        return view('front-end.carList', compact('vehicules'));
    }


}
