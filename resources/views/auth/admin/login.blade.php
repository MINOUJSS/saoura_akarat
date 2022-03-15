@extends('auth.admin.layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">تسجيل الدخول</p>
      <form action="{{route('admin.login.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group has-feedback">
          <input name="email" type="email" class="form-control" placeholder="البريد الإلكتروني">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="password" type="password" class="form-control" placeholder="كلمة المرور">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">دخول</button>
          </div><!-- /.col -->
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input name="remember" type="checkbox"> تذكرني
              </label>
            </div>
          </div><!-- /.col -->
        </div>
      </form>

      {{-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
      </div><!-- /.social-auth-links --> --}}

      <a href="#">نسيت كلمة المرور</a><br>
      {{-- <a href="register.html" class="text-center">Register a new membership</a> --}}

    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
@endsection