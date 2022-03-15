<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تفاصيل العقار
        <small>هنا ستجد كل تفاصيل العقار</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تفاصيل العقار</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
        <div class="row">
          <div class="col-lg-6">
          <!--start carousel-->
          <div class="box box-solid">
            <div class="box-header with-border">
            <h3 class="box-title">صور العقار</h3>
            {{-- {{get_all_product_images($product->id)}} --}}
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                {{-- <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li> --}}
                @foreach($images as $key=>$image)
                <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" @if($key==0){{'class="active"'}}@endif></li>
                @endforeach
                </ol>
                <div class="carousel-inner">
                {{-- <div class="item active">
                    <img src="{{url('admins/uploads/images/products/'.$image->image)}}" alt="First slide" heigth="500" width="900">
                    <div class="carousel-caption" style="color:#000000">
                    {{$image->image}}
                    </div>
                </div> --}}
                @foreach($images as $key=>$image)
                <div class="item">
                <img src="{{url('admins/uploads/images/'.$image->image)}}" alt="First slide" heigth="500" width="900">
                    <div class="carousel-caption" style="color:#000000">
                    {{$image->image}}
                    </div>
                </div>
                @endforeach
                
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
                </a>
            </div>
            </div><!-- /.box-body -->
        </div>
        <!--end carousel--> 
      </div>
        </div>
      <!-- End Your Page Content Here -->

    </section><!-- /.content -->
  </div>