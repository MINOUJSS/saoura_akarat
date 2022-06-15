<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Images;

class RealeEstateController extends Controller
{
    public function photos($r_e_id)
    {
        $photos=Images::where('reale_estate_id',$r_e_id)->get(); 
        return view('site.guests.reale_estate_photos.index',compact('photos'));
    }
}
