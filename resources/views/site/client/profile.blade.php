@extends('layouts.start_layout')
@section('content')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-left m-t-15">
                <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                        data-toggle="dropdown" aria-expanded="false">مساعدة؟<span class="m-l-5"><i
                                class="fa fa-cog"></i></span></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="tel:02-27609943">02-27609943 اتصال</a>
                    <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=201113433900">01113433900 واتساب</a>
                    <a class="dropdown-item" href="http://m.me/AhramExpress">محادثة فيسبوك</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://ahramexpress.com/help">مركز المساعدة</a>
                </div>

            </div>
            <h4 class="page-title text-right">معلوماتي</h4>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row" style="direction: rtl; text-align: right;">
    <div class="col-12">
        <div class="card-box">
            @if(session('success'))
            <div class="alert alert-success">
                <strong>{{session('success')}}</strong>
            </div>
            @else
            @endif

            <h4 class="header-title m-t-0 m-b-30">معلومات التاجر</h4>
            <form method="post" action="{{url('client_account')}}" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="row">
                <div class="col-xl-6">

                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">اسم المسؤول الثلاثي</label>
                            <small class="text-muted">يجب أن يكون مطابقاً لبطاقة الرقم القومي
                                <input class="form-control m-b-20" type="text" @if(isset($client->name)) value="{{$client->name}}"  @else @endif placeholder="" name="name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                @endif
                                <input class="form-control m-b-20" type="text"  value="{{  Auth::guard('client')->user()->id}}" name="id" hidden>
                            </small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">اسم النشاط ونوعه</label>
                            <small class="text-muted">مثال: بيوتي اتاليه للأزياء
                                <input class="form-control m-b-20" type="text"  @if(isset($client->company)) value="{{$client->company}}"  @else @endif name="company" placeholder="">
                                @if ($errors->has('company'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('company') }}</strong>
                                         </span>
                                @endif

                            </small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">رقم الموبايل</label>
                            <small class="text-muted">رقم الهاتف الذي سيتم التواصل معه من قبل أهرام اكسبريس
                                <input class="form-control m-b-20" type="text" @if(isset($client->phone)) value="{{$client->phone}}"  @else @endif name="phone" placeholder="">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                         </span>
                                @endif
                            </small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">البريد الالكتروني</label>
                            <small class="text-muted">اذا كنت تود ارسال تنبيهات وآخر الاخبار اكتب بريدك الالكتروني
                                <input class="form-control m-b-20" type="text"  @if(isset($client->email)) value="{{$client->email}}"  @else @endif name="email" placeholder="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                @endif

                            </small>
                        </fieldset>





                        <button type="submit" class="btn btn-primary">حفظ</button>

                </div><!-- end col -->

                <div class="col-xl-6 m-t-sm-40">


                            <label for="exampleInputEmail1">عنوان الاستلام</label>
                            <small class="text-muted">عنوان استلام الطرود والمراسلات </small>
                            <fieldset class="form-group">
                                <label for="example-email-input" class="col-form-label">المحافظة</label>
                                <select class="form-control" id="country" name="country_id">
                                    <option value="" selected disabled>Select</option>
                                    @if($client->country_id!=null)
                                        @php(
                                        $country1=\App\country::find($client->country_id)
                                        )
                                        <option value="{{$client->country_id}}" selected>{{$country1->name}}</option>
                                        @else
                                        @endif
                                    @foreach($country as  $coun)
                                        <option value="{{$coun->id}}">{{$coun->name}}</option>
                                    @endforeach

                                </select>

                            </fieldset>
                            <fieldset class="form-group">
                                <label for="example-email-input" class="col-form-label">المدينة</label>
                                <select class="form-control" name="state" id="state">
                                    @if($client->city_id!=null)
                                        @php(
                                        $city1=\App\city::find($client->city_id)
                                        )
                                        <option value="{{$client->city_id}}" selected>{{$city1->name}}</option>
                                    @else
                                    @endif


                                </select>

                            </fieldset>
                            <fieldset class="form-group">
                                <label for="example-email-input" class="col-form-label">المنطقة</label>

                                <select class="form-control" name="city" id="city">
                                    @if($client->district_id!=null)
                                        @php(
                                        $district1=\App\district::find($client->district_id)
                                        )
                                        <option value="{{$client->district_id}}" selected>{{$district1->name}}</option>
                                    @else
                                    @endif

                                </select>
                                </small>
                            </fieldset>
                            </small>

                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">العنوان بالتفصيل</label>
                                <small class="text-muted">
                                    <input class="form-control m-b-20" type="textarea"   @if(isset($client->address)) value="{{$client->address}}"  @else @endif name="address" placeholder="العنوان بالتفصيل">

                                </small>

                            </fieldset>








                </div><!-- end col -->

            </div><!-- end row -->
            </form>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

  <form method="post" action="{{url('client_account/attachment')}}" enctype="multipart/form-data">
                {{csrf_field()}}
  <input class="form-control m-b-20" type="text"  value="{{  Auth::guard('client')->user()->id}}" name="id" hidden>
<div class="row" style="direction: rtl; text-align: right;">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">البطاقة الشخصية</h4>


            <div class="row">
                <div class="col-md-4">
                    <div class="card-box">
                        
                                        @php(
                                        $image=explode(',',$client->attach)
                                        )

                        <h4 class="header-title m-t-0 m-b-30">صورة البطاقة من الأمام</h4>

                        <input type="file" class="dropify" name="image[]" data-default-file="@if($client->attach!=null){{asset('img/'.$image[0])}} @endif"  />
                    </div>
                </div><!-- end col -->

  @if ($errors->has('image'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                         </span>
                                @endif
                <div class="col-md-4">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">صورة البطاقة من الخلف</h4>

                        <input type="file" class="dropify" name="image[]" data-default-file="@if($client->attach!=null){{asset('img/'.$image[1])}} @endif"  />
                    </div>
                </div><!-- end col -->


            </div>
            <!-- end row -->


    <button type="submit" class="btn btn-primary">حفظ</button>

        </div>
    </div><!-- end col -->
</div>
</form>
<!-- end row -->
<form method="post" action="{{url('client_account/bank')}}" enctype="multipart/form-data">
                {{csrf_field()}}
 <input class="form-control m-b-20" type="text"  value="{{  Auth::guard('client')->user()->id}}" name="id" hidden>
<div class="row" style="direction: rtl; text-align: right;">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">المعلومات المالية</h4>

            <div class="row">
                <div class="col-xl-4">
                    <form>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">فودافون كاش</label>
                            <small class="text-muted">حد أقصى يومي 3000 ج.م - تخصم رسوم فودافون كاش عند الارسال
                                <input class="form-control m-b-20" type="text"  name="vf" @if(isset($find->vf))  value="{{$find->vf}}" @else  @endif  placeholder="رقم فودافون كاش الخاص بك">

                            </small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">أورانج موني</label>
                            <small class="text-muted">حد أقصى يومي 3000 ج.م - تخصم رسوم أورانج موني عند الارسال
                                <input class="form-control m-b-20" type="text"   name="orang" @if(isset($find->orang))  value="{{$find->orang}}" @else  @endif  placeholder="رقم اورانج موني الخاص بك">
                            </small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">اتصالات فلوس</label>
                            <small class="text-muted">حد أقصى يومي 3000 ج.م - تخصم رسوم اتصالات فلوس عند الارسال
                                <input class="form-control m-b-20" type="text" name="et"  @if(isset($find->et))  value="{{$find->et}}" @else  @endif placeholder="رقم اتصالات فلوس الخاص بك">

                            </small>
                        </fieldset>





                        <button type="submit" class="btn btn-primary">حفظ</button>
                   
                </div><!-- end col -->

                <div class="col-xl-8 m-t-sm-40">
                    <form>
                        <fieldset>
                            <label for="exampleInputEmail1">البريد المصري</label>
                            <small class="text-muted">تخصم رسوم البريد + 50 ج.م رسوم الخدمة
                                <div class="row">


                                    <div class="col-4">
                                        <input type="text"  name="number" @if(isset($find->number))  value="{{$find->number}}" @else  @endif  class="form-control m-b-15"
                                               placeholder="الرقم القومي">
                                    </div>
                                    <div class="col-8">
                                        <input type="text"  name="name1" @if(isset($find->name))  value="{{$find->name}}" @else  @endif class="form-control m-b-15"
                                               placeholder="الاسم الرباعي">
                                    </div>
                                </div>
                            </small>
                        </fieldset>
                        <div class="form-group">
                            <label for="disabledSelect">الحساب البنكي</label>
                            <small class="text-muted">تخصم رسوم البنك + 50 ج.م رسوم الخدمة
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text"  name="bank" @if(isset($find2->name)) value="{{$find2->name}}"   @else @endif class="form-control m-b-15"
                                               placeholder="اسم الحساب والفرع">
                                    </div>
                                    <div class="col-4">
                                        <input type="text"   name="name" @if(isset($find2->username)) value="{{$find2->username}}"   @else @endif class="form-control m-b-15"
                                               placeholder="اسم صاحب الحساب">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" name="account"  @if(isset($find2->account)) value="{{$find2->account}}"   @else @endif class="form-control m-b-15"
                                               placeholder="رقم الحساب">
                                    </div>
                                </div>
                        </div>
                        </small>
                        </fieldset>




                    
                </div><!-- end col -->

            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
</form>


<div class="row" style="direction: rtl; text-align: right;">
    <div class="col-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">تحميل مرفقات اخرى</h4>
 <form method="post" action="{{url('client_account/other')}}" enctype="multipart/form-data">
                {{csrf_field()}}
 <input class="form-control m-b-20" type="text"  value="{{  Auth::guard('client')->user()->id}}" name="id" hidden>
            <div class="row">
                 <div class="col-md-4">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">اضافة مستندات وصور</h4>

                        <input type="file"  name="image[]" class="dropify" data-default-file=""  />
                    </div>
                     <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
               
                  @if($client->other==null)
                                    @else
                                        @php(
                                        $image=explode(',',$client->other)
                                        )
                                    
                                        @foreach($image as $row2)
                <div class="col-md-4">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">مستندات وصور</h4>

                        <input type="file" class="dropify"  name="image[]" data-default-file="{{asset('img/'.$row2)}}"  />
                        @if ($errors->has('image'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                         </span>
                                @endif
                    </div>
                </div><!-- end col -->
                @endforeach

               <!-- end col -->
              



@endif


            </div>
            </form>
            <!-- end row -->




        </div>
    </div><!-- end col -->
</div>
<!-- end row -->



@stop
