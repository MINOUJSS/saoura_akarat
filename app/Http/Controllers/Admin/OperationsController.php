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

class OperationsController extends Controller
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
        return view('admin.operations.index');
    }
    //create
    public function create(Request $request)
    {
        //get reale estate id
        $r_e_id=$request->r_estate_id;
        //get order to find reale estate id
        $order_id=$request->order_id;
        //get reale estate data
        $reale_estate=RealEestate::findOrFail($r_e_id);
        //get order data
        $order_to_find_r_e=OrderToFindRealeEstate::findOrFail($order_id);
        //return create view with this data
        return view('admin.operations.create-operation.index',compact('reale_estate','order_to_find_r_e'));
    }
    //store
    public function store(Request $request)
    {
        //dd($request);
        //validate data
        if($request->transaction==2)
        {
            if($request->exp_date==null){
                $exp_date=date('Y-m-d H:i:s');
                //return redirect back with error
                Alert::error('لم يتم الحفظ,عليك إدخال تاريخ نهاية عقد الإيجار');
                return redirect(route('admin.reale_estate.order.to.find.detailes',$request->order_id));
            }else
            {
                $exp_date=$request->exp_date;
            }
        }else
        {
            $exp_date=null;
        }
        if($request->tax==null)
        {
            //return redirect back with error
            Alert::error('لم يتم الحفظ,عليك إدخال مستحاقات الموقع');
            return redirect(route('admin.reale_estate.order.to.find.detailes',$request->order_id));
        }else
        {
            $tax=$request->tax;
        }
        //insert data in operation table
        $operation=new Operation;
        $operation->reale_estate_id=$request->r_e_id;
        $operation->order_id=$request->order_id;
        if($request->transaction=='للكراء')
        {
            $operation->transaction='كراء';
            $client_operation='كراء';
        }elseif($request->transaction=='للبيع')
        {
            $operation->transaction='بيع';
            $client_operation='شراء';
        }else
        {
            $operation->transaction='تبديل';
            $client_operation='تبديل';
        }
        $operation->exp_date=$request->exp_date;
        $operation->save();
        //insert data in invoice table
        $reale_estate=RealEestate::findOrFail($request->r_e_id);
        $invoice=new Invoice;
        $invoice->operation_id=$operation->id;
        $invoice->price=$reale_estate->price;
        $invoice->tax=$request->tax;
        $invoice->save();
        //change status of reale estate        
        if($request->transaction=='للكراء')
        {
            $reale_estate->statu=3; // تم الكراء
        }else if($request->transaction=='للبيع')
        {
            $reale_estate->statu=4; // تم البيع 
        }else
        {
            $reale_estate->statu=5; // تم التبديل 
        }
        $reale_estate->update();
        //change statu of order to find 
        $order_to_find=OrderToFindRealeEstate::findOrfail($request->order_id);
        if($request->transaction=='للكراء')
        {
            $order_to_find->statu=3; // قام بالكراء
        }else if($request->transaction=='للبيع')
        {
            $order_to_find->statu=4; // قام بالشراء 
        }else
        {
            $order_to_find->statu=5; // قام بالتبديل 
        }
        $order_to_find->update();
        //alert success
        Alert::success('تم إضافة عملية بنجاح');
        //insert into admin_notification table
        $note=new AdminNotification;
        $note->icon_class='fa fa-dolar';
        $note->notification='قام '.$order_to_find->name.' ب'.$client_operation.' عقار';
        $note->link='default';
        $note->type='reale_estate';
        $note->save();
        //update the rdirectecting link        
        $up_note=AdminNotification::find($note->id);
        $up_note->link=url('/admin/reale-estate/order-to-find/'.$order_to_find->id.'/'.$note->id);
        $up_note->update();


        //redirect to order to find reale estate list
        return redirect(route('admin.reale_estate.all.orders.to.find'));
    }
    //edit
    public function edit(Request $request)
    {
        //grt reale estate id
        $r_e_id=$request->r_estate_id;
        //get order to find reale estate id
        $order_id=$request->order_id;
        //get reale estate data
        $reale_estate=RealEestate::findOrFail($r_e_id);
        //get order data
        $order_to_find_r_e=OrderToFindRealeEstate::findOrFail($order_id);
        //get exp_date
        $operation=Operation::where('reale_estate_id',$r_e_id)->where('order_id',$order_id)->first();
        $exp_date=$operation->exp_date;
        //get tax
        $invoice=Invoice::where('operation_id',$operation->id)->first();
        $tax=$invoice->tax;
        //return create view with this data
        return view('admin.operations.edit-operation.index',compact('reale_estate','order_to_find_r_e','exp_date','tax'));
    }
    //update
    public function update(Request $request)
    {
        //validate data
        if($request->transaction==2)
        {
            if($request->exp_date==null){
                $exp_date=date('Y-m-d H:i:s');
                //return redirect back with error
                Alert::error('لم يتم الحفظ,عليك إدخال تاريخ نهاية عقد الإيجار');
                return redirect(route('admin.reale_estate.order.to.find.detailes',$request->order_id));
            }else
            {
                $exp_date=$request->exp_date;
            }
        }else
        {
            $exp_date=null;
        }
        if($request->tax==null)
        {
            //return redirect back with error
            Alert::error('لم يتم الحفظ,عليك إدخال مستحاقات الموقع');
            return redirect(route('admin.reale_estate.order.to.find.detailes',$request->order_id));
        }else
        {
            $tax=$request->tax;
        }
        //insert data in operation table
        $get_opeartion=Operation::where('reale_estate_id',$request->r_e_id)->where('order_id',$request->order_id)->first();
        $opration_id=$get_opeartion->id;
        $operation=Operation::findOrFail($opration_id);
        $operation->reale_estate_id=$request->r_e_id;
        $operation->order_id=$request->order_id;
        if($request->transaction=='للكراء')
        {
            $operation->transaction='كراء';
            $client_operation='كراء';
        }elseif($request->transaction=='للبيع')
        {
            $operation->transaction='بيع';
            $client_operation='شراء';
        }else
        {
            $operation->transaction='تبديل';
            $client_operation='تبديل';
        }
        $operation->exp_date=$request->exp_date;
        $operation->update();
        //insert data in invoice table
        $reale_estate=RealEestate::findOrFail($request->r_e_id);
        $get_invoice=Invoice::where('operation_id',$operation->id)->first();
        $invoice_id=$get_invoice->id;
        $invoice=Invoice::findOrFail($invoice_id);
        $invoice->operation_id=$operation->id;
        $invoice->price=$reale_estate->price;
        $invoice->tax=$request->tax;
        $invoice->update();
        //change status of reale estate        
        if($request->transaction=='للكراء')
        {
            $reale_estate->statu=3; // تم الكراء
        }else if($request->transaction=='للبيع')
        {
            $reale_estate->statu=4; // تم البيع 
        }else
        {
            $reale_estate->statu=5; // تم التبديل 
        }
        $reale_estate->update();
        
        //change statu of order to find 
        $order_to_find=OrderToFindRealeEstate::findOrfail($request->order_id);
        if($request->transaction=='للكراء')
        {
            $order_to_find->statu=3; // قام بالكراء
        }else if($request->transaction=='للبيع')
        {
            $order_to_find->statu=4; // قام بالشراء 
        }else
        {
            $order_to_find->statu=5; // قام بالتبديل 
        }
        $order_to_find->update();
        //alert success
        Alert::success('تم تعديل العملية بنجاح');
        //insert into admin_notification table
        $note=new AdminNotification;
        $note->icon_class='fa fa-dolar';
        $note->notification='قام '.Auth::guard('admin')->user()->name.' بتعديل عملية '.$client_operation.' عقار للزبون '.$order_to_find->name;
        $note->link='default';
        $note->type='reale_estate';
        $note->save();
        //update the rdirectecting link        
        $up_note=AdminNotification::find($note->id);
        $up_note->link=route('admin.reale_estate.order.to.find.notification.detailes',[$order_to_find->id,$note->id]);
        //$up_note->link=url('/admin/reale-estate/order-to-find/'.$order_to_find->id);
        $up_note->update();

        //redirect to order to find reale estate list
        return redirect(route('admin.reale_estate.all.orders.to.find'));
    }
    //destroy
    public function destroy($id)
    {
        //get operation data
        $operation=Operation::findOrFail($id);
        //get reale estate
        $reale_estate=RealEestate::findOrFail($operation->Reale_Estate->id);
        //cahnge reale estate statu
        $reale_estate->statu=0;
        $reale_estate->update();
        //get order data
        $order_id=$operation->Order->id;
        $order=OrderToFindRealeEstate::findOrFail($order_id);
        //delete order
        $order->delete();
        //delete operation
        //$operation->delete();
        //alert success
        Alert::success('تم إنهاء العقد بنجاح');
        //insert into admin_notification table
        $note=new AdminNotification;
        $note->icon_class='fa fa-dolar';
        $note->notification='قام '.Auth::guard('admin')->user()->name.' بإنهاء عقد '.$operation->transaction.' للزبون '.$order->name;
        $note->link='default';
        $note->type='order';
        $note->save();
        //update the rdirectecting link        
        $up_note=AdminNotification::find($note->id);
        $up_note->link=route('admin.reale_estate.all.orders.to.find');
        //$up_note->link=url('/admin/reale-estate/order-to-find/'.$order_to_find->id);
        $up_note->update();
        //redirect
        return redirect(route('admin.reale_estate.all.orders.to.find'));

    }
    
}
