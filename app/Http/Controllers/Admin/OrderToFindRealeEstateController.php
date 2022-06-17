<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\OrderToFindRealeEstate;
use App\RealEestate;
use App\LikedList;
use App\UnlikedList;
use Auth;

class OrderToFindRealeEstateController extends Controller
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
        $orders_to_find=OrderToFindRealeEstate::Orderby('id','desc')->get();
        return view('admin.order-to-find-reale-estate.index',compact('orders_to_find'));
    }

    public function notification_detailes($id,$note_id)
    {
        //make notification readed
        if(!is_readed_notification(Auth::guard('admin')->user()->id,$note_id))
        {
            notification_readed($note_id);
        }
        //get data
        $ordertofind=OrderToFindRealeEstate::findOrfail($id);
        //liked reale estat
        $likeds_data=LikedList::where('order_to_find_id',$id)->get();
        $liked_ids=[];
        foreach ($likeds_data as $item) {
            array_push($liked_ids,$item->reale_estate_id);
        }
        $liked_reale_estates=RealEestate::wherein('id',$liked_ids)->get();
        //unliked reale estate
        $unlikeds_data=UnLikedList::where('order_to_find_id',$id)->get();
        $unliked_ids=[];
        foreach ($unlikeds_data as $item) {
            array_push($unliked_ids,$item->reale_estate_id);
        }
        $unliked_reale_estates=RealEestate::wherein('id',$unliked_ids)->get();
        //المقترحات
        //حسب الطلب بالضبط
        $exactly_reale_estate=RealEestate::where([['type','=',$ordertofind->type],['rooms','=',$ordertofind->rooms],['etages','=',$ordertofind->etages],['etage_number','=',$ordertofind->etage_number],['facad','=',$ordertofind->facad],['furnished','=',$ordertofind->furnished],['property','=',$ordertofind->property],['transaction','=',$ordertofind->transaction],['wilaya','=',$ordertofind->wilaya],['dayra','=',$ordertofind->dayra],['baladia','=',$ordertofind->baladia]])->get();
        //حسب نوع العقار
        $reale_estate_by_type=RealEestate::where([['type','=',$ordertofind->type],['transaction','=',$ordertofind->transaction],['wilaya','=',$ordertofind->wilaya]])->get();
        //حسب نوع المعاملة
        $reale_estate_by_transaction=RealEestate::where([['transaction','=',$ordertofind->transaction],['wilaya','=',$ordertofind->wilaya]])->get();
        //redirect to notification detais veiw wuth compact data
        return view('admin.notifications.order-to-find-reale-estate-notifications.detailes.index',compact('ordertofind','exactly_reale_estate','reale_estate_by_type','reale_estate_by_transaction','liked_reale_estates','unliked_reale_estates'));
    }
    
    public function detailes($id)
    {
        $ordertofind=OrderToFindRealeEstate::findOrfail($id);
        //liked reale estat
        $likeds_data=LikedList::where('order_to_find_id',$id)->get();
        $liked_ids=[];
        foreach ($likeds_data as $item) {
            array_push($liked_ids,$item->reale_estate_id);
        }
        $liked_reale_estates=RealEestate::wherein('id',$liked_ids)->get();
        //unliked reale estate
        $unlikeds_data=UnLikedList::where('order_to_find_id',$id)->get();
        $unliked_ids=[];
        foreach ($unlikeds_data as $item) {
            array_push($unliked_ids,$item->reale_estate_id);
        }
        $unliked_reale_estates=RealEestate::wherein('id',$unliked_ids)->get();
        //المقترحات
        //حسب الطلب بالضبط
        $exactly_reale_estate=RealEestate::where([['type','=',$ordertofind->type],['rooms','=',$ordertofind->rooms],['etages','=',$ordertofind->etages],['etage_number','=',$ordertofind->etage_number],['facad','=',$ordertofind->facad],['furnished','=',$ordertofind->furnished],['property','=',$ordertofind->property],['transaction','=',$ordertofind->transaction],['wilaya','=',$ordertofind->wilaya],['dayra','=',$ordertofind->dayra],['baladia','=',$ordertofind->baladia]])->get();
        //حسب نوع العقار
        $reale_estate_by_type=RealEestate::where([['type','=',$ordertofind->type],['transaction','=',$ordertofind->transaction],['wilaya','=',$ordertofind->wilaya]])->get();
        //حسب نوع المعاملة
        $reale_estate_by_transaction=RealEestate::where([['transaction','=',$ordertofind->transaction],['wilaya','=',$ordertofind->wilaya]])->get();
        return view('admin.order-to-find-reale-estate.detailes.index',compact('ordertofind','exactly_reale_estate','reale_estate_by_type','reale_estate_by_transaction','liked_reale_estates','unliked_reale_estates'));
    }

    public function edit($id)
    {
        return view('admin.order-to-find-reale-estate.edit.index');
    }

    public function forRent()
    {
        $orders_to_find=OrderToFindRealeEstate::Orderby('id','desc')->where('transaction','للكراء')->get();
        return view('admin.order-to-find-reale-estate.index',compact('orders_to_find'));  
    }
    public function forSall()
    {
        $orders_to_find=OrderToFindRealeEstate::Orderby('id','desc')->where('transaction','للبيع')->get();
        return view('admin.order-to-find-reale-estate.index',compact('orders_to_find'));   
    }
    public function forChange()
    {
        $orders_to_find=OrderToFindRealeEstate::Orderby('id','desc')->where('transaction','للتبادل')->get();
        return view('admin.order-to-find-reale-estate.index',compact('orders_to_find'));   
    }

    public function add_to_liked_list(Request $request)
    {  
        //deleted from unliked list if exist
        $unliked=UnLikedList::where([['order_to_find_id',$request->order_id],['reale_estate_id',$request->r_estate_id]])->first();
        if($unliked!=null)
        {
            $unliked->delete();
        }
        //added to liked list
        $exist_liked=LikedList::where([['order_to_find_id',$request->order_id],['reale_estate_id',$request->r_estate_id]])->first();
        if($exist_liked==null)
        {
        $liked=new LikedList;
        $liked->order_to_find_id=$request->order_id;
        $liked->reale_estate_id=$request->r_estate_id;
        $liked->save();
        }        
        //retutn to back
        Alert::success('تم إضافة العقار إلى قائمة العقارات التي أعجبت الطالب');
        return redirect()->back();
    }
    public function add_to_unliked_list(Request $request)
    {
        //deleted from liked list if exist
        $liked=LikedList::where([['order_to_find_id',$request->order_id],['reale_estate_id',$request->r_estate_id]])->first();
        if($liked!=null)
        {
            $liked->delete();
        }
        //added to unliked list
        $exist_unliked=UnLikedList::where([['order_to_find_id',$request->order_id],['reale_estate_id',$request->r_estate_id]])->first();
        if($exist_unliked==null)
        {
            $unliked=new UnLikedList;
            $unliked->order_to_find_id=$request->order_id;
            $unliked->reale_estate_id=$request->r_estate_id;
            $unliked->save();  
        }
        //retutn to back
        Alert::success('تم إضافة العقار إلى قائمة العقارات التي لم تعجب الطالب');
        return redirect()->back();
    }
}
