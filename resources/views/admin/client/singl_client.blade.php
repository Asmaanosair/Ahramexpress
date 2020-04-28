@extends('layouts.admin_lay')
@section('content')
    <div class="row">

        <a href="{{url('kt_admin/client')}}" class="btn btn-warning pull-right">العملاء  </a>
        <div class="col-md-12">
            <!-- The time line -->

                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-red">
                {{ date("d-m-Y", strtotime($client->created_at))}}
                  </span>
                    </li>
                    <li>
                        <i class="fa fa-car bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                            <h3 class="timeline-header"><a href="#"> الطلبات الخاصه ب   </a> العميل </h3>

                            <div class="timeline-body">
                                <div class="row">
                                    @foreach($status as $row)
                                    <div class=" col-lg-3">
                                        <a class="btn btn-warning" style="width: 100%">{{$row->name}}</a>
<br>
                                        <br>

                                    </div>

                                    @endforeach










                                </div>
                            </div>

                        </div>
                    </li>



                    {{csrf_field()}}
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                            <h3 class="timeline-header"><a href="#">معلومات عن  </a> العميل </h3>

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
                                        <span class="text-red text-bold ">اسم الشركه     </span> : {{$client->company}}

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
                        <i class="fa fa-comments bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                            <h3 class="timeline-header"><a href="#">الحساب البنكى  </a> للعميل</h3>

                            <div class="timeline-body">
                                @if(count($bank)==0)
                                    <form role="form" action="{{url('/kt_admin/add_bank/'.$client->id)}}" method="post" enctype="multipart/form-data" >
                                        {{csrf_field()}}

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
                                        <div class="form-group col-lg-3">
                                            <button type="submit" class="btn btn-warning " style="    margin-left: 37%;">حفظ التغيرات   </button>
                                        </div>

                                    </div>

                                    </form>
                                @else
                                <div class="row">
                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold ">البنك    </span> : {{$bank->bank}}

                                    </div>
                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold ">رقم الحساب    </span> : {{$bank->account}}

                                    </div>

                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold ">اسم صاحب  الحساب    </span> : {{$bank->username}}

                                    </div>

                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold ">عنوان البنك او الفرع     </span> : {{$bank->address}}

                                    </div>

                                </div>
                                @endif
                            </div>

                        </div>
                    </li>


                    <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                            <h3 class="timeline-header no-border"><a href="#">حساب اخر </a> للعميل </h3>

                            <div class="timeline-body">
                                @if(count($account)==0)

                                    <form role="form" action="{{url('/kt_admin/add_account/'.$client->id)}}" method="post" enctype="multipart/form-data" >
                                        {{csrf_field()}}
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

                                        <div class="form-group col-lg-3">
                                            <button type="submit" class="btn btn-warning  " style="    margin-left: 37%;">حفظ التغيرات   </button>
                                        </div>

                                    </div>


                                    </form>

                                @else
                                <div class="row">
                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold ">فوافون كاش   </span> : {{$account->vf}}

                                    </div>
                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold "> اتصالات   </span> : {{$account->et}}

                                    </div>

                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold "> اورانج   </span> : {{$account->orang}}

                                    </div>

                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold "> الاسم رباعي الخاص بحساب البريد المصرى  </span> : {{$account->name}}

                                    </div>

                                    <div class=" col-lg-6">
                                        <span class="text-red text-bold "> الرقم القومي  </span> : {{$account->number}}

                                    </div>
                                </div>

                                    @endif






                            </div>
                        </div>
                    </li>


                    <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> </span>

                            <h3 class="timeline-header"><a href="#">  البطاقه الشخصيه </a>للعميل</h3>

                            <div class="timeline-body">
                                <div class="row">
                                    @if($client->attach==null)
                                    @else
                                        @php(
                                        $image=explode(',',$client->attach)
                                        )
                                        @foreach($image as $key=>$row)
                                            <div class="col-lg-3">

                                                <img src="{{asset('img/'.$row)}}" alt="..."  width="150px" height="100px" class="margin">


                                                <a class="btn btn-danger" href="{{url('kt_admin/del_attach/'.$client->id.'/'.$key)}}">delete</a>
                                            </div>
                                        @endforeach
                                    @endif

                                        <div class="col-lg-3">
                                            <form role="form" action="{{url('/kt_admin/add_attach/'.$client->id)}}" method="post" enctype="multipart/form-data" >
                                                {{csrf_field()}}

                                            <div class="form-group ">
                                                <label for="exampleInputPassword1" > اضافة  صوره     </label>
                                                <input type="file" rows="6" class="form-control"   name="image[]" id="exampleInputPassword1" placeholder="Link" MULTIPLE>
                                                <button type="submit" class="btn btn-warning  form-control ">اضافة  صوره  </button>

                                            </div>

                                            </form>


                                        </div>



                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> </span>

                            <h3 class="timeline-header"><a href="#">    مستندات اخري خاصه</a>بالعميل </h3>

                            <div class="timeline-body">

                                <div class="row">
                                    @if($client->other==null)
                                        @else
                                        @php(
                                        $image2=explode(',',$client->other)
                                        )
                                    @foreach($image2 as $key2=>$row2)
                                    <div class="col-lg-3">

                                        <img src="{{asset('img/'.$row2)}}" alt="..."  width="150px" height="100px" class="margin">


                                        <a class="btn btn-danger" href="{{url('kt_admin/del_other/'.$client->id.'/'.$key2)}}">delete</a>
                                    </div>
                                        @endforeach
                                        @endif


                                        <div class="col-lg-3">
                                            <form role="form" action="{{url('/kt_admin/add_other/'.$client->id)}}" method="post" enctype="multipart/form-data" >
                                                {{csrf_field()}}

                                                <div class="form-group ">
                                                    <label for="exampleInputPassword1" > اضافة  صوره     </label>
                                                    <input type="file" rows="6" class="form-control"   name="image[]" id="exampleInputPassword1" placeholder="Link" MULTIPLE>
                                                    <button type="submit" class="btn btn-warning  form-control ">اضافة  صوره  </button>

                                                </div>

                                            </form>


                                        </div>


                                </div>


                            </div>
                        </div>
                    </li>

                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
            <a   class="btn btn-warning  col-lg-3 " style="    margin-left: 37%;"href="{{url('kt_admin/e_client/'.$client->id)}}"> تعديل </a>


        </div>
        <!-- /.col -->
    </div>
@endsection