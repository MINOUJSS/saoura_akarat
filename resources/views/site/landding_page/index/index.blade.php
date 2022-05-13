@extends('site.layouts.landding_page.app')

@section('content')
<div class="container">
    <h1 class="logo cursive">
        <img src="{{asset(get_public_folder().'/sites/landing_page/images/logo.png')}}">
        {{-- Sssoon --}}
    </h1>
    
<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
  
    <div class="content">
        <h4 class="motto">الساورة للعقارات تتولى عنكم عناء البحث <br/> و تختصر لكم المسافات.</h4>
        <div class="subscribe">
            <h5 class="info-text">
                Join the waiting list for the beta. We keep you posted. 
            </h5>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm6-6 col-sm-offset-3 ">
                    <div class="text-center">
                        <a href="{{route('site-landing-page-register-real-estate')}}"><button type="submit" class="btn btn-danger btn-fill">تسجيل عقار</button></a>
                      <a href="{{route('site-landing-page-register-real-estate-customer')}}"><button type="submit" class="btn btn-success btn-fill">أبحث عن عقار</button></a>
                    </div>
                      
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection