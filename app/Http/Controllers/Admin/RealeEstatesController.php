<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\RealEestate;
use App\OrderToFindRealeEstate;
use App\Images;
use App\LikedList;
use App\UnLikedList;
use Auth;

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
    public function notification_detailes($id,$note_id)
    {
        //make notification readed
        if(!is_readed_notification(Auth::guard('admin')->user()->id,$note_id))
        {
            notification_readed($note_id);
        }
        //get data
        $reale_estate=RealEestate::findOrfail($id);
        $images=Images::where('reale_estate_id',$id)->get();
        //liked reale estat
        $likeds_data=LikedList::where('reale_estate_id',$id)->get();
        $liked_ids=[];
        foreach ($likeds_data as $item) {
            array_push($liked_ids,$item->order_to_find_id);
        }
        $liked_reale_estates=OrderToFindRealeEstate::wherein('id',$liked_ids)->get();
        //unliked reale estate
        $unlikeds_data=UnLikedList::where('reale_estate_id',$id)->get();
        $unliked_ids=[];
        foreach ($unlikeds_data as $item) {
            array_push($unliked_ids,$item->order_to_find_id);
        }
        $unliked_reale_estates=OrderToFindRealeEstate::wherein('id',$unliked_ids)->get();
        //المقترحات
        //حسب الطلب بالضبط
        $exactly_orders_to_find=OrderToFindRealeEstate::where([['type','=',$reale_estate->type],['rooms','=',$reale_estate->rooms],['etages','=',$reale_estate->etages],['etage_number','=',$reale_estate->etage_number],['facad','=',$reale_estate->facad],['furnished','=',$reale_estate->furnished],['property','=',$reale_estate->property],['transaction','=',$reale_estate->transaction],['wilaya','=',$reale_estate->wilaya],['dayra','=',$reale_estate->dayra],['baladia','=',$reale_estate->baladia]])->get();
        //حسب نوع العقار
        $orders_to_find_by_type=OrderToFindRealeEstate::where([['type','=',$reale_estate->type],['transaction','=',$reale_estate->transaction],['wilaya','=',$reale_estate->wilaya]])->get();
        //حسب نوع المعاملة
        $orders_to_find_by_transaction=OrderToFindRealeEstate::where([['transaction','=',$reale_estate->transaction],['wilaya','=',$reale_estate->wilaya]])->get();
        //redirect to notification detais veiw wuth compact data
        return view('admin.notifications.reale-estate-notifications.detailes.index',compact('reale_estate','images','exactly_orders_to_find','orders_to_find_by_type','orders_to_find_by_transaction','liked_reale_estates','unliked_reale_estates'));
    }
    public function detailes($id)
    {
        $reale_estate=RealEestate::findOrfail($id);
        $images=Images::where('reale_estate_id',$id)->get();
        //liked reale estat
        $likeds_data=LikedList::where('reale_estate_id',$id)->get();
        $liked_ids=[];
        foreach ($likeds_data as $item) {
            array_push($liked_ids,$item->order_to_find_id);
        }
        $liked_reale_estates=OrderToFindRealeEstate::wherein('id',$liked_ids)->get();
        //unliked reale estate
        $unlikeds_data=UnLikedList::where('reale_estate_id',$id)->get();
        $unliked_ids=[];
        foreach ($unlikeds_data as $item) {
            array_push($unliked_ids,$item->order_to_find_id);
        }
        $unliked_reale_estates=OrderToFindRealeEstate::wherein('id',$unliked_ids)->get();
        //المقترحات
        //حسب الطلب بالضبط
        $exactly_orders_to_find=OrderToFindRealeEstate::where([['type','=',$reale_estate->type],['rooms','=',$reale_estate->rooms],['etages','=',$reale_estate->etages],['etage_number','=',$reale_estate->etage_number],['facad','=',$reale_estate->facad],['furnished','=',$reale_estate->furnished],['property','=',$reale_estate->property],['transaction','=',$reale_estate->transaction],['wilaya','=',$reale_estate->wilaya],['dayra','=',$reale_estate->dayra],['baladia','=',$reale_estate->baladia]])->get();
        //حسب نوع العقار
        $orders_to_find_by_type=OrderToFindRealeEstate::where([['type','=',$reale_estate->type],['transaction','=',$reale_estate->transaction],['wilaya','=',$reale_estate->wilaya]])->get();
        //حسب نوع المعاملة
        $orders_to_find_by_transaction=OrderToFindRealeEstate::where([['transaction','=',$reale_estate->transaction],['wilaya','=',$reale_estate->wilaya]])->get();
        return view('admin.reale-estates.detailes.index',compact('reale_estate','images','exactly_orders_to_find','orders_to_find_by_type','orders_to_find_by_transaction','liked_reale_estates','unliked_reale_estates'));
    }

    public function edit($id)
    {
        $reale_estate=RealEestate::findOrfail($id);
        return view('admin.reale-estates.edit.index');
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

    public function apartments()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->where('type','شقة')->get();
        return view('admin.reale-estates.index',compact('reale_estates')); 
    }
    public function houses()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->where('type','منزل')->get();
        return view('admin.reale-estates.index',compact('reale_estates')); 
    }
    public function studios()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->where('type','ستيديو')->get();
        return view('admin.reale-estates.index',compact('reale_estates')); 
    }
    public function farms()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->where('type','مزرعة')->get();
        return view('admin.reale-estates.index',compact('reale_estates')); 
    }
    public function lands()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->where('type','أرض')->get();
        return view('admin.reale-estates.index',compact('reale_estates')); 
    }
    public function shops()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->where('type','محل')->get();
        return view('admin.reale-estates.index',compact('reale_estates')); 
    }
    public function bereaus()
    {
        $reale_estates=RealEestate::Orderby('id','desc')->where('type','مكتب')->get();
        return view('admin.reale-estates.index',compact('reale_estates')); 
    }
}
