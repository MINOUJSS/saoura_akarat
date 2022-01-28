<!doctype html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <title>الساورة للعقارات</title>
    
    <link href="{{url('/sites/css/bootstrap.css')}}" rel="stylesheet" />
	<link href="{{url('/sites/css/coming-sssoon.css')}}" rel="stylesheet" />    
    
    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  
</head>

<body>
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">  
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                <img src="{{url('sites/images/flags/US.png')}}"/>
                English(US) 
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><img src="{{url('sites/images/flags/DE.png')}}"/> Deutsch</a></li>
                <li><a href="#"><img src="{{url('sites/images/flags/GB.png')}}"/> English(UK)</a></li>
                <li><a href="#"><img src="{{url('sites/images/flags/FR.png')}}"/> Français</a></li>
                <li><a href="#"><img src="{{url('sites/images/flags/RO.png')}}"/> Română</a></li>
                <li><a href="#"><img src="{{url('sites/images/flags/IT.png')}}"/> Italiano</a></li>
                
                <li class="divider"></li>
                <li><a href="#"><img src="{{url('sites/images/flags/ES.png')}}"/> Español <span class="label label-default">soon</span></a></li>
                <li><a href="#"><img src="{{url('sites/images/flags/BR.png')}}"/> Português <span class="label label-default">soon</span></a></li>
                <li><a href="#"><img src="{{url('sites/images/flags/JP.png')}}"/> 日本語 <span class="label label-default">soon</span></a></li>
                <li><a href="#"><img src="{{url('sites/images/flags/TR.png')}}"/> Türkçe <span class="label label-default">soon</span></a></li>
             
              </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#"> 
                    <i class="fa fa-facebook-square"></i>
                    Share
                </a>
            </li>
             <li>
                <a href="#"> 
                    <i class="fa fa-twitter"></i>
                    Tweet
                </a>
            </li>
             <li>
                <a href="#"> 
                    <i class="fa fa-envelope-o"></i>
                    Email
                </a>
            </li>
       </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<div class="main" style="background-image: url('sites/images/Rent.png')">

<!--    Change the image source '/images/default.jpg' with your favourite image.     -->
    
    <div class="cover black" data-color="black"></div>
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    @yield('content')
    <div class="footer">
      <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/coming-sssoon-page">here.</a>
      </div>
    </div>
 </div>
 </body>
   <script src="{{url('sites/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
   <script src="{{url('sites/js/bootstrap.min.js')}}" type="text/javascript"></script>

</html>