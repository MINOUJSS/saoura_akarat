<?php

namespace App\Http\Controllers\Site\Landing_page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Notifications\NotificationSender;
use Illuminate\Notifications\RoutesNotifications;
use App\Notifications\NewRealeEstateNotification;
use App\Admin;
use App\Tronsaction;
use App\RealeEstateType;
use App\Wilaya;
use App\Dayra;
use App\Baladia;
use App\Rooms;
use App\Etages;
use App\Furnisheds;
use App\Facads;
use App\Bathes;
use App\Property;
use App\EtageNumber;
use App\RealEestate;
use App\Images;
use App\AdminNotification;
use Image;
use App\Rules\ValidSelectBox;

class RealEstateController extends Controller
{
    public function register()
    {
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

        return view('site.landding_page.register_real_estate.index',compact('tronsaction','reale_estate_types','wilayas','rooms','etages','furnisheds','facads','bathes','properties','etage_numbers'));
    }

    public function store(Request $request)
    {
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
            'price'=>'required',
            'files'=>'required',
            'files.*'=>'image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2000000',
            'contra' =>'required'
        ]);
        /*::::::::::::::::::::::::::::::::::
                insert data in data base 
        :::::::::::::::::::::::::::::::::::*/
        $reale_estate=new RealEestate;
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
        }
        if($request->baladia!=0)
        {
        $reale_estate->baladia=get_baladia_name_from_id($request->baladia);
        }
        $reale_estate->address=$request->address;
        $reale_estate->google_map_code=$request->google_map;
        $reale_estate->description=$request->description;
        $reale_estate->rolls=$request->rolls;
        $reale_estate->save();

        /*::::::::::::::::::::::::::::::::::
                resize and upload images 
        :::::::::::::::::::::::::::::::::::*/
        if($request->file('files'))
        {
            $images=$request->file('files');
            foreach ($images as $index => $image) {
                $image_name=md5(time()).'.'.$image->getClientOriginalExtension();
                $distinationPath=public_path('/admins/uploads/thumbnails');
                $resize_image=Image::make($image->getRealPath());
                $resize_image->resize(600,600,function($constraint){
                    $constraint->aspectRatio();
                })->save($distinationPath.'/'.$image_name);

                $distinationPath=public_path('/admins/uploads/images');
                $image->move($distinationPath,$image_name);
                //insert image name to images tables
                $image=new Images;
                $image->reale_estate_id=$reale_estate->id;
                $image->image=$image_name;
                $image->index=$index;
                $image->save();
            }
        }
        /*::::::::::::::::::::::::::::::::::::
       Notificate Admin About This Reale Estate
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
        $note->notification='تم إضافة '.$reale_estate->type.' '.$reale_estate->transaction;
        $note->link='default';
        $note->type='reale_estate';
        $note->save();
        //update the rdirectecting link        
        $up_note=AdminNotification::find($note->id);
        $up_note->link=url('/admin/detailes/reale-estate/'.$reale_estate->id.'/'.$note->id.'');
        $up_note->update();
        //send email notification
        $note_data=[
            'body'=>$note->notification,
            'action'=>'مشاهدة العقار',
            'url'=>route('admin.reale_estate.detailes',$reale_estate->id),
            'footer'=>'الساورة للعقارات.'
        ];

        $admins=Admin::where('type',1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewRealeEstateNotification($note_data));
        }
        //NotificationSender::send($admins,new NewRealeEstateNotification($note_data));

        /*::::::::::::::::::::::::::::::::::
                   return back() with success
        :::::::::::::::::::::::::::::::::::*/
        Alert::success('تم حفظ العقار بنجاح', 'تم إضافة العقار بنجاح , ستقوم إدارة الساورة للعقارات بالإتصال بك خلال الـ 24 ساعة القادمة إن شاء الله.');
        return redirect()->back()->with('success','تم إضافة العقار بنجاح , ستقوم إدارة الساورة للعقارات بالإتصال بك خلال الـ 24 ساعة القادمة إن شاء الله.');
        //return back()->with('success','تم إضافة العقار بنجاح , ستقوم إدارة الساورة للعقارات بالإتصال بك خلال الـ 24 ساعة القادمة إن شاء الله.');        
    }  
}
