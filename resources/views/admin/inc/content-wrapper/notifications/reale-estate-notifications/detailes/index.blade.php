<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تفاصيل الإشعار
        <small>تفاصيل الإشعار بالعقار</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تفاصيل الإشعار</li>
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
          </div><!-- /.box-header -->
          <div class="box-body">
              <!--start test-->
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              @foreach($images as $key=>$image)
              <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" class="@if($key==0){{'active'}}@endif"></li>
              @endforeach
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              @foreach($images as $key=>$image)
              <div class="item @if($key==0){{'active'}}@endif">
                <img src="{{url('/admins/uploads/thumbnails').'/'.$image->image}}" alt="{{$image->image}}">
                <div class="carousel-caption">
                  {{$image->image}}
                </div>
              </div>
              @endforeach
            </div>
          
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    <!--end test-->
          </div><!-- /.box-body -->
      </div>
      <!--end carousel--> 
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">معلومات العقار</div>
      
        <!-- Table -->
        <table class="table">
          <tr>
            <td>إسم صاحب العقار</td>
            <td>{{$reale_estate->name}}</td>
          </tr>
          <tr>
            <td>رقم الهاتف</td>
            <td><a href="tel:{{$reale_estate->phone}}"><i class="fa fa-phone"> {{$reale_estate->phone}}</i></a></td>
          </tr>
          <tr>
            <td>نوع العقار</td>
            <td>{{$reale_estate->type}}</td>
          </tr>
          <tr>
            <td>عدد الغرف</td>
            <td>{{$reale_estate->rooms}}</td>
          </tr>
          <tr>
            <td>عدد الحمامات</td>
            <td>{{$reale_estate->baths}}</td>
          </tr>
          <tr>
            <td>الطابق</td>
            <td>{{$reale_estate->etages}}</td>
          </tr>
          <tr>
            <td>عدد الطوابق</td>
            <td>{{$reale_estate->etage_number}}</td>
          </tr>
          <tr>
            <td>الواجهات</td>
            <td>{{$reale_estate->facad}}</td>
          </tr>
          <tr>
            <td>الأثاث</td>
            <td>{{$reale_estate->furnished}}</td>
          </tr>
          <tr>
            <td>وضعية العقار</td>
            <td>{{$reale_estate->property}}</td>
          </tr>
          <tr>
            <td>نوع المعاملة</td>
            <td>{{$reale_estate->transaction}}</td>
          </tr>
          <tr>
            <td>السعر</td>
            <td>{{$reale_estate->price}} د.ج</td>
          </tr>
          <tr>
            <td>الولاية</td>
            <td>{{$reale_estate->wilaya}}</td>
          </tr>
          <tr>
            <td>الدائرة</td>
            <td>{{$reale_estate->dayra}}</td>
          </tr>
          <tr>
            <td>البلدية</td>
            <td>{{$reale_estate->baladia}}</td>
          </tr>
          <tr>
            <td>العنوان</td>
            <td>{{$reale_estate->address}}</td>
          </tr>
          <tr>
            <td>العنوان على خريطة قوقل ماب</td>
            <td>{{$reale_estate->google_map_code}}</td>
          </tr>
          <tr>
            <td>تفاصيل أخرى عن العقار</td>
            <td>{{$reale_estate->description}}</td>
          </tr>
          <tr>
            <td>شروط الكراء أو البيع</td>
            <td>{{$reale_estate->rolls}}</td>
          </tr>
        </table>
      </div>
    </div>
    <!--satart liked and unliked list-->
    <div class="row">
      <div class="col-md-6">
        <!--start-->
      <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">الزبائن الذين أعجبهم هذا العقار</h3>          
      </div><!-- /.box-header -->
      <div class="box-body">
            <!--start test-->
            <!--start-->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" style="white-space: nowrap;">
            <tbody><tr>
              <th>الرقم</th>
              <th>رقم الطلب</th>
              <th>إسم صاحب طالب</th>
              <th>هاتف صاحب الطلب</th>
              <th>نوع العقار</th>
              <th>عدد الغرف</th>
              <th>عدد الحمامات</th>
              <th>الطابق</th>
              <th>عدد الطوابق</th>
              <th>الواجهات</th>
              <th>الأثاث</th>
              <th>وضعية العقار</th>
              <th>نوع المعاملة</th>
              <th>الولاية</th>
              <th>الدائرة</th>
              <th>البلدية</th>
              <th>التاريخ</th>
              <th style="white-space: nowrap;">حالة الطلب</th>
              <th style="white-space: nowrap;">العمليات</th>
            </tr>
            @if(count($liked_reale_estates)>0)
            @foreach ($liked_reale_estates as $index => $item)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$item->id}}</td>
              <td><a href="{{route('admin.reale_estate.order.to.find.detailes',$item->id)}}">{{$item->name}}</a></td>
              <td>{{$item->phone}}</td>
              <td>{{$item->type}}</td>
              <td>@if($item->rooms==null){{"/"}}@else{{$item->rooms}}@endif</td>
              <td>@if($item->baths==null){{"/"}}@else{{$item->baths}}@endif</td>
              <td>@if($item->etages==null){{"/"}}@else{{$item->etages}}@endif</td>
              <td>@if($item->eatge_number==null){{"/"}}@else{{$item->etage_number}}@endif</td>
              <td>@if($item->facad==null){{"/"}}@else{{$item->facad}}@endif</td>
              <td>@if($item->furnished==null){{"/"}}@else{{$item->furnished}}@endif</td>
              <td>@if($item->property==null){{"/"}}@else{{$item->property}}@endif</td>
              <td>@if($item->transaction==null){{"/"}}@else{{$item->transaction}}@endif</td>    
              <td>@if($item->wilaya==null){{"لم يتم تحديد الولاية"}}@else{{$item->wilaya}}@endif</td>
              <td>@if($item->dayra==null){{"لم يتم تحديد الدائرة"}}@else{{$item->dayra}}@endif</td>
              <td>@if($item->baladia==null){{"لم يتم تحديد البلدية"}}@else{{$item->baladia}}@endif</td>
              <td>{{$item->created_at->diffForHumans()}}</td>
              <td>
                <span class="label label-warning">قيد اللإنتظار</span>
              </td>
              <td>
                {{-- <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                </form> --}}
                <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="order_id" value="{{$item->id}}">
                  <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                </form>
                {{-- like btn --}}                    
              {{-- <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button> --}}
              {{-- like btn --}}  
              <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>  
              </td>
            </tr>
            @endforeach  
            @else
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>لا توجد طلبات بهذه المواصفات</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endif                          
          </tbody></table>
        </div><!-- /.box-body -->
        <!--end-->
      </div>
      </div>
      </div>
      <div class="col-md-6">
        <!--start-->
    <div class="box box-solid">
      <div class="box-header with-border">
      <h3 class="box-title">الزبائن الذين لم يعجبهم هذا العقار</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
          <!--start test-->
          <!--start-->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover" style="white-space: nowrap;">
            <tbody><tr>
              <th>الرقم</th>
              <th>رقم الطلب</th>
              <th>إسم صاحب طالب</th>
              <th>هاتف صاحب الطلب</th>
              <th>نوع العقار</th>
              <th>عدد الغرف</th>
              <th>عدد الحمامات</th>
              <th>الطابق</th>
              <th>عدد الطوابق</th>
              <th>الواجهات</th>
              <th>الأثاث</th>
              <th>وضعية العقار</th>
              <th>نوع المعاملة</th>
              <th>الولاية</th>
              <th>الدائرة</th>
              <th>البلدية</th>
              <th>التاريخ</th>
              <th style="white-space: nowrap;">حالة الطلب</th>
              <th style="white-space: nowrap;">العمليات</th>
            </tr>
            @if(count($unliked_reale_estates)>0)
            @foreach ($unliked_reale_estates as $index => $item)
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$item->id}}</td>
              <td><a href="{{route('admin.reale_estate.order.to.find.detailes',$item->id)}}">{{$item->name}}</a></td>
              <td>{{$item->phone}}</td>
              <td>{{$item->type}}</td>
              <td>@if($item->rooms==null){{"/"}}@else{{$item->rooms}}@endif</td>
              <td>@if($item->baths==null){{"/"}}@else{{$item->baths}}@endif</td>
              <td>@if($item->etages==null){{"/"}}@else{{$item->etages}}@endif</td>
              <td>@if($item->eatge_number==null){{"/"}}@else{{$item->etage_number}}@endif</td>
              <td>@if($item->facad==null){{"/"}}@else{{$item->facad}}@endif</td>
              <td>@if($item->furnished==null){{"/"}}@else{{$item->furnished}}@endif</td>
              <td>@if($item->property==null){{"/"}}@else{{$item->property}}@endif</td>
              <td>@if($item->transaction==null){{"/"}}@else{{$item->transaction}}@endif</td>    
              <td>@if($item->wilaya==null){{"لم يتم تحديد الولاية"}}@else{{$item->wilaya}}@endif</td>
              <td>@if($item->dayra==null){{"لم يتم تحديد الدائرة"}}@else{{$item->dayra}}@endif</td>
              <td>@if($item->baladia==null){{"لم يتم تحديد البلدية"}}@else{{$item->baladia}}@endif</td>
              <td>{{$item->created_at->diffForHumans()}}</td>
              <td>
                <span class="label label-warning">قيد اللإنتظار</span>
              </td>
              <td>
                <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="order_id" value="{{$item->id}}">
                  <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                </form>
                {{-- <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                </form> --}}
                {{-- like btn --}}                    
              <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
              {{-- like btn --}}  
              {{-- <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>   --}}
              </td>
            </tr>
            @endforeach  
            @else
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>لا توجد طلبات بهذه المواصفات</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endif                          
          </tbody></table>
        </div><!-- /.box-body -->
        <!--end-->
      </div>
    </div>
      </div>
      </div>
    <!--end liked and unliked  list -->

    <!--start proposition-->
    <div class="col-md-12">
      <!-- Custom Tabs (Pulled to the right) -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">حسب الطلب بالضبط</a></li>
          <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">حسب نوع العقار</a></li>
          <li class=""><a href="#tab_3-2" data-toggle="tab" aria-expanded="false">حسب نوع المعاملة</a></li>
          {{-- <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
            </ul>
          </li> --}}
          <li class="pull-left header"><i class="fa fa-th"></i> مقترحات للعقار</li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1-1">
            <!--start-->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="white-space: nowrap;">
                <tbody><tr>
                  <th>الرقم</th>
                  <th>رقم الطلب</th>
                  <th>إسم صاحب طالب</th>
                  <th>هاتف صاحب الطلب</th>
                  <th>نوع العقار</th>
                  <th>عدد الغرف</th>
                  <th>عدد الحمامات</th>
                  <th>الطابق</th>
                  <th>عدد الطوابق</th>
                  <th>الواجهات</th>
                  <th>الأثاث</th>
                  <th>وضعية العقار</th>
                  <th>نوع المعاملة</th>
                  <th>الولاية</th>
                  <th>الدائرة</th>
                  <th>البلدية</th>
                  <th>التاريخ</th>
                  <th style="white-space: nowrap;">حالة الطلب</th>
                  <th style="white-space: nowrap;">العمليات</th>
                </tr>
                @if(count($exactly_orders_to_find)>0)
                @foreach ($exactly_orders_to_find as $index => $item)
                @if(is_in_liked_or_unliked_list($item->id,$reale_estate->id && !order_to_find_has_operation($item->id)))
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$item->id}}</td>
                  <td><a href="{{route('admin.reale_estate.order.to.find.detailes',$item->id)}}">{{$item->name}}</a></td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->type}}</td>
                  <td>@if($item->rooms==null){{"/"}}@else{{$item->rooms}}@endif</td>
                  <td>@if($item->baths==null){{"/"}}@else{{$item->baths}}@endif</td>
                  <td>@if($item->etages==null){{"/"}}@else{{$item->etages}}@endif</td>
                  <td>@if($item->eatge_number==null){{"/"}}@else{{$item->etage_number}}@endif</td>
                  <td>@if($item->facad==null){{"/"}}@else{{$item->facad}}@endif</td>
                  <td>@if($item->furnished==null){{"/"}}@else{{$item->furnished}}@endif</td>
                  <td>@if($item->property==null){{"/"}}@else{{$item->property}}@endif</td>
                  <td>@if($item->transaction==null){{"/"}}@else{{$item->transaction}}@endif</td>    
                  <td>@if($item->wilaya==null){{"لم يتم تحديد الولاية"}}@else{{$item->wilaya}}@endif</td>
                  <td>@if($item->dayra==null){{"لم يتم تحديد الدائرة"}}@else{{$item->dayra}}@endif</td>
                  <td>@if($item->baladia==null){{"لم يتم تحديد البلدية"}}@else{{$item->baladia}}@endif</td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  <td>
                    {!!print_order_to_find_statu($item->id)!!}
                  </td>
                  <td>
                    <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$item->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                    </form>
                    <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$item->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                    </form>
                    {{-- like btn --}}                    
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
                  {{-- like btn --}}  
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>  
                  </td>
                </tr>
                @endif
                @endforeach  
                @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>لا توجد طلبات بهذه المواصفات</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endif                          
              </tbody></table>
            </div><!-- /.box-body -->
            <!--end-->
          </div><!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2-2">
             <!--start-->
             <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="white-space: nowrap;">
                <tbody><tr>
                  <th>الرقم</th>
                  <th>رقم الطلب</th>
                  <th>إسم صاحب طالب</th>
                  <th>هاتف صاحب الطلب</th>
                  <th>نوع العقار</th>
                  <th>عدد الغرف</th>
                  <th>عدد الحمامات</th>
                  <th>الطابق</th>
                  <th>عدد الطوابق</th>
                  <th>الواجهات</th>
                  <th>الأثاث</th>
                  <th>وضعية العقار</th>
                  <th>نوع المعاملة</th>
                  <th>الولاية</th>
                  <th>الدائرة</th>
                  <th>البلدية</th>
                  <th>التاريخ</th>
                  <th style="white-space: nowrap;">حالة الطلب</th>
                  <th style="white-space: nowrap;">العمليات</th>
                </tr>
                @if(count($orders_to_find_by_type)>0)
                @foreach ($orders_to_find_by_type as $index => $item)
                @if(is_in_liked_or_unliked_list($item->id,$reale_estate->id && !order_to_find_has_operation($item->id)))
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$item->id}}</td>
                  <td><a href="{{route('admin.reale_estate.order.to.find.detailes',$item->id)}}">{{$item->name}}</a></td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->type}}</td>
                  <td>@if($item->rooms==null){{"/"}}@else{{$item->rooms}}@endif</td>
                  <td>@if($item->baths==null){{"/"}}@else{{$item->baths}}@endif</td>
                  <td>@if($item->etages==null){{"/"}}@else{{$item->etages}}@endif</td>
                  <td>@if($item->eatge_number==null){{"/"}}@else{{$item->etage_number}}@endif</td>
                  <td>@if($item->facad==null){{"/"}}@else{{$item->facad}}@endif</td>
                  <td>@if($item->furnished==null){{"/"}}@else{{$item->furnished}}@endif</td>
                  <td>@if($item->property==null){{"/"}}@else{{$item->property}}@endif</td>
                  <td>@if($item->transaction==null){{"/"}}@else{{$item->transaction}}@endif</td>    
                  <td>@if($item->wilaya==null){{"لم يتم تحديد الولاية"}}@else{{$item->wilaya}}@endif</td>
                  <td>@if($item->dayra==null){{"لم يتم تحديد الدائرة"}}@else{{$item->dayra}}@endif</td>
                  <td>@if($item->baladia==null){{"لم يتم تحديد البلدية"}}@else{{$item->baladia}}@endif</td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  <td>
                    {!!print_order_to_find_statu($item->id)!!}
                  </td>
                  <td>
                    <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$item->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                    </form>
                    <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$item->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                    </form>
                    {{-- like btn --}}                    
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
                  {{-- like btn --}}  
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>  
                  </td>
                </tr>
                @endif
                @endforeach  
                @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>لا توجد طلبات بهذه المواصفات</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endif                          
              </tbody></table>
            </div><!-- /.box-body -->
            <!--end-->
          </div><!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3-2">
            <!--start-->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="white-space: nowrap;">
                <tbody><tr>
                  <th>الرقم</th>
                  <th>رقم الطلب</th>
                  <th>إسم صاحب طالب</th>
                  <th>هاتف صاحب الطلب</th>
                  <th>نوع العقار</th>
                  <th>عدد الغرف</th>
                  <th>عدد الحمامات</th>
                  <th>الطابق</th>
                  <th>عدد الطوابق</th>
                  <th>الواجهات</th>
                  <th>الأثاث</th>
                  <th>وضعية العقار</th>
                  <th>نوع المعاملة</th>
                  <th>الولاية</th>
                  <th>الدائرة</th>
                  <th>البلدية</th>
                  <th>التاريخ</th>
                  <th style="white-space: nowrap;">حالة الطلب</th>
                  <th style="white-space: nowrap;">العمليات</th>
                </tr>
                @if(count($orders_to_find_by_transaction)>0)
                @foreach ($orders_to_find_by_transaction as $index => $item)
                @if(is_in_liked_or_unliked_list($item->id,$reale_estate->id && !order_to_find_has_operation($item->id)))
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$item->id}}</td>
                  <td><a href="{{route('admin.reale_estate.order.to.find.detailes',$item->id)}}">{{$item->name}}</a></td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->type}}</td>
                  <td>@if($item->rooms==null){{"/"}}@else{{$item->rooms}}@endif</td>
                  <td>@if($item->baths==null){{"/"}}@else{{$item->baths}}@endif</td>
                  <td>@if($item->etages==null){{"/"}}@else{{$item->etages}}@endif</td>
                  <td>@if($item->eatge_number==null){{"/"}}@else{{$item->etage_number}}@endif</td>
                  <td>@if($item->facad==null){{"/"}}@else{{$item->facad}}@endif</td>
                  <td>@if($item->furnished==null){{"/"}}@else{{$item->furnished}}@endif</td>
                  <td>@if($item->property==null){{"/"}}@else{{$item->property}}@endif</td>
                  <td>@if($item->transaction==null){{"/"}}@else{{$item->transaction}}@endif</td>    
                  <td>@if($item->wilaya==null){{"لم يتم تحديد الولاية"}}@else{{$item->wilaya}}@endif</td>
                  <td>@if($item->dayra==null){{"لم يتم تحديد الدائرة"}}@else{{$item->dayra}}@endif</td>
                  <td>@if($item->baladia==null){{"لم يتم تحديد البلدية"}}@else{{$item->baladia}}@endif</td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  <td>
                    {!!print_order_to_find_statu($item->id)!!}
                  </td>
                  <td>
                    <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$item->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                    </form>
                    <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$item->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$reale_estate->id}}">
                    </form>
                    {{-- like btn --}}                    
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
                  {{-- like btn --}}  
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا الطلب لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>  
                  </td>
                </tr>
                @endif
                @endforeach  
                @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>لا توجد طلبات بهذه المواصفات</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endif                          
              </tbody></table>
            </div><!-- /.box-body -->
            <!--end-->
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- nav-tabs-custom -->
    </div>
    <!--end proposition-->
      </div>
      <!--End Your Page Content Here-->

    </section><!-- /.content -->
  </div>