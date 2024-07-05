<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         تحرير عقار
        <small>تحرير عقار</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تحرير عقار</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> تحرير عقار.
              <small class="pull-left">التاريخ: {{date('d-m-Y')}}</small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            صاحب العقار
            <address>
              <strong>{{$reale_estate->name}}</strong><br>
              رقم الهاتف:{{$reale_estate->phone}}<br>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            صاحب الطلب
            <address>
              <strong>{{$order_to_find_r_e->name}}</strong><br>
              رقم الهاتف:{{$order_to_find_r_e->phone}}<br>
            </address>
          </div><!-- /.col -->
          
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <h2>معلومات عن العقار</h2>
          <div class="">
            <p>
              {{$reale_estate->type}}
              @if($reale_estate->rooms!=null){{$reale_estate->rooms}}@endif
              @if($reale_estate->etages!=null)في {{$reale_estate->etages}}@endif
              @if($reale_estate->etage_number!=null) بـ {{'('.$reale_estate->etage_number.') طابق, '}}@endif
              @if($reale_estate->facad!=null) ب{{$reale_estate->facad}}@endif
              @if($reale_estate->furnished!=null) {{$reale_estate->furnished}}ة@endif
              @if($reale_estate->baths!=null) عدد الحمامات ({{$reale_estate->baths}})@endif
              @if($reale_estate->property!=null) {{$reale_estate->property}}@endif
              @if($reale_estate->transaction!=null) {{$reale_estate->transaction}}@endif
              @if($reale_estate->wilaya!=null) بولاية {{$reale_estate->wilaya}}@endif
              @if($reale_estate->dayra!=null) دائرة {{$reale_estate->dayra}}@endif
              @if($reale_estate->baladia!=null) بلدية {{$reale_estate->baladia}}@endif
              @if($reale_estate->address!=null) {{$reale_estate->address}}@endif
              @if($reale_estate->price!=null) بسعر {{$reale_estate->price}} دينار جزائري@endif
              @if($reale_estate->transaction=='للكراء'){{'في الشهر'}}@endif
            </p>
          </div>
          <!-- form start -->
        <form role="form" action="{{route('admin.operation.annuler')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="operation_id" value="{{$operation->id}}">
          <input type="hidden" name="r_e_id" value="{{$reale_estate->id}}">
          <input type="hidden" name="order_id" value="{{$order_to_find_r_e->id}}">
          <input type="hidden" name="transaction" value="{{$reale_estate->transaction}}">
          @if($reale_estate->transaction=='للكراء')
            <div class="form-group">
              <label for="exp_date">تاريخ نهاية عقد الكراء</label>
              <input type="date" class="form-control" id="exp_date" name="exp_date" value="{{$operation->exp_date}}" disabled>
          </div><!-- /.box-body -->
          @endif
          <div class="box-body">
            <div class="form-group">
              <label for="tax">مستحقات الموقع</label>
              <input type="number" class="form-control" id="tax" name="tax" value="{{$operation->invoice->tax}}" disabled>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-danger">تحرير العقار</button>
          </div>
        </form>
         
        </div><!-- /.row -->

        <div class="row">
          
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        {{-- <div class="row no-print">
          <div class="col-xs-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
            <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
          </div>
        </div> --}}
      </section>

      {{-- <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة عملية</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.operation.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="r_e_id" value="1">
          <input type="hidden" name="order_id" value="2">
          معلومات عن العقار و طالب العقار
          <div class="box-body">
            <div class="form-group">
              <label for="tax">مستحقات الموقع</label>
              <input type="number" class="form-control" id="tax" placeholder="أدخل مستحقات الموقع">
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
          </div>
        </form>
      </div> --}}
      <!--End Your Page Content Here-->

    </section><!-- /.content -->
  </div>