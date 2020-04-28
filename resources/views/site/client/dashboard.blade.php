
@extends('layouts.start_layout')
@section('content')


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
            <h4 class="page-title text-right">مرحبا بك</h4>
        </div>
    </div>
</div>


<div class="row" style="direction: rtl; text-align: right;">
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-layers float-left text-muted"></i>
            <h6 class="text-muted text-uppercase m-b-20">عدد الاوردات</h6>
            <h2 class="m-b-20" data-plugin="counterup">{{$num}}</h2>

        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-left text-muted"></i>
            <h6 class="text-muted text-uppercase m-b-20">الرصيد الحالي</h6>
            <h2 class="m-b-20">ج.م<span data-plugin="counterup">0</span></h2>

        </div>
    </div>

    <div class="col-md-6 col-xl-3">

    </div>

    <div class="col-md-6 col-xl-3">

    </div>
</div>
<!-- end row -->

<div class="row" style="direction: rtl; text-align: right;">
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="m-t-0 header-title">ملاحظات</h4>
            <p class="text-muted font-14 m-b-20">
            <li> يجب التأكد من جاهزية الطلبات عند وصول مسؤول الاستلام </li>
            <li>في حالة طلب استلام بعد الساعة 3 ظهراً يتم وصول المندوب في اليوم التالي </li>
            <li> يرجى التأكد من كافة الطرود، واغلاقها بإحكام عن طريق الستيكر الخاص بأهرام اكسبريس </li>
            <li> يرجى التأكد من رقم الاوردر المكتوب على الستيكر يجب ان يكون متطابقاً كما هو في نظامنا </li>
            </p>
            <p class="text-muted font-14 m-b-20">
                اذا واجهتك مشكله، او لمزيد من المعلومات كلم خدمة العملاء
            </p>

        </div>

    </div>

    <div class="col-lg-6">

        <div class="card-box">
            <h4 class="m-t-0 header-title">أدوات الارسال</h4>
            <p class="text-muted font-14 m-b-20">
                اختر من بين طرق ارسال شحناتك
            </p>
            <a href="{{url('/order_system')}}"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">عبر نظام اهرام اكسبريس</button></a>
            <a href="add-order-excel.php">  <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">تحميل ملف اكسيل</button></a>
            <a href="add-order-api.php"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">ربط API</button></a>

          <!--  <form action="{{ url('import') }}" method="POST" name="importform"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file" class="form-control">
                <br>
                <a class="btn btn-info" href="{{ url('export') }}">
                    Export File</a>
                <button class="btn btn-success">Import File</button>
            </form>-->
        </div>

    </div>
</div>
<!--- end row -->




</div>

    @stop