<!doctype html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <title>الساورة للعقارات</title> 
  <link href="{{ asset('/sites/landing_page/css/bootstrap.css') }}" rel="stylesheet" />
	<link href="{{ asset('/sites/landing_page/css/coming-sssoon.css') }}" rel="stylesheet" /> 
  <link href="{{ asset('/sites/landing_page/css/style.css') }}" rel="stylesheet" />    
  <!-- filepound  css-->
  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

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
      {{-- <ul class="nav navbar-nav">
         <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                <img src="{{url('/sites/images/flags/US.png')}}"/>
                English(US) 
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><img src="{{url('/sites/images/flags/DE.png')}}"/> Deutsch</a></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/GB.png')}}"/> English(UK)</a></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/FR.png')}}"/> Français</a></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/RO.png')}}"/> Română</a></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/IT.png')}}"/> Italiano</a></li>
                
                <li class="divider"></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/ES.png')}}"/> Español <span class="label label-default">soon</span></a></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/BR.png')}}"/> Português <span class="label label-default">soon</span></a></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/JP.png')}}"/> 日本語 <span class="label label-default">soon</span></a></li>
                <li><a href="#"><img src="{{url('/sites/images/flags/TR.png')}}"/> Türkçe <span class="label label-default">soon</span></a></li>
             
              </ul>
        </li>

      </ul> --}}
      <ul class="nav navbar-nav navbar-right"> 
            <li>
              <a href="{{route('landing_page')}}"> 
                  <i class="fa fa-home"></i>
                  الصفحة الرئيسية
              </a>
            </li>     
            <li>
                <a href="https://www.facebook.com/SaouraAqarat" target="blank"> 
                    <i class="fa fa-facebook-square"></i>
                    صفحتنا على الفيس بوك
                </a>
            </li>
             <li>
                <a href="tel:0660007370" target="blank"> 
                    <i class="fa fa-phone"></i>
                    إتصل بنا عبر الهاتف
                </a>
            </li>            
             {{-- <li>
                <a href="#"> 
                    <i class="fab fa-whatsapp-square"></i>
                    إتصل بنا عبر الواتس أب
                </a>
            </li> --}}
       </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
<div class="main" style="background-image: url('{{asset('/sites/landing_page/images/Rent.png')}}'">

<!--    Change the image source '/images/default.jpg' with your favourite image.     -->
    
    <div class="cover black" data-color="black"></div>
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    @yield('content')
    {{-- <div class="footer">
      <div class="container">
             Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/coming-sssoon-page">here.</a>
      </div>
    </div> --}}
 </div>
 @include('sweetalert::alert')
 </body>
   <script src="{{asset('/sites/landing_page/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
   <script src="{{asset('/sites/landing_page/js/bootstrap.min.js')}}" type="text/javascript"></script>
   <script src="{{asset('/sites/landing_page/js/my_functions.js')}}" type="text/javascript"></script>
    <!-- filepound  js-->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
      // Register the plugin
    FilePond.registerPlugin(FilePondPluginFileValidateType);
      // Get a reference to the file input element
      const inputElement = document.querySelector('input[id="files"]');
      // Create a FilePond instance
      const pond = FilePond.create(inputElement, {
        acceptedFileTypes:['image/*'],
    fileValidateTypeDetectType: (source, type) =>
        new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        }),
});
      //
      FilePond.setOptions({
        server:{
          process:'/tmp_upload',
          revert:'/tmp_delete',
          headers:{
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
          }
        },
        labelIdle:'اسحب الملفات وأفلتها أو <span class="filepond--label-action"> إعرض </span>',
        labelFileProcessingError:'خطأ أثناء التحميل',
        labelFileLoading:'جار التحميل',
        labelFileProcessing:'تحميل',
        labelInvalidField:'يحتوي الحقل على ملفات غير صالحة',
        labelFileWaitingForSize:'في انتظار الحجم',
        labelFileSizeNotAvailable:'الحجم غير متوفر',
        labelFileProcessingComplete:'اكتمل التحميل',
        labelFileProcessingAborted:'تم إلغاء التحميل',
        labelFileProcessingRevertError:'خطأ أثناء التراجع',
        labelFileRemoveError:'خطأ أثناء الإزالة',
        labelTapToCancel:'انقر للإلغاء',
        labelTapToRetry:'إضغط لإعادة المحاولة',
        labelTapToUndo:'انقر للتراجع',
        labelButtonRemoveItem:'إزالة',
        labelButtonAbortItemLoad:'إحباط',
        labelButtonRetryItemLoad:'أعد المحاولة',
        labelButtonAbortItemProcessing:'إلغاء',
        labelButtonUndoItemProcessing:'الغاء التحميل',
        labelButtonRetryItemProcessing:'أعد المحاولة',
        labelButtonProcessItem :'تحميل'  
      });
      //console.log('hi');
    </script>
    
</html>