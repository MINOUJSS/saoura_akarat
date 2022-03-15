<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LandingPageController extends Controller
{
    public function index()
    {
        //Alert::success('مرحبا');
        return view('site.index.index');
    }
}
