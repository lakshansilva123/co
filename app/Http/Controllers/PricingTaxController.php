<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingTaxController extends Controller
{
    public function index()
    {
        return view('settings.pricing-tax.index');
    }
}
