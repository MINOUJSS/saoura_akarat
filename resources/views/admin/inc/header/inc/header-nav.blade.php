<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <li class="dropdown messages-menu">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-envelope-o"></i>
          <span class="label label-success">{{count(get_no_reading_message_notifications())}}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">{{print_no_reading_message_notifications_to_string()}}</li>
          <li>
            <!-- inner menu: contains the messages -->
            <ul class="menu">
              @foreach (get_no_reading_message_notifications() as $note)
              <li><!-- start message -->
                <a href="{{$note['link']}}">
                  <div class="pull-right">
                    <!-- User Image -->
                    <img src="{{url('admins')}}/dist/img/avatar04.png" class="img-circle" alt="User Image">
                  </div>
                  <!-- Message title and timestamp -->
                  <h4>
                    {{$note['notification']}}
                     {{-- <small><i class="fa fa-clock-o"></i> {{$note['created_at']}}</small> --}}
                  </h4>
                  <!-- The message -->
                  <p>إضغط هنا لمشاهدة تفاصيل الرسالة</p>
                </a>
              </li><!-- end message -->
              @endforeach          
            </ul><!-- /.menu -->
          </li>
          <li class="footer"><a href="#">مشاهدة الكل</a></li>
        </ul>
      </li><!-- /.messages-menu -->

      <!-- Notifications Menu -->
      <li class="dropdown notifications-menu">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning">{{count(get_no_reading_order_notifications())}}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">{{print_no_reading_order_notifications_to_string()}}</li>
          <li>
            <!-- Inner Menu: contains the notifications -->
            <ul class="menu">
              @foreach (get_no_reading_order_notifications() as $note)
              <li><!-- start notification -->
                <a href="{{$note['link']}}">
                  <i class="{{$note['icon_class']}} text-aqua"></i> {{$note['notification']}}
                </a>
              </li><!-- end notification --> 
              @endforeach              
            </ul>
          </li>
          <li class="footer"><a href="#">مشاهدة الكل</a></li>
        </ul>
      </li>
      <!-- Start Reale Estate Notifications -->
      <li class="dropdown notifications-menu">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-home"></i>
          <span class="label label-danger">{{count(get_no_reading_reale_estate_notifications())}}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">{{print_no_reading_reale_estate_notifications_to_string()}}</li>
          <li>
            <!-- Inner Menu: contains the notifications -->
            <ul class="menu">
              @foreach (get_no_reading_reale_estate_notifications() as $note)
              <li><!-- start notification -->
                <a href="{{$note['link']}}">
                  <i class="{{$note['icon_class']}} text-aqua"></i> {{$note['notification']}}
                </a>
              </li><!-- end notification -->  
              @endforeach      
            </ul>
          </li>
          <li class="footer"><a href="#">مشاهدة الكل</a></li>
        </ul>
      </li>
      <!--End Reale Estate Notification
      {{-- <!-- Tasks Menu -->
      <li class="dropdown tasks-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-flag-o"></i>
          <span class="label label-danger">9</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You have 9 tasks</li>
          <li>
            <!-- Inner menu: contains the tasks -->
            <ul class="menu">
              <li><!-- Task item -->
                <a href="#">
                  <!-- Task title and progress text -->
                  <h3>
                    Design some buttons
                    <small class="pull-right">20%</small>
                  </h3>
                  <!-- The progress bar -->
                  <div class="progress xs">
                    <!-- Change the css width attribute to simulate progress -->
                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">20% Complete</span>
                    </div>
                  </div>
                </a>
              </li><!-- end task item --> --}}
            </ul>
          </li>
          <li class="footer">
            <a href="#">View all tasks</a>
          </li>
        </ul>
      </li>-->
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="{{url('admins')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="{{url('admins')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            <p>
              {{Auth::guard('admin')->user()->name}} - {{admin_type_to_string(Auth::guard('admin')->user()->type)}}
              <small>{{admin_type_to_string(Auth::guard('admin')->user()->type)}} {{Auth::guard('admin')->user()->created_at->diffForHumans()}}</small>
            </p>
          </li>
          <!-- Menu Body -->
          {{-- <li class="user-body">
            <div class="col-xs-4 text-center">
              <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
              <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
              <a href="#">Friends</a>
            </div>
          </li> --}}
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat">الملف الشخصي</a>
            </div>
            <div class="pull-right">
              <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat">خروج</a>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
</nav>