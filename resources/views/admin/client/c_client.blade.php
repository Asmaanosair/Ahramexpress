@extends('layouts.admin_lay')
@section('content')
    <div class="row">
          <a href="{{url('kt_admin/client')}}" class="btn btn-warning pull-right">العملاء  </a>
        <div class="col-md-12">
            <!-- The time line -->
            <form role="form" action="{{url('/kt_admin/add_client')}}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-red">
                  {{date(' d_M_Y')}}
                  </span>
                    </li>




                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                            <h3 class="timeline-header"><a href="#">معلومات عن  </a> العميل </h3>

                            <div class="timeline-body">
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1"> اسم التاجر ثلاثى   </label>
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
                                        <label for="exampleInputPassword1">    اسم الشركه او النشاط   </label>
                                        <textarea type="text" class="form-control"  name="company" id="exampleInputPassword1"  placeholder="اسم الشركه  "></textarea>
                                        @if ($errors->has('company'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('company') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1" > صوره البطاقه الاماميه والخلفيه  </label>
                                        <input type="file" rows="6" class="form-control"   name="image[]" id="exampleInputPassword1" placeholder="Link" MULTIPLE>

                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1" > صور مستندات اخرى </label>
                                        <input type="file" rows="6" class="form-control"   name="image2[]" id="exampleInputPassword1" placeholder="Link" MULTIPLE>

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
                        <i class="fa fa-comments bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                            <h3 class="timeline-header"><a href="#">الحساب البنكى  </a> للعميل</h3>

                            <div class="timeline-body">
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1"> اسم  البنك   </label>
                                        <input type="text" class="form-control"  name="bank" id="exampleInputPassword1"  placeholder="الاسم">
                                        @if ($errors->has('bank'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('bank') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1"> رقم الحساب   </label>
                                        <input type="text" class="form-control"  name="account" id="exampleInputPassword1"  placeholder="الحساب">
                                        @if ($errors->has('account'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('account') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">  اسم صاحب الحساب     </label>
                                        <input type="text" class="form-control"  name="name2" id="exampleInputPassword1"  placeholder="اسم صاحب الحساب  ">
                                        @if ($errors->has('name2'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name2') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">    عنوان البنك   </label>
                                        <textarea type="text" class="form-control"  name="address2" id="exampleInputPassword1"  placeholder="العنوان "></textarea>
                                        @if ($errors->has('address2'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                    </li>
                    <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                            <h3 class="timeline-header no-border"><a href="#">حساب اخر </a> للعميل </h3>

                            <div class="timeline-body">
                                <div class="row">
                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1"> فودافون كاش   </label>
                                        <input type="text" class="form-control"  name="vf" id="exampleInputPassword1"  placeholder="فودافون كاش">
                                        @if ($errors->has('vf'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('vf') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">حساب اورانج   </label>
                                        <input type="text" class="form-control"  name="orang" id="exampleInputPassword1"  placeholder="الحساب">
                                        @if ($errors->has('orang'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('orang') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">  حساب اتصالات    </label>
                                        <input type="text" class="form-control"  name="et" id="exampleInputPassword1"  placeholder=" الحساب  ">
                                        @if ($errors->has('et'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('et') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1">   الاسم رباعي الخاص بحساب البريد المصرى    </label>
                                        <input type="text" class="form-control"  name="name3" id="exampleInputPassword1"  placeholder="  الحساب بالبريد المصرى   ">
                                        @if ($errors->has('name3'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name3') }}</strong>
                                         </span>
                                        @endif
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="exampleInputPassword1"> الرقم القومي   </label>
                                        <input type="text" class="form-control"  name="number" id="exampleInputPassword1"  placeholder=" الرقم القومي  ">
                                        @if ($errors->has('number'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('number') }}</strong>
                                         </span>
                                        @endif
                                    </div>



                                </div>
                            </div>
                        </div>
                    </li>


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