@extends('layouts.admin_lay')
@section('content')
    <div class="row">

        <a href="{{url('kt_admin/boy')}}" class="btn btn-success pull-right">المناديب  </a>
        <div class="col-md-12">
            <!-- The time line -->

            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                {{ date("d-m-Y", strtotime($client->created_at))}}
                  </span>
                </li>
{{--                <li>--}}
{{--                    <i class="fa fa-car bg-yellow"></i>--}}

{{--                    <div class="timeline-item">--}}
{{--                        <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>--}}

{{--                        <h3 class="timeline-header"><a href="#"> الطلبات الخاصه ب   </a> المندوب </h3>--}}

{{--                        <div class="timeline-body">--}}
{{--                            <div class="row">--}}
{{--                                @foreach($status as $row)--}}
{{--                                    <div class=" col-lg-3">--}}
{{--                                        <a class="btn btn-warning"  href="{{url('kt_admin/boy_'.$client->id.'/'.$row->id)}}" style="width: 100%">{{$row->name}}</a>--}}
{{--                                        <br>--}}
{{--                                        <br>--}}

{{--                                    </div>--}}

{{--                                @endforeach--}}


{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </li>--}}



                {{csrf_field()}}
                <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                        <h3 class="timeline-header"><a href="#">معلومات عن  </a> المندوب </h3>

                        <div class="timeline-body">
                            <div class="row">
                                <div class=" col-lg-6">
                                    <span class="text-red text-bold ">الاسم </span> : {{$client->name}}

                                </div>
                                <div class=" col-lg-6">
                                    <span class="text-red text-bold ">رقم الهاتف   </span> : {{$client->phone}}

                                </div>

                                <div class=" col-lg-6">
                                    <span class="text-red text-bold ">البريد الالكتروني    </span> : {{$client->email}}

                                </div>

                                <div class=" col-lg-6">
                                    <span class="text-red text-bold ">العنوان   </span> : {{$client->address}}

                                </div>

                                <div class=" col-lg-6">
                                    <span class="text-red text-bold "> ID_CODE     </span> : {{$client->number}}

                                </div>
                                <div class=" col-lg-6">


                                </div>









                            </div>
                        </div>

                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <!-- timeline item -->


                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
            <a   class="btn btn-warning  col-lg-3 " style="    margin-left: 37%;"href="{{url('kt_admin/e_boy/'.$client->id)}}"> تعديل </a>


        </div>
        <!-- /.col -->
    </div>
@endsection