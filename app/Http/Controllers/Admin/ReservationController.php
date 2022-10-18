<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\RealEestate;
use App\OrderToFindRealeEstate;
use App\Operation;
use App\Invoice;
use App\AdminNotification;
use Auth;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //index
    public function index()
    {
        return view('admin.reservation.index');
    }
    //create free reservation
    public function create_free_reservation(Request $request)
    {
        $AfterTomorrow=(new \DateTime())->add(new \DateInterval('P2D'))->format('d-m-Y H:i:s');
        //get reale estate id
        $r_e_id=$request->r_estate_id;
        //get order to find reale estate id
        $order_id=$request->order_id;
        //get reale estate data
        $reale_estate=RealEestate::findOrFail($r_e_id);
        //get order data
        $order_to_find_r_e=OrderToFindRealeEstate::findOrFail($order_id);
        //return create view with this data
        return view('admin.reservation.free_reservation.create.index',compact('reale_estate','order_to_find_r_e','AfterTomorrow'));
    }
    // store free resaervation
    public function store_free_reservation(Request $request)
    {
        //cheke if the reale estate is  in liked_list

        //insert the reale esate in liked_list table

        //insert in operation table
        
        //insert in reservation table

        //alert saccess

        //returne redirect  to order detais page
        
    }
    // edit free resaervation
    public function edit_free_reservation(Request $request)
    {

    }
    // update free resaervation
    public function update_free_reservation(Request $request)
    {

    }
    // destroy free resaervation
    public function destroy_free_reservation(Request $request)
    {

    }
    //create paied reservation
    public function create_paied_reservation(Request $request)
    {
        $After2Week=(new \DateTime())->add(new \DateInterval('P14D'))->format('d-m-Y H:i:s');
        //get reale estate id
        $r_e_id=$request->r_estate_id;
        //get order to find reale estate id
        $order_id=$request->order_id;
        //get reale estate data
        $reale_estate=RealEestate::findOrFail($r_e_id);
        //get order data
        $order_to_find_r_e=OrderToFindRealeEstate::findOrFail($order_id);
        //return create view with this data
        return view('admin.reservation.paied_reservation.create.index',compact('reale_estate','order_to_find_r_e','After2Week'));
    }
    // store paied resaervation
    public function store_paied_reservation(Request $request)
    {
        //cheke if the reale estate is  in liked_list

        //insert the reale esate in liked_list table

        //insert in operation table
        
        //insert in reservation table

        //update in chashier
        
        //alert saccess

        //returne redirect  to order detais page
    }
    // edit paied resaervation
    public function edit_paid_reservation(Request $request)
    {

    }
    // update paied resaervation
    public function update_paid_reservation(Request $request)
    {

    }
    // destroy paied resaervation
    public function destroy_paid_reservation(Request $request)
    {

    }
}
