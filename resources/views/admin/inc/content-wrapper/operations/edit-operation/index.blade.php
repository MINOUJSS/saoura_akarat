<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تعديل عملية
        <small>تعديل عملية البيع أوالكراء أو التبادل للعقارات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل عملية</li>
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
              <i class="fa fa-globe"></i> إضافة عملية.
              <small class="pull-left">التاريخ: {{date('m-d-Y')}}</small>
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
          {{-- <div class="col-sm-4 invoice-col">
            <b>Invoice #007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567
          </div><!-- /.col --> --}}
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <h2>معلومات عن العقار</h2>
          <div class="">
            <p>
              {{$reale_estate->type}}
              @if($reale_estate->rooms!=null){{$reale_estate->rooms}}@endif
              @if($reale_estate->etages!=null)في {{$reale_estate->etages}}@endif
              @if($reale_estate->etage_number!=null) ب{{$reale_estate->etage_number}}@endif
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
        <form role="form" action="{{route('admin.operation.update')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="r_e_id" value="{{$reale_estate->id}}">
          <input type="hidden" name="order_id" value="{{$order_to_find_r_e->id}}">
          <input type="hidden" name="transaction" value="{{$reale_estate->transaction}}">
          @if($reale_estate->transaction=='للكراء')
            <div class="form-group">
              <label for="exp_date">تاريخ نهاية عقد الكراء</label>
              <input type="date" class="form-control" id="exp_date" name="exp_date" placeholder="تاريخ نهاية عقد الكراء" value="{{$exp_date}}">
          </div><!-- /.box-body -->
          @endif
          <div class="box-body">
            <div class="form-group">
              <label for="tax">مستحقات الموقع</label>
              <input type="number" class="form-control" id="tax" name="tax" placeholder="أدخل مستحقات الموقع" value="{{$tax}}">
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
          </div>
        </form>
          {{-- <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  <th>Serial #</th>
                  <th>Description</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Call of Duty</td>
                  <td>455-981-221</td>
                  <td>El snort testosterone trophy driving gloves handsome</td>
                  <td>$64.50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Need for Speed IV</td>
                  <td>247-925-726</td>
                  <td>Wes Anderson umami biodiesel</td>
                  <td>$50.00</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Monsters DVD</td>
                  <td>735-845-642</td>
                  <td>Terry Richardson helvetica tousled street art master</td>
                  <td>$10.70</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Grown Ups Blue Ray</td>
                  <td>422-568-642</td>
                  <td>Tousled lomo letterpress</td>
                  <td>$25.99</td>
                </tr>
              </tbody>
            </table>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->

        <div class="row">
          {{-- <!-- accepted payments column -->
          <div class="col-xs-6">
            <p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>
          </div><!-- /.col -->
          <div class="col-xs-6">
            <p class="lead">Amount Due 2/22/2014</p>
            <div class="table-responsive">
              <table class="table">
                <tbody><tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>$250.30</td>
                </tr>
                <tr>
                  <th>Tax (9.3%)</th>
                  <td>$10.34</td>
                </tr>
                <tr>
                  <th>Shipping:</th>
                  <td>$5.80</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>$265.24</td>
                </tr>
              </tbody></table>
            </div>
          </div><!-- /.col --> --}}
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