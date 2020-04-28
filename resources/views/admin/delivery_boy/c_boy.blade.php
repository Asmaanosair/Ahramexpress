@extends('layouts.admin_lay')
@section('content')
    <div class="row">
        <a href="{{url('kt_admin/boy')}}" class="btn btn-warning pull-right">المندوبين   </a>
        <div class="col-md-12">
            <!-- The time line -->
            <form role="form" action="{{url('/kt_admin/add_boy')}}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-red">
                 26_Jun_2019
                  </span>
                    </li>




                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 26_Jun_2019</span>

                            <h3 class="timeline-header"><a href="#">معلومات عن  </a> المندوب </h3>

                            <div class="timeline-body">
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1"> اسم المندوب    </label>
                                        <input type="text" class="form-control"  name="name" id="exampleInputPassword1"  placeholder="الاسم">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1"> رقم الهاتف   </label>
                                        <input type="text" class="form-control"  name="ph" id="exampleInputPassword1"  placeholder="الهاتف">
                                        @if ($errors->has('ph'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('ph') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">  الايميل    </label>
                                        <input type="email" class="form-control"  name="email" id="exampleInputPassword1"  placeholder="الايميل ">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">    العنوان  </label>
                                        <textarea type="text" class="form-control"  name="address" id="exampleInputPassword1"  placeholder="العنوان "></textarea>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">  ID_CODE    </label>
                                        <input type="text" class="form-control"  name="code" id="exampleInputPassword1"  placeholder="code ">
                                        @if ($errors->has('code'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                         </span>
                                        @endif
                                    </div>





                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">  الباسورد     </label>
                                        <input type="password" class="form-control"  name="password" id="exampleInputPassword1"  placeholder="الباسورد ">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                         </span>
                                        @endif
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
                <button type="submit" class="btn btn-warning  col-lg-3 " style="    margin-left: 37%;">حفظ التغيرات   </button>

            </form>
        </div>
        <!-- /.col -->
    </div>
@endsection