<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    public function index()
    {
                  
        $payments = Payment::orderBy('created_at', 'desc')->get();
          if (Auth::user()->type == 'customer')
          {
            return view('Customer.payments.index',compact('payments'));
          }
        elseif (Auth::user()->type == 'admin')
          {
            return view('admin.payments.index',compact('payments'));
          }
        else
          {
             return view('Manager.payments.index',compact('payments'));
          }
        
        
    }
  
  
    public function destroy($id): RedirectResponse
    {

        $payment=Payment::findOrfail($id);
        
        $payment->delete();
        return redirect()->route('Payments.index');
                        
    }
    
}
