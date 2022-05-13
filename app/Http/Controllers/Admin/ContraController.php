<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Contra;
use Auth;

class ContraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $contra=Contra::findOrFail(1);
        return view('admin.contra.index',compact('contra'));
    }

    public function update(Request $request)
    {
        //valdation
        $this->validate($request,[
            'content'=>'required'
        ]);
        //update
        $contra=Contra::findOrFail(1);
        $contra->admin_id=Auth::guard('admin')->user()->id;
        $contra->content=$request->content;
        $contra->update();
        //return back with success Alert
        Alert::success('تم تعديل السياسة الخصوصية بنجاح.');
        return redirect()->back();
    }
}
