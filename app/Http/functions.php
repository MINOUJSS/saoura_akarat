<?php
/*:::::::::::::::::::::::::::::::::::::::::::::::::
                Admin functions
::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*-------------------------------------------
 |               Notifications Functions
 --------------------------------------------*/
 //reale estate notification
 function get_reale_estate_notifications()
 {
     $notes=App\AdminNotification::OrderBy('id','desc')->where('type','reale_estate')->get();
     return $notes;
 }
  //no reading reale estate notification
  function get_no_reading_reale_estate_notifications()
  {
      $notes=App\AdminNotification::OrderBy('id','desc')->where('type','reale_estate')->get()->toArray();
      $no_reading_notes=[];
      foreach ($notes as $note) {
          if(!is_reading($note['id'],Auth::guard('admin')->user()->id))
          {
            array_push($no_reading_notes,$note);
          }
      }
      return $no_reading_notes;
  }
//print no reading reale estate notification to string
function print_no_reading_reale_estate_notifications_to_string()
{
    $notes=App\AdminNotification::OrderBy('id','desc')->where('type','reale_estate')->get()->toArray();
    $no_reading_notes=[];
    foreach ($notes as $note) {
        if(!is_reading($note['id'],Auth::guard('admin')->user()->id))
        {
          array_push($no_reading_notes,$note);
        }
    }
    if(count($no_reading_notes)==1)
    {
        return 'تم تسجيل عقار جديد';
    }elseif(count($no_reading_notes)==2)
    {
        return 'تم تسجيل عقارين جديدين';
    }elseif(count($no_reading_notes) >= 3 && count($no_reading_notes) <= 10)
    {
        return ' تم تسجيل'.count($no_reading_notes).'عقارات جديدة ';
    }elseif(count($no_reading_notes) > 10)
    {
        return ' تم تسجيل'.count($no_reading_notes).' عقار جديد';
    }else
    {
        return 'لا يوجد أي إشعار جديد';  
    }
}
 //order notification
 function get_order_notifications()
 {
     $notes=App\AdminNotification::OrderBy('id','desc')->where('type','order')->get();
     return $notes;
 }
  //no reading order notification
  function get_no_reading_order_notifications()
  {
      $notes=App\AdminNotification::OrderBy('id','desc')->where('type','order')->get()->toArray();
      $no_reading_notes=[];
      foreach ($notes as $note) {
          if(!is_reading($note['id'],Auth::guard('admin')->user()->id))
          {
            array_push($no_reading_notes,$note);
          }
      }
      return $no_reading_notes;
  }
//print no reading order notification to string
function print_no_reading_order_notifications_to_string()
{
    $notes=App\AdminNotification::OrderBy('id','desc')->where('type','order')->get()->toArray();
    $no_reading_notes=[];
    foreach ($notes as $note) {
        if(!is_reading($note['id'],Auth::guard('admin')->user()->id))
        {
          array_push($no_reading_notes,$note);
        }
    }
    if(count($no_reading_notes)==1)
    {
        return 'لديك طلب جديد';
    }elseif(count($no_reading_notes)==2)
    {
        return 'لديك طلبين جديدين';
    }elseif(count($no_reading_notes) >= 3 && count($no_reading_notes) <= 10)
    {
        return ' لديك'.count($no_reading_notes).'طلبات جديدة ';
    }elseif(count($no_reading_notes) > 10)
    {
        return ' لديك'.count($no_reading_notes).' طلب جديد';
    }else
    {
        return 'لا يوجد أي طلب جديد';  
    }
}
 //message notification
 function get_message_notifications()
 {
     $notes=App\AdminNotification::OrderBy('id','desc')->where('type','message')->get();
     return $notes;
 }
  //no reading message notification
  function get_no_reading_message_notifications()
  {
      $notes=App\AdminNotification::OrderBy('id','desc')->where('type','message')->get()->toArray();
      $no_reading_notes=[];
      foreach ($notes as $note) {
          if(!is_reading($note['id'],Auth::guard('admin')->user()->id))
          {
            array_push($no_reading_notes,$note);
          }
      }
      return $no_reading_notes;
  }
//print no reading message notification to string
function print_no_reading_message_notifications_to_string()
{
    $notes=App\AdminNotification::OrderBy('id','desc')->where('type','message')->get()->toArray();
    $no_reading_notes=[];
    foreach ($notes as $note) {
        if(!is_reading($note['id'],Auth::guard('admin')->user()->id))
        {
          array_push($no_reading_notes,$note);
        }
    }
    if(count($no_reading_notes)==1)
    {
        return 'لديك رسالة جديدة';
    }elseif(count($no_reading_notes)==2)
    {
        return 'لديك رسالتين جديدتين';
    }elseif(count($no_reading_notes) >= 3 && count($no_reading_notes) <= 10)
    {
        return ' لديك'.count($no_reading_notes).'رسائل جديدة ';
    }elseif(count($no_reading_notes) > 10)
    {
        return ' لديك'.count($no_reading_notes).' رسالة جديدة';
    }else
    {
        return 'لا يوجد أي رسالة جديدة';  
    }
}
 //reding notification
 function is_reading($note_id,$admin_id)
 {
     $reading_note=App\AdminNotificationVue::where('notification_id',$note_id)->where('admin_id',$admin_id)->first();
     if($reading_note!=null)
     {
         return true;
     }
    return false;
 }
 //admin_type_to_string
 function admin_type_to_string($type)
 {
    switch ($type) {
        case '1':
            return 'مدير الموقع';
            break;
            case '2':
                return 'مساعد مدير الموقع';
                break;
        default:
            return 'طابع الفاتورة';
            break;
    }
 }
 //notification_readed
 function notification_readed($id)
 {
    $note_vue=new App\AdminNotificationVue;
    $note_vue->admin_id=Auth::guard('admin')->user()->id;
    $note_vue->notification_id=$id;
    $note_vue->save();
 }
 //is_readed_notification
 function is_readed_notification($admin_id,$notification_id)
 {
     $note_vue= App\AdminNotificationVue::where('admin_id',$admin_id)->where('notification_id',$notification_id)->first();
     //dd ($note_vue);
    if($note_vue==null)
    {
        return false;
    }
    else
    {
        return true;
    }
 }
/*-------------------------------------------
 |               side bar active link
 --------------------------------------------*/
 function active_dashboard_link()
{ 
    $home_url=url('/admin'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//----السياسة الخصوصية
function active_contra_link()
{ 
    $home_url=url('/admin/edit/contra'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//----العقارات
function active_reale_estate_link()
{ 
    $home_url=url('/admin/reale-estates'); 
    $url1=route('admin.reale-estate.type.apartments');
    $url2=route('admin.reale-estate.type.houses');
    $url3=route('admin.reale-estate.type.studios');
    $url4=route('admin.reale-estate.type.farms');
    $url5=route('admin.reale-estate.type.lands');
    $url6=route('admin.reale-estate.type.shops');
    $url7=route('admin.reale-estate.type.bereaus');
    $current_url=Request::url();
    if($current_url==$home_url || $current_url==$url1 || $current_url==$url2 || $current_url==$url3 || $current_url==$url4 || $current_url==$url5 || $current_url==$url6 || $current_url==$url7)
    {
        return 'active';
    }
    else
    {
        return '';
    }      

}
function active_all_reale_estate_link()
{ 
    $home_url=url('/admin/reale-estates');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_type_apartments_link()
{ 
    $home_url=route('admin.reale-estate.type.apartments');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_type_houses_link()
{ 
    $home_url=route('admin.reale-estate.type.houses');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_type_studios_link()
{ 
    $home_url=route('admin.reale-estate.type.studios');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_type_farms_link()
{ 
    $home_url=route('admin.reale-estate.type.farms');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_type_lands_link()
{ 
    $home_url=route('admin.reale-estate.type.lands');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_type_shops_link()
{ 
    $home_url=route('admin.reale-estate.type.shops');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_reale_estate_type_bereaus_link()
{ 
    $home_url=route('admin.reale-estate.type.bereaus');
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
//----طلبات الزبائن
function active_orders_to_find_reale_estate_link()
{ 
    $home_url=route('admin.reale_estate.all.orders.to.find'); 
    $url1=route('admin.reale_estate.order.to.find.transaction.for.rent'); 
    $url2=route('admin.reale_estate.order.to.find.transaction.for.sall'); 
    $url3=route('admin.reale_estate.order.to.find.transaction.for.change'); 
    $current_url=Request::url();
    if($current_url==$home_url || $current_url==$url1 || $current_url==$url2 || $current_url==$url3)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_all_order_to_find_reale_estate_link()
{ 
    $home_url=route('admin.reale_estate.all.orders.to.find'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_order_to_find_reale_estate_to_rent_link()
{ 
    $home_url=route('admin.reale_estate.order.to.find.transaction.for.rent'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_order_to_find_reale_estate_to_sall_link()
{ 
    $home_url=route('admin.reale_estate.order.to.find.transaction.for.sall'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
function active_order_to_find_reale_estate_to_change_link()
{ 
    $home_url=route('admin.reale_estate.order.to.find.transaction.for.change'); 
    $current_url=Request::url();
    if($current_url==$home_url)
    {
        return 'active';
    }
    else
    {
        return '';
    }      
}
/**---------------------------------------
 * |           reale estate functions
 * ---------------------------------------*/
function get_reale_estate_type($type_id)
{
  $r_e_type=App\RealeEstateType::find($type_id);
  return $r_e_type->type;
}
function get_wilaya_name_from_id($wilaya_id)
{
    $wilaya=App\Wilaya::find($wilaya_id);
    return $wilaya->ar_name;
}
function get_wilaya_id_from_name($wilaya_name)
{
    $wilaya=App\Wilaya::where('ar_name',$wilaya_name)->first();
    return $wilaya->id;
}
function get_dayra_name_from_id($dayra_id)
{
    $dayra=App\Dayra::find($dayra_id);
    return $dayra->ar_name;
}
function get_dayra_id_from_name($wilaya_id,$dayra_name)
{
    $dayra=App\Dayra::where([['wilaya_id',$wilaya_id],['ar_name',$dayra_name]])->first();
    return $dayra->id;
}
function get_baladia_name_from_id($baladia_id)
{
    $baladia=App\Baladia::find($baladia_id);
    return $baladia->ar_name;
}
function get_rooms_from_id($room_id)
{
    $rooms=App\Rooms::find($room_id);
    return $rooms->rooms;
}
function get_bathes_from_id($bathe_id)
{
    $bathes=App\Bathes::find($bathe_id);
    return $bathes->bathes;
}
function get_etages_from_id($etage_id)
{
    $etages=App\Etages::find($etage_id);
    return $etages->etages;
}
function get_etage_number_from_id($etage_number_id)
{
    $etage_number=App\EtageNumber::find($etage_number_id);
    return $etage_number->etage_number;
}
function get_facads_from_id($facad_id)
{
    $facads=App\Facads::find($facad_id);
    return $facads->facads;
}
function get_furnisheds_from_id($furnished_id)
{
    $furnisheds=App\Furnisheds::find($furnished_id);
    return $furnisheds->furnisheds;
}
function get_properies_from_id($property_id)
{
    $properties=App\Property::find($property_id);
    return $properties->property;
}
function get_tronsactions_from_id($tronsaction_id)
{
    $tronsactions=App\Tronsaction::find($tronsaction_id);
    return $tronsactions->tronsaction;
}

//
function is_in_liked_or_unliked_list($order_id,$r_estate_id)
{
    $liked=App\LikedList::where([['order_to_find_id',$order_id],['reale_estate_id',$r_estate_id]])->first();
    $unliked=App\UnLikedList::where([['order_to_find_id',$order_id],['reale_estate_id',$r_estate_id]])->first();
    if($liked!=null || $unliked!=null)
    {
        return false;
    }
    else
    {
        return true;
    }
}
//
function reale_estate_has_operation($id)
{
    $operation=App\Operation::where('reale_estate_id',$id)->first();
    if($operation!=null){
        return true;
    }else
    {
      return false;
    }
}
// 
function reale_estate_has_free_reservation($id)
{
 return false;
}
// 
function reale_estate_has_paied_reservation($id)
{
 return false;
}
//
function order_to_find_has_operation($id)
{
    $operation=App\Operation::where('order_id',$id)->first();
    if($operation!=null){
        return true;
    }else
    {
      return false;
    }
}
//
function get_reale_estate_statu_code($id)
{
    $reale_estate=App\RealEestate::findOrFail($id);
    return $reale_estate->statu;
}
//
function print_reale_estate_statu($id)
{
 $reale_estate=App\RealEestate::findOrFail($id);
 if($reale_estate->statu==0)
 {
     $html='<span class="label label-warning">قيد اللإنتظار</span>';
 }elseif($reale_estate->statu==1)
 {
    $html='<span class="label label-danger">محجوز مؤقتاً</span>';
 }elseif($reale_estate->statu==2)
 {
    $html='<span class="label label-info">محجوز بعربون</span>';
 }elseif($reale_estate->statu==3)
 {
    $html='<span class="label label-success">تم الكراء</span>';
 }elseif($reale_estate->statu==4)
 {
    $html='<span class="label label-success">تم البيع</span>';
 }elseif($reale_estate->statu==5)
 {
    $html='<span class="label label-success">تم التبديل</span>';
 }else
 {
    $html='<span class="label label-danger">إنتهى عقد الإيجار</span>';
 }
 return $html;
}
//
function print_order_to_find_statu($id)
{
 $order_to_find=App\OrderToFindRealeEstate::findOrFail($id);
 if($order_to_find->statu==0)
 {
     $html='<span class="label label-warning">قيد اللإنتظار</span>';
 }elseif($order_to_find->statu==1)
 {
    $html='<span class="label label-danger">قام بحجز مؤقت</span>';
 }elseif($order_to_find->statu==2)
 {
    $html='<span class="label label-info">قام بحجز بعربون</span>';
 }elseif($order_to_find->statu==3)
 {
    $html='<span class="label label-success">قام بالكراء</span>';
 }elseif($order_to_find->statu==4)
 {
    $html='<span class="label label-success">قام بالشراء</span>';
 }elseif($order_to_find->statu==5)
 {
    $html='<span class="label label-success">قام بالتبديل</span>';
 }elseif($order_to_find->statu==6)
 {
    $html='<span class="label label-warning">قيد البحث</span>';  
 }else
 {
    $html='<span class="label label-danger">إنتهى عقد الإيجار</span>';
 }
 return $html;
}
//-----count reale estate functiond----
function count_homes()
{
    $reale_estate=App\RealEestate::where('type','منزل')->get();
    return count($reale_estate);
}
function count_apartments()
{
    $reale_estate=App\RealEestate::where('type','شقة')->get();
    return count($reale_estate);
}
function count_studios()
{
    $reale_estate=App\RealEestate::where('type','ستيديو')->get();
    return count($reale_estate);
}
function count_farms()
{
    $reale_estate=App\RealEestate::where('type','مزرعة')->get();
    return count($reale_estate);
}
function count_lands()
{
    $reale_estate=App\RealEestate::where('type','أرض')->get();
    return count($reale_estate);
}
function count_shops()
{
    $reale_estate=App\RealEestate::where('type','محل')->get();
    return count($reale_estate);
}
function count_bereaux()
{
    $reale_estate=App\RealEestate::where('type','مكتب')->get();
    return count($reale_estate);
}
//--------end of operation--------
function is_end_of_rent($operation_id)
{
    $now=new DateTime();
    $operation=App\Operation::findOrFail($operation_id);
    $exp_date=new DateTime($operation->exp_date.' 23:59:59');
    if($exp_date >= $now)
    {
        $interval=$now->diff($exp_date);
        $dif_date = $interval->format('%d');   
    }else
    {
        $dif_date='0';
    }
    if($operation->transaction=='كراء' && $dif_date == 0 )
    {
    return false;
    }else
    {
    return true;
    }
}
/*:::::::::::::::::::::::::::::::::::::::::::::::::
                Site functions
::::::::::::::::::::::::::::::::::::::::::::::::::*/
//++++++++++++++head functions+++++++++++++++++++++
function get_public_folder()
{
    // dd(URL::to("/"));
  if(URL::to("/")=="http://127.0.0.1:8000")
    {
        return '';
    }else
    {
        return '/public';
    }  
}
//++++++++++++++++++body functions ++++++++++
