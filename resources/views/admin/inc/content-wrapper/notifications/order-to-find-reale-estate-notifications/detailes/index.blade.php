<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تفاصيل الإشعار بالطلب
        <small>تفاصيل الإشعار بالطلب </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تفاصيل الإشعار بالطلب</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-lg-6">
        <!--start-->
        <div class="box box-solid">
          <div class="box-header with-border">
          <h3 class="box-title">العقارات التي أعجبته</h3>          
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
                <th>رابط صور العقار</th>
                <th>التاريخ</th>
                <th style="white-space: nowrap;">حالة العقار</th>
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
                <td><a href="{{route('site.reale_estate.photos',$item->id)}}">رابط صور العقار</a></td>
                <td>{{$item->created_at->diffForHumans()}}</td>
                <td>
                  {!!print_reale_estate_statu($item->id)!!}
                </td>
                <td style="display: flex;">
                  {{-- <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                    <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  </form> --}}
                  <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                    <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  </form>
                  {{-- like btn --}}                    
                {{-- <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button> --}}
                {{-- like btn --}}  
                <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>  
                
                <!---->
                @if(reale_estate_has_operation($item->id))                
                <form id="edit_form_{{$item->id}}" action="{{route('admin.operation.edit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-warning" value="تعديل عملية"> --}}
                </form>
                <button onclick="document.getElementById('edit_form_{{$item->id}}').submit();" class="btn btn-warning operation-btn"> تعديل عملية</button>
                {{-- <a href="{{route('admin.operation.edit',$item->id)}}" class="btn btn-warning">تعديل عملية</a> --}}
                @else 
                <form id="create_form_{{$item->id}}" class="form-group" action="{{route('admin.operation.create')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-info" value="إضافة عملية"> --}}
                </form>
                <button onclick="document.getElementById('create_form_{{$item->id}}').submit();" class="btn btn-info operation-btn"> إضافة عملية</button>
                {{-- <a href="{{route('admin.operation.create',$item->id)}}" class="btn btn-info">إضافة عملية</a> --}}
                @endif
                <!---->
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
              <!--end test-->
          </div><!-- /.box-body -->
      </div>
      <!--end-->
      <!--start-->
      <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">العقارات التي لم تعجبه</h3>
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
                <th>رابط صور العقار</th>
                <th>التاريخ</th>
                <th style="white-space: nowrap;">حالة العقار</th>
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
                <td><a href="{{route('site.reale_estate.photos',$item->id)}}" target="blank">رابط صور العقار</a></td>
                <td>{{$item->created_at->diffForHumans()}}</td>
                <td>
                  {!!print_reale_estate_statu($item->id)!!}
                </td>
                <td style="display: flex;">
                  <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                    <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  </form>
                  {{-- <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                    <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  </form> --}}
                  {{-- like btn --}}                    
                <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
                {{-- like btn --}}  
                {{-- <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>   --}}
                
                <!---->
                @if(reale_estate_has_operation($item->id))                
                <form id="edit_form_{{$item->id}}" action="{{route('admin.operation.edit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-warning" value="تعديل عملية"> --}}
                </form>
                <button onclick="document.getElementById('edit_form_{{$item->id}}').submit();" class="btn btn-warning operation-btn"> تعديل عملية</button>
                {{-- <a href="{{route('admin.operation.edit',$item->id)}}" class="btn btn-warning">تعديل عملية</a> --}}
                @else 
                <form id="create_form_{{$item->id}}" class="form-group" action="{{route('admin.operation.create')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-info" value="إضافة عملية"> --}}
                </form>
                <button onclick="document.getElementById('create_form_{{$item->id}}').submit();" class="btn btn-info operation-btn"> إضافة عملية</button>
                {{-- <a href="{{route('admin.operation.create',$item->id)}}" class="btn btn-info">إضافة عملية</a> --}}
                @endif
                <!---->
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
            <!--end test-->
        </div><!-- /.box-body -->
    </div>
    <!--end--> 
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">معلومات طالب العقار</div>
      
        <!-- Table -->
        <table class="table">
          <tr>
            <td>إسم طالب العقار</td>
            <td>{{$ordertofind->name}}</td>
          </tr>
          <tr>
            <td>رقم الهاتف</td>
            <td><a href="tel:{{$ordertofind->phone}}"><i class="fa fa-phone"> {{$ordertofind->phone}}</i></a></td>
          </tr>
          <tr>
            <td>حالة الطلب</td>
            <td>{!!print_order_to_find_statu($ordertofind->id)!!}</td>
          </tr>
          <tr>
            <td>نوع العقار</td>
            <td>{{$ordertofind->type}}</td>
          </tr>
          <tr>
            <td>عدد الغرف</td>
            <td>{{$ordertofind->rooms}}</td>
          </tr>
          <tr>
            <td>عدد الحمامات</td>
            <td>{{$ordertofind->baths}}</td>
          </tr>
          <tr>
            <td>الطابق</td>
            <td>{{$ordertofind->etages}}</td>
          </tr>
          <tr>
            <td>عدد الطوابق</td>
            <td>{{$ordertofind->etage_number}}</td>
          </tr>
          <tr>
            <td>الواجهات</td>
            <td>{{$ordertofind->facad}}</td>
          </tr>
          <tr>
            <td>الأثاث</td>
            <td>{{$ordertofind->furnished}}</td>
          </tr>
          <tr>
            <td>وضعية العقار</td>
            <td>{{$ordertofind->property}}</td>
          </tr>
          <tr>
            <td>نوع المعاملة</td>
            <td>{{$ordertofind->transaction}}</td>
          </tr>
          <tr>
            <td>الولاية</td>
            <td>{{$ordertofind->wilaya}}</td>
          </tr>
          <tr>
            <td>الدائرة</td>
            <td>{{$ordertofind->dayra}}</td>
          </tr>
          <tr>
            <td>البلدية</td>
            <td>{{$ordertofind->baladia}}</td>
          </tr>   
          <tr>
            <td>تفاصيل أخرى عن العقار</td>
            <td>{{$ordertofind->description}}</td>
          </tr>          
        </table>
      </div>
    </div>
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
          <li class="pull-left header"><i class="fa fa-th"></i> مقترحات للطلب</li>
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
                  <th>رابط صور العقار</th>
                  <th>التاريخ</th>
                  <th style="white-space: nowrap;">حالة العقار</th>
                  <th style="white-space: nowrap;">العمليات</th>
                </tr>
                @if(count($exactly_reale_estate)>0)
                @foreach ($exactly_reale_estate as $index => $item)
                @if(is_in_liked_or_unliked_list($ordertofind->id,$item->id) && !reale_estate_has_operation($item->id))
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
                  <td><a href="{{route('site.reale_estate.photos',$item->id)}}" target="blank">رابط صور العقار</a></td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  <td>
                    {!!print_reale_estate_statu($item->id)!!}
                  </td>
                  <td style="display: flex;">
                    <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                    </form>
                    <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                    </form>
                    {{-- like btn --}}                    
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
                  {{-- like btn --}}  
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>  
                  
                  <!---->
                @if(reale_estate_has_operation($item->id))                
                <form id="edit_form_{{$item->id}}" action="{{route('admin.operation.edit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-warning" value="تعديل عملية"> --}}
                </form>
                <button onclick="document.getElementById('edit_form_{{$item->id}}').submit();" class="btn btn-warning operation-btn"> تعديل عملية</button>
                {{-- <a href="{{route('admin.operation.edit',$item->id)}}" class="btn btn-warning">تعديل عملية</a> --}}
                @else 
                <form id="create_form_{{$item->id}}" class="form-group" action="{{route('admin.operation.create')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-info" value="إضافة عملية"> --}}
                </form>
                <button onclick="document.getElementById('create_form_{{$item->id}}').submit();" class="btn btn-info operation-btn"> إضافة عملية</button>
                {{-- <a href="{{route('admin.operation.create',$item->id)}}" class="btn btn-info">إضافة عملية</a> --}}
                @endif
                <!---->
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
                  <th>رابط صور العقار</th>
                  <th>التاريخ</th>
                  <th style="white-space: nowrap;">حالة العقار</th>
                  <th style="white-space: nowrap;">العمليات</th>
                </tr>
                @if(count($reale_estate_by_type)>0)
                @foreach ($reale_estate_by_type as $index => $item)
                @if(is_in_liked_or_unliked_list($ordertofind->id,$item->id) && !reale_estate_has_operation($item->id))
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
                  <td><a href="{{route('site.reale_estate.photos',$item->id)}}" target="blank">رابط صور العقار</a></td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  <td>
                    {!!print_reale_estate_statu($item->id)!!}
                  </td>
                  <td style="display: flex;">
                    <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                    </form>
                    <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                    </form>
                    {{-- like btn --}}                    
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
                  {{-- like btn --}}  
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>
                  
                  <!---->
                @if(reale_estate_has_operation($item->id))                
                <form id="edit_form_{{$item->id}}" action="{{route('admin.operation.edit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-warning" value="تعديل عملية"> --}}
                </form>
                <button onclick="document.getElementById('edit_form_{{$item->id}}').submit();" class="btn btn-warning operation-btn"> تعديل عملية</button>
                {{-- <a href="{{route('admin.operation.edit',$item->id)}}" class="btn btn-warning">تعديل عملية</a> --}}
                @else 
                <form id="create_form_{{$item->id}}" class="form-group" action="{{route('admin.operation.create')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-info" value="إضافة عملية"> --}}
                </form>
                <button onclick="document.getElementById('create_form_{{$item->id}}').submit();" class="btn btn-info operation-btn"> إضافة عملية</button>
                {{-- <a href="{{route('admin.operation.create',$item->id)}}" class="btn btn-info">إضافة عملية</a> --}}
                @endif
                <!---->
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
                  <th>رابط صور العقار</th>
                  <th>التاريخ</th>
                  <th style="white-space: nowrap;">حالة العقار</th>
                  <th style="white-space: nowrap;">العمليات</th>
                </tr>
                @if(count($reale_estate_by_transaction)>0)
                @foreach ($reale_estate_by_transaction as $index => $item)
                @if(is_in_liked_or_unliked_list($ordertofind->id,$item->id) && !reale_estate_has_operation($item->id))
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
                  <td><a href="{{route('site.reale_estate.photos',$item->id)}}">رابط صور العقار</a></td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  <td>
                    {!!print_reale_estate_statu($item->id)!!}
                  </td>
                  <td style="display: flex;">
                    <form id="add_to_liked_list_{{$item->id}}" action="{{route('admin.add.to.liked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                    </form>
                    <form id="add_to_unliked_list_{{$item->id}}" action="{{route('admin.add.to.unliked.list')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                      <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                    </form>
                    {{-- like btn --}}                    
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة الإعجاب؟'))document.getElementById('add_to_liked_list_{{$item->id}}').submit();" type="submit" class="btn btn-success"> أعجبه</button>
                  {{-- like btn --}}  
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا إضافة هذا العقار لقائمة عدم الإعجاب؟'))document.getElementById('add_to_unliked_list_{{$item->id}}').submit();" type="submit" class="btn btn-danger"> لم يعجبه</button>
                  
                  <!---->
                @if(reale_estate_has_operation($item->id))                
                <form id="edit_form_{{$item->id}}" action="{{route('admin.operation.edit')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-warning" value="تعديل عملية"> --}}
                </form>
                <button onclick="document.getElementById('edit_form_{{$item->id}}').submit();" class="btn btn-warning operation-btn"> تعديل عملية</button>
                {{-- <a href="{{route('admin.operation.edit',$item->id)}}" class="btn btn-warning">تعديل عملية</a> --}}
                @else 
                <form id="create_form_{{$item->id}}" class="form-group" action="{{route('admin.operation.create')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="r_estate_id" value="{{$item->id}}">
                  <input type="hidden" name="order_id" value="{{$ordertofind->id}}">
                  {{-- <input type="submit" class="btn btn-info" value="إضافة عملية"> --}}
                </form>
                <button onclick="document.getElementById('create_form_{{$item->id}}').submit();" class="btn btn-info operation-btn"> إضافة عملية</button>
                {{-- <a href="{{route('admin.operation.create',$item->id)}}" class="btn btn-info">إضافة عملية</a> --}}
                @endif
                <!---->
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