<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\RealEestate;
use App\OrderToFindRealeEstate;
use App\Operation;
use App\Invoice;

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
        //grt reale estate id
        $r_e_id=$request->r_estate_id;
        //get order to find reale estate id
        $order_id=$request->order_id;
        //get reale estate data
        $reale_estate=RealEestate::findOrFail($r_e_id);
        //get order data
        $order_to_find_r_e=RealEestate::findOrFail($order_id);
        //return create view with this data
        return view('admin.operations.create-operation.index',compact('reale_estate','order_to_find_r_e'));
    }
    //store
    public function store(Request $request)
    {
        //dd($request);
        //validate data
        if($request->transaction)
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
        }elseif($request->transaction=='للبيع')
        {
            $operation->transaction='بيع';
        }else
        {
            $operation->transaction='تبديل';
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
        $order_to_find_r_e=RealEestate::findOrFail($order_id);
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
        if($request->transaction)
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
        }elseif($request->transaction=='للبيع')
        {
            $operation->transaction='بيع';
        }else
        {
            $operation->transaction='تبديل';
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

        //redirect to order to find reale estate list
        return redirect(route('admin.reale_estate.all.orders.to.find'));
    }
    //destroy
    public function destroy($id)
    {
        //
        $operation=Operation::findOrFail($id);
        $operation->delete();
    }
    
}
