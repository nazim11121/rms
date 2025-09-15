<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\CheckIn;
use App\Models\Admin\Checkout;

Class DashboardController extends Controller
{
    public function index(){
        $totalCheckin = CheckIn::where('status', 1)->count();
        $totalCheckout = CheckIn::where('checkout_id', '!=',null)->count();
        $totalIncome = (int)Checkout::where('payment_status', 1)->sum('grand_total');
        $totalExpense = 0;

        return view('dashboard', compact(['totalCheckin','totalCheckout','totalIncome','totalExpense']));
    }
}
