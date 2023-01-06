<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePayment_Controller extends Controller
{
    //
    

     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('user.stripe');
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function stripePost(Request $request)
     {
         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
     
         Stripe\Charge::create ([
                 "amount" => 100 * 100,
                 "currency" => "usd",
                 "customer" => 'helal',
                 "description" => "Test payment from LaravelTus.com." 
         ]);
       
         Session::flash('success', 'Payment successful!');
               
         return back();
     }
}
