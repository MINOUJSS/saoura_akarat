<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الرئيسية
        <small>لوحة لاتحكم الرئيسية</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li class="active">لوحة التحكم</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="container">
        <div class="row">

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">الشقق</span>
                <span class="info-box-number">{{count_apartments()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المنازل</span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ستيديوهات</span>
                <span class="info-box-number">{{count_studios()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المزارع</span>
                <span class="info-box-number">{{count_farms()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">الأراضي</span>
                <span class="info-box-number">{{count_lands()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المحلات(garages)</span>
                <span class="info-box-number">{{count_shops()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المكتب</span>
                <span class="info-box-number">{{count_bereaux()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>

        </div>
      </div>
      <!--End Your Page Content Here-->

    </section><!-- /.content -->
  </div>