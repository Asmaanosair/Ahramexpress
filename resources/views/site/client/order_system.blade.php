
@extends('layouts.start_layout')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group float-left m-t-15">
                <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                        data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                class="fa fa-cog"></i></span></button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
            <h4 class="page-title text-right">ارسال شحنات عبر نظام أهرام اكسبريس</h4>
        </div>
    </div>
</div>
<!-- end row -->
<div class="row" style="direction: rtl; text-align: right;">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">الخطوة الأولى</h4>
<form  action="{{url('/order_system')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-10 col-md-2 col-form-label">عدد الشحنات</label>
                <div class="col-md-2">
                    <input class="form-control" type="text" value="" name="number" id="example-text-input" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-10 col-md-2 col-form-label">اجمالي قيمة الشحنات بدون رسوم الشحن</label>
                <div class="col-md-2">
                    <input class="form-control" type="text" value="" name="total" required id="example-text-input" >
                </div>
            </div>
            <div class="form-group row">

                <label for="example-text-input" class="col-sm-10 col-md-2 col-form-label">التاريخ والوقت المفضل للاستلام</label>
                <div class="col-10">
                    <small>تجاهل هذه الخطوة في حالة الرغبة في وصول مسؤول الاستلام غداً </small>

                    <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM"/>
                </div>


            </div>
            <div class="form-group row">
                <label for="example-email-input" class="col-sm-10 col-md-2 col-form-label">وسيلة النقل</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="veh">
                        @foreach($veh as $vehicle)
                        <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>

                            @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-url-input" class="col-sm-10 col-md-2 col-form-label">هل توجد طرود قابلة للكسر؟</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="stat">
                        <option value="0">لا</option>
                        <option value="1">نعم</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-tel-input" class="col-sm-10 col-md-2 col-form-label">ملاحظات</label>
                <div class="col-10">
                                <textarea class="form-control" name="note" id="exampleTextarea"
                                          rows="3"></textarea>
                </div>
            </div>

            <button type="submit" href="add-order-system-2.php" class="btn btn-primary">الخطوة التالية</button>

</form>
        </div>
    </div>
</div>
@stop