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
                <h4 class="page-title text-right">طلبات الاستلام</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row" style="direction: rtl; text-align: right;">
        <div class="col-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"> <button type="submit" class="btn btn-primary">تحديث الصفحة</button></h4>
                <p class="text-muted font-14 m-b-30">
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>عدد الشحنات</th>
                        <th>ميعاد الاستلام</th>
                        <th>حالة الطلب</th>
                        <th>كود التتبع</th>
                        <th>اجراء</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($num as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td><a class="btn btn-success" href="{{url('/Cargo/'.$order->id)}}">  {{$order->number}}</a></td>
                        <td>{{$order->r_date}}	</td>
                        <td>  @php(
                            $status=\App\status::find($order->status_id)
                            )
                            @if(count($status)==0)
                                جارى ارسال الطلب
                            @else
                                {{  $status->name}}
                            @endif</td>
                        <td>{{$order->track_num}}</td>
                         <td><a  class="btn btn-success"href="{{url('/invoice/'.$order->id)}}">طباعه _مشاهده</a></t>
                    </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->



@stop