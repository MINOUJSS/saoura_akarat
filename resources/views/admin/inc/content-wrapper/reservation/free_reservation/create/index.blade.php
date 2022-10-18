<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        حجز مجاني
        <small>حجز مجاني لمدة 48 ساعة</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">حجز مجاني</li>
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
              <i class="fa fa-globe"></i> حجز عقار لمدة 48 ساعة.
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
        <form role="form" action="{{route('admin.free.reservation.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="r_e_id" value="{{$reale_estate->id}}">
          <input type="hidden" name="order_id" value="{{$order_to_find_r_e->id}}">
          <input type="hidden" name="transaction" value="{{$reale_estate->transaction}}">
          <div class="form-group">
            <h3>
              سيتم حجز هذا العقار لصالح : {{  $order_to_find_r_e->name }}. ثمانية و أربعين (48) ساعة إبتداءا من اليوم {{date('d-m-Y H:i:s')}} إلى غاية {{ $AfterTomorrow }}
            </h3>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">حجز</button>
          </div>
        </form>
        </div><!-- /.row -->

        <div class="row">
        </div><!-- /.row -->
      </section>
      <!--End Your Page Content Here-->

    </section><!-- /.content -->
  </div>