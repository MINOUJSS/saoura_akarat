<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RealEstateCustomerController extends Controller
{
    public function register()
    {
        return view('site.register_real_estate_customer.index');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
