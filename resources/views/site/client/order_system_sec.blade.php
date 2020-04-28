
@extends('layouts.start_layout')
@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-left m-t-15">
                    <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                            data-toggle="dropdown" aria-expanded="false">مساعدة؟ <span class="m-l-5"><i
                                    class="fa fa-cog"></i></span></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="tel:02-27609943">02-27609943 اتصال</a>
                        <a class="dropdown-item" href="https://api.whatsapp.com/send?phone=201113433900">01113433900 واتساب</a>
                        <a class="dropdown-item" href="http://m.me/AhramExpress">محادثة فيسبوك</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="https://ahramexpress.com/help">مركز المساعدة</a>
                    </div>

                </div>
                <h4 class="page-title text-right">أضف بيانات المستلمين</h4>
            </div>
        </div>
    </div>
    <!-- end row -->
    @php(
 $i=1
 )
      @if(session('success'))
            <div class="alert alert-success">
                <strong>{{session('success')}}</strong>
            </div>
            @else
            @endif
    @for($i;session('number')>=$i;$i++)
    <div class="panel-group text-right">
        <div class="panel panel-default" style="direction:rtl;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse{{$i}}">مكان التسليم{{$i}}</a>
                </h4>
            </div>
            <div id="collapse{{$i}}" class="panel-collapse collapse">
                <div class="panel-body">  <!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">مكان التسليم {{$i}}</h4>
                                <form  action="{{url('/order_system_sec')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                    <input class="form-control" type="text" name="id" value="{{session('id')}}" id="example-text-input" hidden>

                                    <input class="form-control" type="text" name="number" value="{{session('number')}}" id="example-text-input" hidden>
                                    <input class="form-control" type="text" name="i" value="{{$i}}" id="example-text-input" hidden>

                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-email-input" class="col-form-label">المحافظة</label>
                                        <select class="form-control" id="country" name="country_id">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($country as  $coun)
                                                <option value="{{$coun->id}}">{{$coun->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-email-input" class="col-form-label">المدينة</label>
                                        <select class="form-control" name="state" id="state">


                                        </select>
                                    </div>


                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-email-input" class="col-form-label">المنطقة</label>

                                        <select class="form-control" name="city" id="city">

                                        </select>
                                    </div>

                                    <div class="col-md-4 col-sm-10">
                                        <label for="example-text-input" >العنوان بالضبط</label>
                                        <input class="form-control" type="text" name="address" value="" id="example-text-input">
                                    </div>


                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-text-input" >علامة مميزة</label>
                                        <input class="form-control" type="text" value=""  name="land_mark" id="example-text-input">
                                    </div>

                                </div>



                                <div class="form-group row">
                                    <div class="col-md-4 col-sm-10">
                                        <label for="example-text-input" class="col-form-label">اسم المستلم</label>
                                        <input class="form-control" type="text" value="" name="name" id="example-text-input">
                                    </div>



                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-text-input" class="col-form-label">رقم موبايل</label>
                                        <input class="form-control" type="text" value="" name="phone" id="example-text-input">
                                    </div>

                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-text-input"  class="col-form-label">رقم موبايل اضافي</label>
                                        <input class="form-control" type="text" value=""  name="phone1" id="example-text-input">
                                    </div>


                                    <div class="col-md-4 col-sm-10">
                                        <label for="example-text-input" class="col-form-label">التاريخ المفضل للتسليم</label>

                                        <!-- <small>تجاهل هذه الخطوة في حالة الرغبة في وصول مسؤول الاستلام غداً </small> -->

                                        <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2019 10:00 AM - 01/01/2019 2:00 PM"/>
                                    </div>




                                </div>



                                <div class="form-group row">
                                    <div class="col-md-3 col-sm-10">
                                        <label for="example-text-input" class=" col-form-label">سعر الشحن</label>

                                        <p>
                                            <small>اتركها فارغة في حالة لديك نظام أسعار مطبق على حسابك </small></p>
                                        <input class="form-control" type="text" value="" name="shipping" id="example-text-input">
                                    </div>

                                    <div class="col-md-3 col-sm-10">
                                        <label for="example-text-input" class=" col-form-label">سعر الفاتوره </label>

                                        <p>
                                            <small> غير شاملة مصاريف الشحن </small></p>
                                        <input class="form-control" type="text" value="" name="feez" id="example-text-input">
                                    </div>


                                    <div class="col-md-3 col-sm-10">
                                        <label for="example-text-input" class=" col-form-label">القيمة الاجمالية للفاتورة</label>
                                        <p>  <small>شاملة مصاريف الشحن </small> </p>
                                        <input class="form-control" type="text" value="" name="total" id="example-text-input">
                                    </div>

                                    <div class="col-md-4 col-sm-10">
                                        <label for="example-text-input" class="col-form-label">ما محتوى الشحنة؟</label>
                                        <p>  <small>مثال: فستان اسود، موبايل، لابتوب </small> </p>
                                        <input class="form-control" type="text" value="" name="type" id="example-text-input">
                                    </div>


                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-url-input" class=" col-form-label">قابل للكسر؟</label>
                                        <p><br></p>
                                        <select class="form-control" id="exampleSelect1" name="stat">
                                            <option value="0">لا</option>
                                            <option value="1">نعم</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-10">
                                        <label for="example-url-input" class=" col-form-label"> الخدمه ؟</label>
                                        <p><br></p>
                                        <select class="form-control" id="exampleSelect1" name="service">
                                            @foreach($service as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>

                                                @endforeach
                                        </select>
                                    </div>



                                </div>


                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-form-label">ملاحظات</label>
                                    <div class="col-md-10">
                                <textarea class="form-control" id="exampleTextarea"
                                          rows="3" name="note"></textarea>
                                    </div>
                                </div>

                                <button type="submit"   class="btn btn-primary" id="butsave">التالي</button>

                                </form>
                            </div>
                        </div>
                    </div></div>

            </div>
        </div>
    </div>

    <hr>
    @endfor


    <!-- نهاية  -->


{{--{{$number}}--}}
    <!-- end row -->
@stop

