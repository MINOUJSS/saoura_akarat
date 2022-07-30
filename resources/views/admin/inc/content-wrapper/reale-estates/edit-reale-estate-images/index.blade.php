<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       تعديل صور العقار
        <small>تعديل و حذف صور العقار</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">تعديل صور العقار</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
           
      <div class="row">
        @if(count($images)!=0)
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
    @endif
    <!---->
    <div class="col-lg-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">إضافة صور جديدة</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('admin.reale_estate.add-images-to-reale-estate',$reale_estate->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group {{($errors->has('files') || $errors->has('files.*') )? 'has-error':''}}" style="margin:5px;">
              {{-- <input name="file" type="text" class="form-control transparent" placeholder="أدخل السعر الذي تريده في الشهر في حالة الكراء و سعر المطلوب في حالة البيع *"> --}}
              <input class="form-control transparent" type="file" name="files[]" multiple id="files" accept="image/*">
              <label class="btn btn-warning file-lable" for="files"><i class="fa fa-image"> إختر صور للعقار</i></label>
              @if($errors->has('files'))
              <span class="help-block">
                {{$errors->first('files')}}
              </span>
              @endif
              @if($errors->has('files.*'))
              <span class="help-block">
                {{$errors->first('files.*')}}
              </span>
              @endif
            </div>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
          </div>
        </form>
      </div>
    </div>
      <div class="col-lg-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">جدول الصور</h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>#</th>
                <th>رقم الصورة</th>
                <th>الصورة</th>
                <th>تاريخ الصورة</th>
                <th>العمليات</th>
              </tr>
              @if(count($images)!=0)
              @foreach ($images as $index=>$image)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{$image->id}}</td>
                <td><img src="{{asset('/admins/uploads/thumbnails/'.$image->image)}}" alt="{{$image->image}}" height="50px" width="50px"></td>
                <td>{{$image->created_at->diffForHumans()}}</td>
                <td>
                  {{-- delete form --}}
                  <form id="delete-{{$image->id}}" action="{{route('admin.reale_estate.delete-images',$image->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    </form>
                  {{-- delete btn --}}
                  <button onclick="event.preventDefault();if(confirm('هل تريد فعلا حدف هذه الصورة'))document.getElementById('delete-{{$image->id}}').submit();" type="submit" class="btn btn-danger"><i class="fa fa-trash"> حذف</i></button>
                </td>
              </tr>    
              @endforeach
              @else
              <tr>
                <td></td>
                <td></td>
                <td>لاتوجد صور لهاذا العقار</td>
                <td></td>
                <td></td>
              @endif

            </tbody></table>
          </div><!-- /.box-body -->
        </div>
      </div>
    <!---->
    </div><!--end row-->
         
      <!-- end Page content-->

    </section><!-- /.content -->
  </div>