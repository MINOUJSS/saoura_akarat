<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        طلبات البحث عن العقارات
        <small>جميع طلبات البحث عن العقارات</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">طلبات البحث عن العقارات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">جدول الطلبات</h3>
            {{-- <div class="box-tools">
              <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div> --}}
          </div><!-- /.box-header -->
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
              </tr>
              @if(count($orders_to_find)>0)
              @foreach ($orders_to_find as $index => $item)
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
                  <span class="btn btn-warning">قيد اللإنتظار</span>
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
                <td>لا توجد طلبات مسجلة</td>
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
        </div><!-- /.box -->
      </div>
      <!--End Your Page Content Here-->

    </section><!-- /.content -->
  </div>