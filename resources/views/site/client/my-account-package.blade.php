
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
                            <h4 class="page-title text-right">نظام حسابك</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row" style="direction: rtl; text-align: right;">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">لا يوجد نظام حالي لحسابك</h4>
                            <p class="text-muted font-14 m-b-20">
                                <li> لا يوجد معلومات.. اتصل بخدمة العملاء للاشتراك في نظام حساب مناسب لك </li>
                                
                            </p>
                            <p class="text-muted font-14 m-b-20">
                               اذا واجهتك مشكله، او لمزيد من المعلومات كلم خدمة العملاء
                            </p>

                        </div>

                    </div>

                    <div class="col-lg-6">

                    <!--    <div class="card-box">
                            <h4 class="m-t-0 header-title">أنظمة الحساب التالي</h4>
                            <p class="text-muted font-14 m-b-20">
                               اختر من بين طرق ارسال شحناتك
                            </p>
                            <a href="add-order-system.php"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">عبر نظام اهرام اكسبريس</button></a>
                            <a href="add-order-excel.php">  <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">تحميل ملف اكسيل</button></a>
                            <a href="add-order-api.php"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">ربط API</button></a>

                        
                        </div> -->

                    </div>
                </div>
                <!--- end row -->
                 

@stop