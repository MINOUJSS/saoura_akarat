<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tronsaction;
use App\RealeEstateType;
use App\Wilaya;
use App\Dayra;
use App\Baladia;

class RealEstateCustomerController extends Controller
{
    public function register()
    {
        $tronsaction=Tronsaction::All();
        $reale_estate_types=RealeEstateType::All();
        $wilayas=Wilaya::All();
        return view('site.register_real_estate_customer.index',compact('tronsaction','reale_estate_types','wilayas'));
    }

    public function getdayras($wilaya_id)
    {
        $dayras=Dayra::where('wilaya_id',$wilaya_id)->get();
        if(count($dayras)!=0){
        //$html='<div class="form-group" style="margin:5px;">';
        $html='<label class="sr-only" for="dayra">الدائرة</label>';
        $html.='<select onchange="changebaladia();" name="dayra" class="form-control transparent" id="select_dayra">';
        $html.='<option value="0" class="form-control">إختر الدائرة</option>';
        foreach($dayras as $dayra)
        {
            $html.='<option value="'.$dayra->id.'" class="form-control">'.$dayra->ar_name.'</option>';
        }
        $html.='</select>';
        //$html.='</div>';
        }
        else
        {
        $html='null';
        }
        return $html;
    }
    public function getbaladias($dayra_id)
    {
        $baladias=Baladia::where('dayra_id',$dayra_id)->get();
        if(count($baladias)!=0){
        //$html='<div class="form-group" style="margin:5px;">';
        $html='<label class="sr-only" for="baladia">البلدية</label>';
        $html.='<select name="baladia" class="form-control transparent" id="select_baladia">';
        $html.='<option value="0" class="form-control">إختر البلدية</option>';
        foreach($baladias as $baladia)
        {
            $html.='<option value="'.$baladia->id.'" class="form-control">'.$baladia->ar_name.'</option>';
        }
        $html.='</select>';
        //$html.='</div>';
        }
        else
        {
        $html='null';
        }
        return $html;
    }
    public function store(Request $request)
    {
        dd($request);
    }
}
