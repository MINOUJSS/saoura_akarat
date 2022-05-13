<?php

namespace App\Http\Controllers\Site\Landing_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LandingPageController extends Controller
{
    public function index()
    {
        //Alert::success('مرحبا');
        return view('site.landding_page.index.index');
    }
}
