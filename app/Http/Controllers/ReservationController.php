<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Vehicule;
use App\Models\User;
use Carbon\Carbon;
use DB;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        if (Auth::user()->type == 'customer')
          {
            return view('Customer.reservations.index',compact('reservations'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.reservations.index',compact('reservations'));
          }
        else
          {
            return view('Manager.reservations.index',compact('reservations'));
          }
       
          
        
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   if (Auth::user()->type == 'customer')
          {
            return view('Customer.reservations.create');
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.reservations.create');
          }
        else
          {
            return view('Manager.reservations.create');
          }
        
    }
  


      public function Confirmed(string $id)
    {
        
        $resv = Reservation::findOrFail($id);
        $resv->update(['status'=> 'Confirmed']);
        $affected = DB::table('vehicules')
                                    ->where('id','=',$resv->vehicule_id)
                                    ->update(['status'=>'On Rent']);

       if (Auth::user()->type == 'admin')
          {
           return redirect()->back();
          }
        else
          {
           return redirect()->back();
          }
        
    }

    public function onRent(string $id)
    {
        
        $resv = Reservation::findOrFail($id);
        $resv->update(['status'=> 'On Rent']);
        
        $affected = DB::table('vehicules')
                                    ->where('id','=',$resv->vehicule_id)
                                    ->update(['status'=>'On Rent']);


       if (Auth::user()->type == 'admin')
          {
           return redirect()->back();
          }
        else
          {
           return redirect()->back();
          }
        
    }

      public function Completed(string $id)
    {
        
        $resv = Reservation::findOrFail($id);
        $resv->update(['status'=> 'Completed']);

        $affected = DB::table('vehicules')
                                    ->where('id','=',$resv->vehicule_id)
                                    ->update(['status'=>'Available']);

       if (Auth::user()->type == 'admin')
          {
           return redirect()->back();
          }
        else
          {
           return redirect()->back();
          }
        
    }

    public function Cancelled(string $id)
    {
        
        $resv = Reservation::findOrFail($id);
        $resv->update(['status'=> 'Cancelled']);
        $affected = DB::table('vehicules')
                                    ->where('id','=',$resv->vehicule_id)
                                    ->update(['status'=>'Available']);
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
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
       
        $request->validate([]);
        
        $borrow = Carbon::parse($request->borrow);
        $return  = Carbon::parse($request->return);

        $Penaltydiff = $borrow->diffInDays($return);
        
        $discounts = DB::table('discounts')
                        ->where('code','=',$request->discountCode)
                        ->pluck('status')
                        ->first();

        


        $discountsAmount = DB::table('discounts')
                            ->where('code','=',$request->discountCode)
                            ->where('vehicle_id','=',$request->vehicule_id)
                            ->pluck('discountAmount')
                            ->first();
                            

        if($Penaltydiff!=0)
        {   
            if($discounts =='active')
            {
                $price = $request->price * $Penaltydiff; 
                $price= $price - ($price * ($discountsAmount/100));
                
                
            }
            else
            {
                $price = $request->price * $Penaltydiff; 
                
            }
        }
        else 
        {   
            if($discounts=='active')
            {
                $price= $request->price - ($request->price*($discountsAmount/100));
                
                
            }
            else
            {
                $price = $request->price;
                
               
            }
        }
        Reservation::create(array_merge($request->all(), ['price'=> $price],['penalty'=> $price]));
                        
                        $affected = DB::table('vehicules')
                                    ->where('id','=',$request->vehicule_id)
                                    ->update(['status'=>'On Rent']);

        if (Auth::user()->type == 'customer')
          {
           return redirect()->route('reservations.index')->with('success','Data has been created successfully.');
          }
        elseif (Auth::user()->type == 'admin')
          {
            return redirect()->route('Reservations.index')->with('success','Data has been created successfully.');
          }
        else
          {
            return redirect()->route('manager.reservations.index')->with('success','Data has been created successfully.');
          }        
        
    }
  
    /**
     * Display the specified resource.
     */
   public function show(string $id): View
    {
        $reservation = Reservation::findOrFail($id);
        if (Auth::user()->type == 'customer')
          {
           return view('Customer.reservations.show', compact('reservation'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.reservations.show', compact('reservation'));
          }
        else
          {
            return view('Manager.reservations.show', compact('reservation'));
          } 

    }
  
    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id): View
    {
        
        $reservation = Reservation::findOrFail($id);
        
       if (Auth::user()->type == 'customer')
          {
           return view('Customer.reservations.edit', compact('reservation'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.reservations.edit', compact('reservation'));
          }
        else
          {
            return view('Manager.reservations.edit', compact('reservation'));
          }
        
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        
        $this->validate($request, [
            
        ]);
                
                $res = Reservation::findOrFail($id);
                
                $return = Carbon::parse($request->return);
                $returned  = Carbon::parse($request->returned);

                $Paiementstatus="Paid";

                $Penaltydiff = $return->diffInDays($returned);
              
                
                $penalty=$request->price + ($request->fine * $Penaltydiff);
        

                if($request->status == 'Completed')
                    {
                        if($request->returned){
                        $Paiementstatus='Paid';
                        $penalty=$request->price + ($request->fine * $Penaltydiff);}
                        else{return redirect()->back()->with(['Erreurs' => 'You Should fill "Returned" field !!']);}   
                    }
                else
                    {
                        $Paiementstatus='Unpaid';
                        $penalty=$request->price;
                    }

                   // dd($request->user_id);
                if($request->status == 'Completed' && $res->status!='Completed')
                {
                $created_at = Carbon::now();
                $paiement = DB::insert('insert into payments (amount,method,reservation_id,vehicule_id,user_id,created_at,updated_at)values (?,?,?,?,?,?,?)', [$penalty,'Cash',$res->id,$request->vehicule_id,$request->user_id,$created_at,$created_at]);
                }
                //change vehicule status to Available after the reservation been completed
                if($request->status == 'Completed' || $request->status == 'Cancelled' || $request->status == 'Pending')
                {
                    $changeVehiculeStatus=DB::table('vehicules')
                                                ->where('id','=',$request->vehicule_id)
                                                ->update(['status'=>'Available']);
                }

                $res->update([
                'borrow'             => $request->borrow,
                'return'             => $request->return,
                'price'              => $request->price,
                'fine'               => $request->fine,
                'returned'           => $request->returned,
                'penalty'            => $penalty,
                'Paiementstatus'     => $Paiementstatus,
                'status'             => $request->status,
                'vehicule_id'        => $request->vehicule_id,
                'user_id'            => $request->user_id,
            ]);
                
        if (Auth::user()->type == 'customer')
          {
           return redirect()->route('reservations.index')->with(['success' => 'Data has been updated successfully']);
          }
        elseif (Auth::user()->type == 'admin')
          {
            return redirect()->route('Reservations.index')->with(['success' => 'Data has been updated successfully']);
          }
        else
          {
            return redirect()->route('manager.reservations.index')->with(['success' => 'Data has been updated successfully']);
          }
        
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {


        $reservation=Reservation::findOrfail($id);
        //$reservation_id = DB::table('payments')
        //->select('reservation_id')->delete();
       $changeVehiculeStatus=DB::table('vehicules')
                                                ->where('id','=',$reservation->vehicule_id)
                                                ->update(['status'=>'Available']);
        $reservation->delete();
        //if($reservation_id != null){$reservation_id->delete();}
        
        if (Auth::user()->type == 'customer')
          {
            return redirect()->route('reservations.index');
          }
        elseif (Auth::user()->type == 'admin')
          {
             return redirect()->route('Reservations.index');
          }
        else
          {
             return redirect()->route('manager.reservations.index');
          }
       
                        
    }
}
