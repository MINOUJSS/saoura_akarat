<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\RealEestate;
use App\Images;

class RealeEstatesController extends Controller
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
    
    public function index()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->get();
        return view('admin.reale-estates.index',compact('reale_estates'));
    }

    public function detailes($id)
    {
        $reale_estate=RealEestate::findOrfail($id);
        $images=Images::where('reale_estate_id',$id)->get();
        return view('admin.reale-estates.detailes.index',compact('reale_estate','images'));
    }

    public function edit($id)
    {
        $reale_estate=RealEestate::findOrfail($id);
        return view('admin.reale-estates.detailes.index');
    }

    public function update($id)
    {
        dd('this is update function');
    }

    public function destroy($id)
    {
        //delete all real estate images 
        //from upload folder and images table
        $images=Images::where('reale_estate_id',$id)->get();
        foreach ($images as $image) {
            //delete from thumbnails folder
            $thumbnail_path=public_path('/admins/uploads/thumbnails/'.$image->image);
            if(\File::exists($thumbnail_path))
            {
                unlink($thumbnail_path);
            }
            //delete from images table
            $image_path=public_path('/admins/uploads/images/'.$image->image);
            if(\File::exists($image_path))
            {
                unlink($image_path);
            }
        }
        //delete data from data base
        $reale_estate=RealEestate::findOrFail($id);
        $reale_estate->delete();
        //return to reale estate page with success
        Alert::success('تم حدف العقار بنجاح');
        return redirect()->back();
    }
}
