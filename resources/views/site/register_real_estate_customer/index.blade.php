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
                <div class="col-md-6 col-md-offset-3 col-sm6-6 col-sm-offset-3 ">
                    <form class="form-inline" role="form">
                      <div class="form-group {{$errors->has('name')? 'has-error':''}}"  style="margin:5px;">
                        <label class="sr-only" for="name">الإسم</label>
                        <input name="name" type="text" class="form-control transparent" placeholder="أكتب إسمك">
                        @if($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name')}}
                        </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('phone')? 'has-error':''}}" style="margin:5px;">
                        <label class="sr-only" for="mobile">رقم الهاتف</label>
                        <input name="phone" type="tel" class="form-control transparent" placeholder="أدخل رقم الهاتف">
                        @if($errors->has('phone'))
                        <span class="help-block">
                          {{$errors->first('phone')}}
                        </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('r_e_type')? 'has-error' : ''}}" style="margin:5px;">
                        <label class="sr-only" for="type_real_estate">نوع العقار</label>
                        <select name="r_e_type" class="form-control transparent" name="type_real_estate" id="type_real_estate">
                          <option value="0" class="form-control">إختر نوع العقار</option>
                          @foreach ($reale_estate_types as $item)
                          <option value="{{$item->id}}" class="form-control">{{$item->type}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('r_e_type'))
                            <span class="help-block">
                              {{$errors->first('r_e_type')}}
                            </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('tronsaction')? 'has-error' : ''}}" style="margin:5px;">
                        <label class="sr-only" for="type_rent_or_buy">إختر نوع المعاملة</label>      
                        <select name="tronsaction" class="form-control transparent" name="type_rent_or_buy" id="type_rent_or_buy">
                          <option value="0" class="form-control">إختر نوع المعاملة</option>
                          @foreach ($tronsaction as $item)
                          <option value="{{$item->id}}" class="form-control">{{$item->tronsaction}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('tronsaction'))
                            <span class="help-block">
                              {{$errors->first('tronsaction')}}
                            </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('wilaya')? 'has-error' : ''}}" style="margin:5px;">
                        <label class="sr-only" for="wilaya">الولاية</label>
                        <select name="wilaya" class="form-control transparent" id="select_wilaya">
                          <option value="0" class="form-control">إختر الولاية</option>
                          @foreach ($wilayas as $wilaya)
                          <option value="{{$wilaya->id}}" class="form-control">{{$wilaya->ar_name}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('wilaya'))
                            <span class="help-block">
                              {{$errors->first('wilaya')}}
                            </span>
                        @endif
                      </div>
                      <div id="dayra" class="form-group" style="margin:5px;">
                        {{-- <label class="sr-only" for="wilaya">الدائرة</label>
                        <select name="dayra" class="form-control transparent" id="select_dayra">
                          <option value="0" class="form-control">إختر الدائرة</option>
                        </select> --}}
                      </div>
                      <div id="baladia" class="form-group" style="margin:5px;"></div>      
                      <div class="row">
                        <div class="form-group">
                          <button type="submit" class="btn btn-danger btn-fill">حفظ</button>
                        </div>
                      </div>
                      
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection