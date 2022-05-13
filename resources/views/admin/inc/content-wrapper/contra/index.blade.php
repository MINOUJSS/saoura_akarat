<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        سياسة خصوصية
        <small>سياسة و خصوصيات الموقع</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">سياسة خصوصية</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">تعديل <small>تعديل السياسة الخصوصية</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
          <form action="{{route('admin.update.contra')}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
              <textarea id="ckeditor" name="content" class="textarea" placeholder="Place some text here">{{$contra->content}}</textarea>
            </div>    
          <div class="form-group">
            <button class="btn btn-success" type="submit">تعديل</button>
          </div>
          </form>
        </div>
      </div>
      <!--End Your Page Content Here-->

    </section><!-- /.content -->
  </div>
