<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\ValidSelectBox;
use App\RealEestate;
use App\OrderToFindRealeEstate;
use App\Images;
use App\LikedList;
use App\UnlikedList;
use App\Tronsaction;
use App\RealeEstateType;
use App\Wilaya;
use App\Rooms;
use App\Etages;
use App\Furnisheds;
use App\Facads;
use App\Bathes;
use App\Property;
use App\EtageNumber;
use App\AdminNotification;
use Image;
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
        $tronsaction=Tronsaction::all();
        $reale_estate_types=RealeEstateType::all();
        $wilayas=Wilaya::all();
        $rooms=Rooms::all();
        $etages=Etages::all();
        $furnisheds=Furnisheds::all();
        $facads=Facads::all();
        $bathes=Bathes::all();
        $properties=Property::all();
        $etage_numbers=EtageNumber::all();
        return view('admin.reale-estates.edit.index',compact('reale_estate','tronsaction','reale_estate_types','wilayas','rooms','etages','furnisheds','facads','bathes','properties','etage_numbers'));
    }

    public function update(Request $request,$id)
    {
        //dd(get_etage_number_from_id($request->etage_number));
        /*::::::::::::::::::::::::::::::::::
                      validation
        ::::::::::::::::::::::::::::::::::*/
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'r_e_type'=>new ValidSelectBox
        ]);
        //r_e_type validation 
        if($request->r_e_type == 1 || $request->r_e_type == 3)
        {
            $this->validate($request,[
                'rooms'=>new ValidSelectBox,
                'etage'=>new ValidSelectBox,
                'furnished'=>new ValidSelectBox,
                'bathes'=>new ValidSelectBox,
                'properties'=>new ValidSelectBox
            ]);
        }elseif($request->r_e_type == 3)
        {
            $this->validate($request,[
                'properties'=>new ValidSelectBox
            ]);
        }elseif($request->r_e_type == 2)
        {
            $this->validate($request,[
                'facad'=>new ValidSelectBox,
                'etage_number'=>new ValidSelectBox,
                'furnished'=>new ValidSelectBox,
                'bathes'=>new ValidSelectBox,
                'properties'=>new ValidSelectBox
            ]);
        }elseif($request->r_e_type == 5)
        {
            $this->validate($request,[
                'facad'=>new ValidSelectBox
            ]);
        }elseif($request->r_e_type == 6)
        {
            $this->validate($request,[
                'etage'=>new ValidSelectBox,
                'facad'=>new ValidSelectBox,
                'etage_number'=>new ValidSelectBox
            ]);
        }
        $this->validate($request,[
            'tronsaction'=>new ValidSelectBox,
            'wilaya'=>new ValidSelectBox,
            'price'=>'required'
            // 'files'=>'required',
            // 'files.*'=>'image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2000000',
            // 'contra' =>'required'
        ]);
        /*::::::::::::::::::::::::::::::::::
                update data in data base 
        :::::::::::::::::::::::::::::::::::*/
        $reale_estate=RealEestate::findOrFail($id);
        $reale_estate->name=$request->name;
        $reale_estate->phone=$request->phone;
        $reale_estate->type=get_reale_estate_type($request->r_e_type);
        if($request->r_e_type == 1 || $request->r_e_type == 3)
        {
        $reale_estate->rooms=get_rooms_from_id($request->rooms);
        $reale_estate->baths=get_bathes_from_id($request->bathes);
        $reale_estate->etages=get_etages_from_id($request->etage);
        $reale_estate->furnished=get_furnisheds_from_id($request->furnished);
        $reale_estate->property=get_properies_from_id($request->properties);
        }elseif($request->r_e_type == 2)
        {
        $reale_estate->facad=get_facads_from_id($request->facad);
        $reale_estate->etage_number=get_etage_number_from_id($request->etage_number);
        $reale_estate->furnished=get_furnisheds_from_id($request->furnished);
        $reale_estate->baths=get_bathes_from_id($request->bathes);
        $reale_estate->property=get_properies_from_id($request->properties);
        }elseif($request->r_e_type == 3)
        {
            $reale_estate->property=get_properies_from_id($request->properties);
        }elseif($request->r_e_type == 5)
        {
        $reale_estate->facad=get_facads_from_id($request->facad); 
        }elseif($request->r_e_type == 6)
        {
        $reale_estate->etages=get_etages_from_id($request->etage);
        $reale_estate->facad=get_facads_from_id($request->facad);
        $reale_estate->etage_number=get_etage_number_from_id($request->etage_number);      
        }
        // $reale_estate->property=get_properies_from_id($request->properties);
        $reale_estate->transaction=get_tronsactions_from_id($request->tronsaction);
        //$reale_estate->garage=$request->garage;
        $reale_estate->price=$request->price;
        $reale_estate->wilaya=get_wilaya_name_from_id($request->wilaya);
        if($request->dayra!=0)
        {
        $reale_estate->dayra=get_dayra_name_from_id($request->dayra);
        }else
        {
            $reale_estate->dayra=Null;
        }
        if($request->baladia!=0)
        {
        $reale_estate->baladia=get_baladia_name_from_id($request->baladia);
        }else
        {
            $reale_estate->baladia=Null;   
        }
        $reale_estate->address=$request->address;
        $reale_estate->google_map_code=$request->google_map;
        $reale_estate->description=$request->description;
        $reale_estate->rolls=$request->rolls;
        $reale_estate->update();

        /*::::::::::::::::::::::::::::::::::::
       Notificate Admin About This Reale Estate update
        :::::::::::::::::::::::::::::::::::::*/
        //auto select icon class for notification
        if($reale_estate->type=='شقة')
        {
            $icon_class='fa fa-key';
        }elseif($reale_estate->type=='ستيديو')
        {
            $icon_class='fa fa-building';
        }elseif($reale_estate->type=='مزرعة')
        {
            $icon_class='fa fa-home';
        }elseif($reale_estate->type=='أرض')
        {
            $icon_class='fa fa-map';
        }elseif($reale_estate->type=='محل')
        {
            $icon_class='fa fa-shopping-cart';
        }elseif($reale_estate->type=='مكتب')
        {
            $icon_class='fa fa-briefcase';
        }else
        {
            $icon_class='fa fa-home';
        }
        //insert into admin_notification table
        $note=new AdminNotification;
        $note->icon_class=$icon_class;
        $note->notification='قام'.Auth::guard('admin')->user()->name.' بتعديل عقار '.$reale_estate->transaction;
        $note->link='default';
        $note->type='reale_estate';
        $note->save();
        //update the rdirectecting link        
        $up_note=AdminNotification::find($note->id);
        $up_note->link=url('/admin/detailes/reale-estate/'.$reale_estate->id.'/'.$note->id.'');
        $up_note->update();

        /*::::::::::::::::::::::::::::::::::
                   return back() with success
        :::::::::::::::::::::::::::::::::::*/
        Alert::success('تم تعديل العقار بنجاح');
        return redirect()->back()->with('success','تم تعديل العقار بنجاح .');
        //return redirect('admin.reale_estates');        

    }

    public function edit_reale_estate_images($id)
    {
        $reale_estate=RealEestate::findOrfail($id);
        $images=Images::where('reale_estate_id',$id)->get();
        return view('admin.reale-estates.edit-reale-estate-images.index',compact('reale_estate','images'));
    }
    public function add_images_to_reale_estate(Request $request,$id)
    {
        $reale_estate=RealEestate::findOrFail($id);
        /*::::::::::::::::::::::::::::::::::
                      validation
        :::::::::::::::::::::::::::::::::::*/
        $this->validate($request,[
            'files'=>'required',
            'files.*'=>'image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2000000',
        ]);

        /*::::::::::::::::::::::::::::::::::
                resize and upload images 
        :::::::::::::::::::::::::::::::::::*/
        if($request->file('files'))
        {
            $images=$request->file('files');            
            foreach ($images as $index => $image) {
                $image_name=$image->getClientOriginalName().'_'.md5(time()).'.'.$image->getClientOriginalExtension();
                $distinationPath=public_path('/admins/uploads/thumbnails');
                $resize_image=Image::make($image->getRealPath());
                $resize_image->resize(600,600,function($constraint){
                    $constraint->aspectRatio();
                })->save($distinationPath.'/'.$image_name);

                //$distinationPath=public_path('/admins/uploads/images');
                //$image->move($distinationPath,$image_name);
                
                //insert image name to images tables
                $n_image=new Images;
                $n_image->reale_estate_id=$id;
                $n_image->image=$image_name;
                $n_image->index=$index;
                $n_image->save();
            }
        }
        /*::::::::::::::::::::::::::::::::::::
       Notificate Admin About This new images
        :::::::::::::::::::::::::::::::::::::*/
        //auto select icon class for notification
        if($reale_estate->type=='شقة')
        {
            $icon_class='fa fa-key';
        }elseif($reale_estate->type=='ستيديو')
        {
            $icon_class='fa fa-building';
        }elseif($reale_estate->type=='مزرعة')
        {
            $icon_class='fa fa-home';
        }elseif($reale_estate->type=='أرض')
        {
            $icon_class='fa fa-map';
        }elseif($reale_estate->type=='محل')
        {
            $icon_class='fa fa-shopping-cart';
        }elseif($reale_estate->type=='مكتب')
        {
            $icon_class='fa fa-briefcase';
        }else
        {
            $icon_class='fa fa-home';
        }
        //insert into admin_notification table
        $note=new AdminNotification;
        $note->icon_class=$icon_class;
        $note->notification='قام '.Auth::guard('admin')->user()->name.' بإضافة صور جديدة للعقار رقم : '.$id;
        $note->link='default';
        $note->type='reale_estate';
        $note->save();
        //update the rdirectecting link        
        $up_note=AdminNotification::find($note->id);
        $up_note->link=url('/admin/detailes/reale-estate/'.$id.'/'.$note->id.'');
        $up_note->update();
        //success Alert and Redirect
        Alert::success('تم إضافة الصورة بنجاح');
        return redirect()->back();
    }
    public function update_reale_estate_images()
    {
        dd('progarme it now');
    }
    public function delete_image($id)
    {
     //delete image from folder
     $image=Images::findOrFail($id);
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
     //delete image form database
     $image->delete();
     //success alert and redirect
     Alert::success('تم حدف الصورة بنجاح');
     return redirect()->back();
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
        return redirect(route('admin.reale_estates'));
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
