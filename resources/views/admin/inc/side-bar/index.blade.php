<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="{{url('admins')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::guard('admin')->user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form> --}}
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">القائمة</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{active_dashboard_link()}}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>الرئيسية</span></a></li>
        <li class="{{active_contra_link()}}"><a href="{{route('admin.edit.contra')}}"><i class="fa fa-home"></i> <span> شروط الإستخدام</span></a></li>
        <li class="treeview {{active_reale_estate_link()}}">
          <a href="{{route('admin.reale_estates')}}"><i class="fa fa-home"></i> <span>العقارات</span> <i class="fa fa-angle-left pull-right"></i></a>
          {{-- <a href="#"><i class="fa fa-link"></i> <span>طلبات الزبائن</span> <i class="fa fa-angle-left pull-right"></i></a> --}}
          <ul class="treeview-menu">
            <li class='{{active_all_reale_estate_link()}}'><a href="{{route('admin.reale_estates')}}">كل العقارات</a></li>
            <li class="{{active_reale_estate_type_apartments_link()}}"><a href="{{route('admin.reale-estate.type.apartments')}}">الشقق</a></li>
            <li class="{{active_reale_estate_type_houses_link()}}"><a href="{{route('admin.reale-estate.type.houses')}}">المنازل</a></li>
            <li class="{{active_reale_estate_type_studios_link()}}"><a href="{{route('admin.reale-estate.type.studios')}}">الستيديوهات</a></li>
            <li class="{{active_reale_estate_type_farms_link()}}"><a href="{{route('admin.reale-estate.type.farms')}}">المزارع</a></li>
            <li class="{{active_reale_estate_type_lands_link()}}"><a href="{{route('admin.reale-estate.type.lands')}}">الأراضي</a></li>
            <li class="{{active_reale_estate_type_shops_link()}}"><a href="{{route('admin.reale-estate.type.shops')}}">المحلات (garages)</a></li>
            <li class="{{active_reale_estate_type_bereaus_link()}}"><a href="{{route('admin.reale-estate.type.bereaus')}}">المكاتب</a></li>
          </ul>
        
        </li>
        <li class="treeview {{active_orders_to_find_reale_estate_link()}}">
          <a href="#"><i class="fa fa-bell"></i> <span>طلبات الزبائن</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li class="{{active_all_order_to_find_reale_estate_link()}}"><a href="{{route('admin.reale_estate.all.orders.to.find')}}">كل الطلبات</a></li>
            <li class="{{active_order_to_find_reale_estate_to_rent_link()}}"><a href="{{route('admin.reale_estate.order.to.find.transaction.for.rent')}}">الطلبات الكراء</a></li>
            <li class="{{active_order_to_find_reale_estate_to_sall_link()}}"><a href="{{route('admin.reale_estate.order.to.find.transaction.for.sall')}}">طلبات الشراء</a></li>
            <li class="{{active_order_to_find_reale_estate_to_change_link()}}"><a href="{{route('admin.reale_estate.order.to.find.transaction.for.change')}}">طلبات التبديل</a></li>
          </ul>
        </li>
      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>