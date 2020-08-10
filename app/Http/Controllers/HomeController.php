<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use Laravel\Cashier\Cashier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user = Auth::user();
        
        $user = Cashier::findBillable(env('STRIPE_ID'));

        return view('home');
    }

    public function createStripeCustomer(Request $request){
        $user = Cashier::findBillable(env('STRIPE_ID'));
        
        $stripeCustomer = $user->createAsStripeCustomer();
    }
}
