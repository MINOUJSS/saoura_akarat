@extends('site.layouts.landding_page.app')

@section('content')

<div class="container">
    <h1 class="logo cursive">
        <img src="{{asset(get_public_folder().'/sites/landing_page/images/logo.png')}}">
        
    </h1>
    
    <!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
  
    <div class="content">
        {{-- <h4 class="motto">تتولى عنكم عناء البحث و تختصر لكم المسافات.</h4> --}}
        <div class="subscribe">
            <h5 class="info-text">
             هل تريد بيع أو الكراء أو التبديل عقارك في ولاية بشار؟
             <br/>
             إذاً أنت في المكان الصحيح.
             <br/>
             ما عليك سوى ملْ هذه الإستمارة ونحن نتكفل بالباقي. 
            </h5>
            <div class="row">
              @if($message=Session::get('success'))
              <div class="alert alert-success alert-block col-md-6 col-md-offset-3 col-sm6-6 col-sm-offset-3">
                <button type="button" class="close pull-left" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
              </div>
              @endif
                <div class="col-md-6 col-md-offset-3 col-sm6-6 col-sm-offset-3 ">
                    <form id="r_e_form" class="form-inline" role="form" action="{{route('site-landing-page-store-real-estate-customer')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <h4 style="color:#ffffff">1)- معلوماتك الشخصية</h4>
                      <div class="form-group {{$errors->has('name')? 'has-error':''}}"  style="margin:5px;">
                        <label class="sr-only" for="name">الإسم</label>
                        <input name="name" type="text" class="form-control transparent" placeholder="أكتب إسمك *" value={{old('name')}}>
                        @if($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name')}}
                        </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('phone')? 'has-error':''}}" style="margin:5px;">
                        <label class="sr-only" for="mobile">رقم الهاتف</label>
                        <input name="phone" type="tel" class="form-control transparent" placeholder="أدخل رقم الهاتف *" value="{{old('phone')}}">
                        @if($errors->has('phone'))
                        <span class="help-block">
                          {{$errors->first('phone')}}
                        </span>
                        @endif
                      </div>
                      <h4 style="color:#ffffff">2)- أبحث عن :</h4>
                      <div class="form-group {{$errors->has('r_e_type')? 'has-error' : ''}}" style="margin:5px;">
                        <label class="sr-only" for="type_real_estate">نوع العقار</label>
                        <select onchange="real_estate_detector()" name="r_e_type" class="form-control transparent" id="r_e_type">
                          <option value="0" class="form-control" @if(old('r_e_type')==0){{"selected"}}@endif>إختر نوع العقار *</option>
                          @foreach ($reale_estate_types as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('r_e_type')==$item->id){{"selected"}}@endif>{{$item->type}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('r_e_type'))
                            <span class="help-block">
                              {{$errors->first('r_e_type')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_r_e_type" id="h_r_e_type" value="@if(old('r_e_type')!=0) {{old('r_e_type')}} @else {{'0'}} @endif">
                      </div>
                      <!--start optional apartment شقة-->
                      <div class="studio_option apartment_option form-group {{$errors->has('rooms')? 'has-error' : ''}}" style="margin:5px;@if(old('r_e_type')!=1 && old('r_e_type')!=3){{'display:none'}}@endif">
                        <label class="sr-only" for="rooms">الغرف</label>
                        <select name="rooms" class="form-control transparent" name="rooms" id="rooms">
                          <option value="0" class="form-control" @if(old('rooms')==0){{"selected"}}@endif>إختر عدد الغرف *</option>
                          @foreach ($rooms as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('rooms')==$item->id){{"selected"}}@endif>{{$item->rooms}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('rooms'))
                            <span class="help-block">
                              {{$errors->first('rooms')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_rooms" id="h_rooms" value="@if(old('rooms')!=0) {{old('rooms')}} @else {{'0'}} @endif">
                      </div>

                      <div class="studio_option shop_option apartment_option form-group {{$errors->has('etage')? 'has-error' : ''}}" style="margin:5px;@if(old('r_e_type')!=1 && old('r_e_type')!=3 && old('r_e_type')!=6){{'display:none'}}@endif">
                        <label class="sr-only" for="etage">الطابق</label>
                        <select name="etage" class="form-control transparent" name="etage" id="etage">
                          <option value="0" class="form-control" @if(old('etage')==0){{"selected"}}@endif>إختر الطابق *</option>
                          @foreach ($etages as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('etage')==$item->id){{"selected"}}@endif>{{$item->etages}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('etage'))
                            <span class="help-block">
                              {{$errors->first('etage')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_etage" id="h_etage" value="@if(old('etage')!=0) {{old('etage')}} @else {{'0'}} @endif">
                      </div>
                      <!--end optional apartment شقة-->
                      <!--start optional house منزل-->
                      <div class="shop_option land_option house_option form-group {{$errors->has('facad')? 'has-error' : ''}}" style="margin:5px;@if(old('r_e_type')!=2 && old('r_e_type')!=5 && old('r_e_type')!=6){{'display:none'}}@endif">
                        <label class="sr-only" for="facad">الواجهات</label>
                        <select name="facad" class="form-control transparent" name="facad" id="facad">
                          <option value="0" class="form-control" @if(old('facad')==0){{"selected"}}@endif>الواجهات *</option>
                          @foreach ($facads as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('facad')==$item->id){{"selected"}}@endif>{{$item->facads}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('facad'))
                            <span class="help-block">
                              {{$errors->first('facad')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_facad" id="h_facad" value="@if(old('facad')!=0) {{old('facad')}} @else {{'0'}} @endif">
                      </div>
                      <div class="shop_option house_option form-group {{$errors->has('etage_number')? 'has-error' : ''}}" style="margin:5px;@if(old('r_e_type')!=2 && old('r_e_type')!=6){{'display:none'}}@endif">
                        <label class="sr-only" for="etage_number">عدد الطوابق</label>
                        <select name="etage_number" class="form-control transparent" id="etage_number">
                          <option value="0" class="form-control" @if(old('etage_number')==0){{"selected"}}@endif>عدد الطوابق *</option>
                          @foreach ($etage_numbers as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('etage_number')==$item->id){{"selected"}}@endif>{{$item->etage_number}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('etage_number'))
                            <span class="help-block">
                              {{$errors->first('etage_number')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_etage_number" id="h_etage_number" value="@if(old('etage_number')!=0) {{old('etage_number')}} @else {{'0'}} @endif">
                      </div>
                      <!--end optional house منزل-->
                      <!--start optional apartment and house منزل شقة-->
                      <div class="studio_option house_option apartment_option form-group {{$errors->has('furnished')? 'has-error' : ''}}" style="margin:5px;@if(old('r_e_type')!=1 && old('r_e_type')!=2 && old('r_e_type')!=3){{'display:none'}}@endif">
                        <label class="sr-only" for="furnished">الأثاث</label>
                        <select name="furnished" class="form-control transparent" name="furnished" id="furnished">
                          <option value="0" class="form-control" @if(old('furnished')==0){{"selected"}}@endif>الأثاث *</option>
                          @foreach ($furnisheds as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('furnished')==$item->id){{"selected"}}@endif>{{$item->furnisheds}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('furnished'))
                            <span class="help-block">
                              {{$errors->first('furnished')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_furnished" id="h_furnished" value="@if(old('furnished')!=0) {{old('furnished')}} @else {{'0'}} @endif">
                      </div>
                      <div class="studio_option house_option apartment_option form-group {{$errors->has('bathes')? 'has-error' : ''}}" style="margin:5px;@if(old('r_e_type')!=1 && old('r_e_type')!=2 && old('r_e_type')!=3){{'display:none'}}@endif">
                        <label class="sr-only" for="bathes">عدد الحمامات</label>
                        <select name="bathes" class="form-control transparent" id="bathes">
                          <option value="0" class="form-control" @if(old('bathes')==0){{"selected"}}@endif>إختر عدد الحمامات *</option>
                          @foreach ($bathes as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('bathes')==$item->id){{"selected"}}@endif>{{$item->bathes}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('bathes'))
                            <span class="help-block">
                              {{$errors->first('bathes')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_bathes" id="h_bathes" value="@if(old('bathes')!=0) {{old('bathes')}} @else {{'0'}} @endif">
                      </div>
                      <div class="studio_option house_option apartment_option form-group {{$errors->has('properties')? 'has-error' : ''}}" style="margin:5px;@if(old('r_e_type')!=1 && old('r_e_type')!=2 && old('r_e_type')!=3){{'display:none'}}@endif">
                        <label class="sr-only" for="properties">الوضغية</label>
                        <select name="properties" class="form-control transparent" id="properties">
                          <option value="0" class="form-control" @if(old('properties')==0){{"selected"}}@endif>إختر وضعية العقار *</option>
                          @foreach ($properties as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('properties')==$item->id){{"selected"}}@endif>{{$item->property}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('properties'))
                            <span class="help-block">
                              {{$errors->first('properties')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_properties" id="h_properties" value="@if(old('properties')!=0) {{old('properties')}} @else {{'0'}} @endif">
                      </div>
                      <!--end optional apartment and house منزل شقة-->
                      <!--start optional studio ستيديو-->
                      <!--end optional studio ستيديو-->
                      <!--start optional Farm مزرعة-->
                      <!--end optional Farm مزرعة-->
                      <!--start optional land أرض-->
                      <!--end optional land أرض-->
                      <!--start optional Shop محل-->
                      <!--end optional Shop محل-->
                      <!---->
                      {{-- <div class="form-group {{$errors->has('space')? 'has-error':''}}"  style="margin:5px;">
                        <label class="sr-only" for="space">المساحة</label>
                        <input value="{{old('space')}}"name="space" type="number" class="form-control transparent" placeholder="أدخل مساحة العقار بالمتر المربع.(ليس إجبارياً)">
                        @if($errors->has('space'))
                        <span class="help-block">
                        {{ $errors->first('space')}}
                        </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('long')? 'has-error':''}}"  style="margin:5px;">
                        <label class="sr-only" for="long">طول العقار</label>
                        <input value="{{old('long')}}" name="long" type="number" class="form-control transparent" placeholder="أدخل طول العقار بالمتر.(ليس إجبارياً)">
                        @if($errors->has('long'))
                        <span class="help-block">
                        {{ $errors->first('long')}}
                        </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('width')? 'has-error':''}}"  style="margin:5px;">
                        <label class="sr-only" for="width">عرض العقار</label>
                        <input value="{{old('width')}}" name="width" type="number" class="form-control transparent" placeholder="أدخل عرض العقار بالمتر.(ليس إجبارياً)">
                        @if($errors->has('width'))
                        <span class="help-block">
                        {{ $errors->first('width')}}
                        </span>
                        @endif
                      </div> --}}
                      <!---->
                      <div class="form-group {{$errors->has('tronsaction')? 'has-error' : ''}}" style="margin:5px;">
                        <label class="sr-only" for="type_rent_or_buy">إختر نوع المعاملة</label>      
                        <select name="tronsaction" class="form-control transparent" name="type_rent_or_buy" id="type_rent_or_buy">
                          <option value="0" class="form-control" @if(old('tronsaction')==0){{"selected"}}@endif>إختر نوع المعاملة *</option>
                          @foreach ($tronsaction as $item)
                          <option value="{{$item->id}}" class="form-control" @if(old('tronsaction')==$item->id){{"selected"}}@endif>{{$item->tronsaction}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('tronsaction'))
                            <span class="help-block">
                              {{$errors->first('tronsaction')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_tronsaction" id="h_tronsaction" value="@if(old('tronsaction')!=0) {{old('tronsaction')}} @else {{'0'}} @endif">
                      </div>
                      <div class="form-group {{$errors->has('wilaya')? 'has-error' : ''}}" style="margin:5px;">
                        <label class="sr-only" for="wilaya">الولاية</label>
                        <select name="wilaya" class="form-control transparent" id="select_wilaya">
                          <option value="0" class="form-control">إختر الولاية *</option>
                          @foreach ($wilayas as $wilaya)
                          <option value="{{$wilaya->id}}" class="form-control">{{$wilaya->ar_name}}</option>  
                          @endforeach  
                        </select>
                        @if ($errors->has('wilaya'))
                            <span class="help-block">
                              {{$errors->first('wilaya')}}
                            </span>
                        @endif
                        <input type="hidden" name="h_wilaya" id="h_wilaya" value="@if(old('wilaya')!=0) {{old('wilaya')}} @else {{'0'}} @endif">
                      </div>
                      <div id="dayra" class="form-group" style="margin:5px;display:none;">                        
                        {{-- <label class="sr-only" for="wilaya">الدائرة</label>
                        <select name="dayra" class="form-control transparent" id="select_dayra">
                          <option value="0" class="form-control">إختر الدائرة</option>
                        </select> --}}
                        <input type="hidden" name="h_dayra" id="h_dayra" value="@if(old('dayra')!=0) {{old('dayra')}} @else {{'0'}} @endif">
                      </div>
                      <div id="baladia" class="form-group" style="margin:5px;display:none;">
                        <input type="hidden" name="h_baladia" id="h_baladia" value="@if(old('baladia')!=0) {{old('baladia')}} @else {{'0'}} @endif">
                      </div> 

                      {{-- <div class="form-group {{$errors->has('address')? 'has-error':''}}"  style="margin:5px;">
                        <label class="sr-only" for="address">عنوان العقار</label>
                        <input value="{{old('address')}}" name="َaddress" type="text" class="form-control transparent" placeholder="عنوان العقار.(ليس إجبارياً)">
                        @if($errors->has('address'))
                        <span class="help-block">
                        {{ $errors->first('address')}}
                        </span>
                        @endif
                      </div>
                      <div class="form-group {{$errors->has('price')? 'has-error':''}}" style="margin:5px;">
                        <label class="sr-only" for="price">السعر المطلوب</label>
                        <input value="{{old('price')}}" name="price" type="number" class="form-control transparent" placeholder="أدخل السعر البيع أو الكراء بالدينار الجزائري *">
                        @if($errors->has('price'))
                        <span class="help-block">
                          {{$errors->first('price')}}
                        </span>
                        @endif
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group {{($errors->has('files') || $errors->has('files.*') )? 'has-error':''}}" style="margin:5px;">                        
                            <input class="form-control transparent" type="file" name="files[]" multiple id="files" accept="image/*">
                            <label class="btn btn-warning file-lable" for="files"><i class="fa fa-image"> إختر صور للعقار</i></label>
                            @if($errors->has('files'))
                            <span class="help-block">
                              {{$errors->first('files')}}
                            </span>
                            @endif
                            @if($errors->has('files.*'))
                            <span class="help-block">
                              {{$errors->first('files.*')}}
                            </span>
                            @endif
                          </div>
                        </div>
                        
                      </div> --}}
                      {{-- <div class="row">
                        <div class="col-md-12">
                        <div class="form-group {{$errors->has('google_map')? 'has-error':''}}"  style="margin:5px;">
                            <label class="sr-only" for="google_map">عنوان العقار على خريطة google</label>
                            <textarea class="form-control transparent" name="google_map" id="google_map" cols="30" rows="4" placeholder="إنسخ و ألصق عنوان العقار من خرائط قوقل.(ليس إجبارياً)">{{old('google_map')}}</textarea>
                            @if($errors->has('google_map'))
                            <span class="help-block">
                            {{ $errors->first('google_map')}}
                            </span>
                            @endif
                          </div> --}}

                          <div class="form-group {{$errors->has('description')? 'has-error':''}}"  style="margin:5px;">
                            <label class="sr-only" for="description">توضيحات أخرى حول العقار</label>
                            <textarea class="form-control transparent" name="description" id="description" cols="30" rows="4" placeholder="أكتب توضيحات أخرى للعقار.(ليس إجبارياً)">{{old('description')}}</textarea>
                            @if($errors->has('description'))
                            <span class="help-block">
                            {{ $errors->first('description')}}
                            </span>
                            @endif
                          </div>

                          {{-- <div class="form-group {{$errors->has('rolls')? 'has-error':''}}"  style="margin:5px;">
                            <label class="sr-only" for="rolls">شروط البيع أو الإيجار</label>
                            <textarea class="form-control transparent" name="rolls" id="rolls" cols="30" rows="4" placeholder="أكتب شروط البيع أو الإيجار هنا.(ليس إجبارياً)">{{old('rolls')}}</textarea>
                            @if($errors->has('rolls'))
                            <span class="help-block">
                            {{ $errors->first('rolls')}}
                            </span>
                            @endif
                          </div> --}}
                          <div class="col-12" style="margin:5px;">
                            <div class="form-group {{$errors->has('contra')? 'has-error':''}}">
                              <input type="checkbox" name="contra">
                              <label for="contra" style="color:#ffffff">موافق على جميع<a href="#"> شروط الإستخدام</a> للموقع</label>
                              @if($errors->has('contra'))
                              <span class="help-block">
                              {{ $errors->first('contra')}}
                              </span>
                              @endif
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <button type="submit" class="col-12 btn btn-danger btn-fill">حفظ</button>
                                </div>
                            </div>
    
                          </div>

                      </div>
                      
                      </div> 
                      
                      
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection