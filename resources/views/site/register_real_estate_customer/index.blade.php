@extends('site.layouts.app')

@section('content')

<div class="container">
    <h1 class="logo cursive">
        <img src="{{asset(get_public_folder().'/sites/images/logo.png')}}">
        
    </h1>
    
<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
  
    <div class="content">
        {{-- <h4 class="motto">تتولى عنكم عناء البحث و تختصر لكم المسافات.</h4> --}}
        <div class="subscribe">
            <h5 class="info-text">
             هل تبحث عن عقار للبيع أو الكراء أو التبديل في ولاية بشار؟
             <br/>
             إذاً أنت في المكان الصحيح.
             <br/>
             ما عليك سوى ملْ هذه الإستمارة ونحن نتكفل بالباقي. 
            </h5>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm6-6 col-sm-offset-3 ">
                    <form class="form-inline" role="form">
                      <div class="form-group">
                        <label class="sr-only" for="name">الإسم</label>
                        <input type="text" class="form-control transparent" placeholder="أكتب إسمك">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="mobile">رقم الهاتف</label>
                        <input type="number" class="form-control transparent" placeholder="أدخل رقم الهاتف">
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="type_rent_or_buy">نوع العقار</label>
                        <select class="form-control transparent" name="type_rent_or_buy" id="type_rent_or_buy">
                            <option value="0" class="form-control">إختر نوع المعاملة</option>
                            <option value="1" class="form-control">شراء</option>
                            <option value="2" class="form-control">كراء</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="type_real_estate">نوع العقار</label>
                        <select class="form-control transparent" name="type_real_estate" id="type_real_estate">
                            <option value="0" class="form-control">إختر نوع العقار</option>
                            <option value="1" class="form-control">ستيديو</option>
                            <option value="2" class="form-control">منزل</option>
                            <option value="3" class="form-control">مرأب</option>
                            <option value="4" class="form-control">مزرعة</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <button type="submit" class="btn btn-danger btn-fill">حفظ</button>
                      </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection