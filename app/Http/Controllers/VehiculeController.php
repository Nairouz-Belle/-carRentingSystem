<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function search(Request $request)
    {
        $type = $request->input('type');
        $status = $request->input('status');

        $results = DB::table('vehicules')
            ->where('status', 'LIKE', '%'.$status.'%')
            ->where('type', 'LIKE', '%'.$type.'%')
            ->get();

        return view('front-end.search_results', ['vehicules' => $results]);
    }
    public function show2(string $id)
    {
        //
        $vehicule = Vehicule::findOrFail($id);

        return view('front-end.CarSingle', compact('vehicule'));

    }
    public function indexFrontEnd()
    {
        //
        $vehicules = Vehicule::orderBy('created_at', 'desc')->get();

        return view('front-end.carList',compact('vehicules'));
    }
    public function index()
    {
        $vehicules = Vehicule::orderBy('created_at', 'desc')->get();

        if (Auth::user()->type == 'customer')
          {
            return view('Customer.vehicules.index',compact('vehicules'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.vehicules.index',compact('vehicules'));
          }
        else
          {
             return view('Manager.vehicules.index',compact('vehicules'));
          }

    }

    public function filterBrands(string $id)
    {
        //
        $vehicule = Vehicule::findOrFail($id);

        $vehicules=Vehicule::where('category_id',$vehicule->id)->orderBy('created_at', 'desc')->get();

        if (Auth::user()->type == 'customer')
          {
            return view('Customer.vehicules.index', compact('vehicules'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.vehicules.index', compact('vehicules'));
          }
        else
          {
             return view('Manager.vehicules.index', compact('vehicules'));
          }
    }

    public function renting(string $id)
    {
        //

          $rent = Vehicule::findOrFail($id);
          if($rent->status=='Available')
              {


              if (Auth::user()->type == 'customer')
                {
                  return view('Customer.vehicules.renting', compact('rent'));
                }
              elseif (Auth::user()->type == 'admin')
                {
                  return view('admin.vehicules.renting', compact('rent'));
                }
              else
                {
                   return view('Manager.vehicules.renting', compact('rent'));
                }
              }
          else
              {
                if (Auth::user()->type == 'customer')
                {
                   return redirect()->route('vehicules.index')->with('error','This Car Is Currently On Rent !');
                }
              elseif (Auth::user()->type == 'admin')
                {
                   return redirect()->route('Vehicules.index')->with('error','This Car Is Currently On Rent !');
                }
              else
                {
                    return redirect()->route('manager.vehicules.index')->with('error','This Car Is Currently On Rent !');
                }

              }


    }

    public function filterPrice(Request $request)
    {
        $minPrice = (int)$request->minCost;
        $maxPrice = (int)$request->maxCost;

        $vehicules = DB::table('vehicules')
           ->whereBetween('price', [$minPrice,$maxPrice])
           ->orderBy('created_at', 'desc')->get();
           
        if (Auth::user()->type == 'customer')
          {
            return view('Customer.vehicules.index', compact('vehicules'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.vehicules.index', compact('vehicules'));
          }
        else
          {
            return view('Manager.vehicules.index', compact('vehicules'));
          }


    }



    public function filter(Request $request)
    {

        $array=$request->shape;


        foreach($array as $arr){
        $vehicules=Vehicule::whereIn('shape',$array)->get();
        }
        if (Auth::user()->type == 'customer')
          {
            return view('Customer.vehicules.index',compact('vehicules'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.vehicules.index',compact('vehicules'));
          }
        else
          {
            return view('Manager.vehicules.index',compact('vehicules'));
          }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::user()->type == 'customer')
          {
            return view('Customer.vehicules.create');
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.vehicules.create');
          }
        else
          {
            return view('Manager.vehicules.create');
          }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);
        //dd($request->image);
        $image = array();
        if($files = $request->file('image'))
        {
            foreach($files as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/multiple_image/';
                $image_url = $upload_path.$image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        $carPicture = $request->file('carPic')->store('public/images');
        Vehicule::insert([
            // if ($request->carPic != null)
            // {
                'image'                => implode('|', $image),
                'carPic'               => $carPicture,
                'carName'              => $request->carName,
                'productionYear'       => $request->productionYear,
                'fuelType'             => $request->fuelType,
                'seating'              => $request->seating,
                'airbags'              => $request->airbags,
                'engine'               => $request->engine,
                'color'                => $request->color,
                'carPic'               => $carPicture,
                'price'                => $request->price,
                'fine'                => $request->fine,
                'transmission'         => $request->transmission,
                'description'          => $request->description,
                'shape'                => $request->shape,
                'km'                   => $request->km,
                'type'                 => $request->type,
                'category_id'          => $request->category_id,
                'status'               => 'Available',
                'vin'                  => $request->vin,
                'LicensePlate'         => $request->LicensePlate,
                'created_at'           => now(),
               //
                //Vehicule::create(array_merge($request->all(), ['carPic' => $carPicture]));
            // }
            // else
            // {
            //     Vehicule::create(array_merge($request->all()));
            // }


        ]);
        if (Auth::user()->type == 'customer')
          {
            return redirect()->route('vehicules.index')->with('success','Customer created successfully.');
          }
        elseif (Auth::user()->type == 'admin')
          {
            return redirect()->route('Vehicules.index')->with('success','Customer created successfully.');
          }
        else
          {
            return redirect()->route('manager.vehicules.index')->with('success','Customer created successfully.');
          }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $vehicule = Vehicule::findOrFail($id);
        if (Auth::user()->type == 'customer')
          {
            return view('Customer.vehicules.show', compact('vehicule'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.vehicules.show', compact('vehicule'));
          }
        else
          {
            return view('Manager.vehicules.show', compact('vehicule'));
          }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $vehicule = Vehicule::findOrFail($id);
        if (Auth::user()->type == 'customer')
          {
            return view('Customer.vehicules.edit', compact('vehicule'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.vehicules.edit', compact('vehicule'));
          }
        else
          {
            return view('Manager.vehicules.edit', compact('vehicule'));
          }

    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $this->validate($request, [

    ]);

    $vehicule = Vehicule::findOrFail($id);
    $oldImages = explode('|', $vehicule->image);
    $images = [];

    if ($files = $request->file('image')) {
        foreach ($files as $file) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/multiple_image/';
            $image_url = $upload_path . $image_full_name;
            $file->move($upload_path, $image_full_name);
            $images[] = $image_url;
            Storage::delete($oldImages);
        }
    } else {
        $images = $oldImages;
    }

    if ($request->hasFile('carPic')) {
        $carPicture = $request->file('carPic')->store('public/images');
        if ($vehicule->carPic != null) {
            Storage::delete($vehicule->carPic);
        }
    } else {
        $carPicture = $vehicule->carPic;
    }

    $vehicule->update([
        'carName'        => $request->carName,
        'marque'         => $request->marque,
        'productionYear' => $request->productionYear,
        'fuelType'       => $request->fuelType,
        'seating'        => $request->seating,
        'airbags'        => $request->airbags,
        'engine'         => $request->engine,
        'color'          => $request->color,
        'carPic'         => $carPicture,
        'price'          => $request->price,
        'fine'           => $request->fine,
        'transmission'   => $request->transmission,
        'description'    => $request->description,
        'shape'          => $request->shape,
        'type'           => $request->type,
        'km'             => $request->km,
        'status'         => $vehicule->status,
        'vin'            => $request->vin,
        'image'          => implode('|', $images),
        'LicensePlate'   => $request->LicensePlate,
    ]);

    if (Auth::user()->type == 'customer') {
        return redirect()->route('vehicules.index')->with(['success' => 'Data has been updated successfully']);
    } elseif (Auth::user()->type == 'admin') {
        return redirect()->route('Vehicules.index')->with(['success' => 'Data has been updated successfully']);
    } else {
        return redirect()->route('manager.vehicules.index')->with(['success' => 'Data has been updated successfully']);
    }
}









    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $vehicule=Vehicule::findOrfail($id);

        $vehicule->delete();
        return redirect()->route('Vehicules.index');
    }
}
