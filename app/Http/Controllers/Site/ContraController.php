<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contra;

class ContraController extends Controller
{
    public function index()
    {
        $contra=Contra::where('id',1)->first();
        return view('site.guests.contra.index',compact('contra'));
    }
}
