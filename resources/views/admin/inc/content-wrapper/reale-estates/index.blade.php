<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       العقارات
        <small>هنا ستجد كل العقارات من جميع الأصناف.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">العقارات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">جدول العقارات</h3>
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
                <th>إسم صاحب العقار</th>
                <th>هاتف صاحب العقار</th>
                <th>نوع العقار</th>
                <th>عدد الغرف</th>
                <th>عدد الحمامات</th>
                <th>الطابق</th>
                <th>عدد الطوابق</th>
                <th>الواجهات</th>
                <th>الأثاث</th>
                <th>وضعية العقار</th>
                <th>نوع المعاملة</th>
                <th>المبلغ المطلوب</th>
                <th>عنوان العقار</th>
                <th>الولاية</th>
                <th>الدائرة</th>
                <th>البلدية</th>
                <th>التاريخ</th>
                <th style="white-space: nowrap;">العمليات</th>
              </tr>
              @foreach ($reale_estates as $index => $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
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
                <td>{{$item->price}} د.ج</td>
                <td>@if($item->address==null){{"لم يتم تحديد العنوان"}}@else{{$item->address}}@endif</td>
                <td>@if($item->wilaya==null){{"لم يتم تحديد الولاية"}}@else{{$item->wilaya}}@endif</td>
                <td>@if($item->dayra==null){{"لم يتم تحديد الدائرة"}}@else{{$item->wilaya}}@endif</td>
                <td>@if($item->baladia==null){{"لم يتم تحديد البلدية"}}@else{{$item->wilaya}}@endif</td>
                <td>{{$item->created_at->diffForHumans()}}</td>
                <td>
                  {{-- edite form --}}
                  <form id="edit-{{$item->id}}"action="{{route('admin.reale_estate.edit',$item->id)}}" method="post">                    
                  @csrf
                  @method('PUT')
                  </form>
                  
                  {{-- delete form --}}
                  <form id="delete-{{$item->id}}" action="{{route('admin.reale_estate.destroy',$item->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('DELETE')
                  </form>
                  {{-- show details --}}
                  <a href="{{route('admin.reale_estate.detailes',$item->id)}}" class="btn btn-info"><i class="fa fa-info"> تفاصيل</i></a>
                  {{-- edit btn --}}
                  <button onclick="event.preventDefault();if(confirm('هل تريد التعديل على هذا العقار؟'))document.getElementById('edit-{{$item->id}}').submit();" type="submit" class="btn btn-success"><i class="fa fa-edit"> تعديل</i></button>
                  {{-- delete btn --}}
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا حدف هذا العقار؟'))document.getElementById('delete-{{$item->id}}').submit();" type="submit" class="btn btn-danger"><i class="fa fa-trash"> حذف</i></button>
                  
                </td>
              </tr>
              @endforeach                            
            </tbody></table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
      <!-- end Page content-->

    </section><!-- /.content -->
  </div>