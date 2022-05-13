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
                <span class="info-box-text">الشقق:<strong>{{count_homes()}}</strong></span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المنازل:<strong>{{count_homes()}}</strong></span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ستيديوهات:<strong>{{count_homes()}}</strong></span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المزارع:<strong>{{count_homes()}}</strong></span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">الأراضي:<strong>{{count_homes()}}</strong></span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المحلات(garages):<strong>{{count_homes()}}</strong></span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">المكتب:<strong>{{count_homes()}}</strong></span>
                <span class="info-box-number">{{count_homes()}}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div>

        </div>
      </div>
      <!--End Your Page Content Here-->

    </section><!-- /.content -->
  </div>