

@extends('layouts.admin_lay')
@section('content')




<form role="form" action="{{url('/kt_admin/up_sub_order/'.$order->id)}}" method="post" enctype="multipart/form-data" >
    {{csrf_field()}}
    <ul class="timeline">
        <!-- timeline time label -->
        <li class="time-label">
                  <span class="bg-red">
                  {{date(' d_M_Y')}}
                  </span>
        </li>





            <li>
                <i class="fa fa-shopping-cart bg-blue"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{date(' D:M:Y')}}</span>

                    <h3 class="timeline-header"><a href="#">مكان تسليم الشحنه    </a> </h3>

                    <div class="timeline-body">
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1"> اسم  المستلم   </label>
                                <input type="text" class="form-control"  name="name"  value="{{$order->name}}" id="exampleInputPassword1"  placeholder="الاسم">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                @endif
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1"> رقم الهاتف   </label>
                                <input type="text" class="form-control"  name="ph"  value="{{$order->phone}}" id="exampleInputPassword1"  placeholder="الهاتف">
                                @if ($errors->has('ph'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ph') }}</strong>
                                         </span>
                                @endif
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1"> رقم الهاتف اخر  </label>
                                <input type="text" class="form-control"  name="ph1" value="{{$order->phone1}}" id="exampleInputPassword1"  placeholder="الهاتف">
                                @if ($errors->has('ph1'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('ph1') }}</strong>
                                         </span>
                                @endif
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">   البريد الالكترونى  </label>
                                <input type="text" class="form-control"  name="email" value="{{$order->email}}" id="exampleInputPassword1"  placeholder="الهاتف">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                @endif
                            </div>


                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">    ميعاد التسليم  </label>
                                <input type="datetime-local" class="form-control"  name="t_date" value="{{$order->t_date}}" id="exampleInputPassword1"  placeholder="ميعاد التسليم">
                                @if ($errors->has('t_date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('t_date') }}</strong>
                                         </span>
                                @endif
                            </div>


                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">  المحافظه     </label>
                                <select type="email" class="form-control"  name="country" id="exampleInputPassword1" >
                                    @php(
                                    $country1=\App\country::find($order->country_id)
                                    )
                                    @if(count($country1)==0)
                                        @else
                                        <option  value="{{$country1->id}}">
                                            {{$country1->name}}
                                        </option>
                                        @endif

                                    @foreach($country as $row)
                                        <option  value="{{$row->id}}">
                                            {{$row->name}}
                                        </option>
                                    @endforeach


                                </select>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                         </span>
                                @endif
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">  المدينة     </label>
                                <select type="email" class="form-control"  name="city" id="exampleInputPassword1" >
                                    
                                     @php(
                                    $city1=\App\city::find($order->city_id)
                                    )
                                    @if(count($city1)==0)
                                        @else
                                        <option  value="{{$city1->id}}">
                                            {{$city1->name}}
                                        </option>
                                        @endif

                                    @foreach($city as $row)
                                        <option  value="{{$row->id}}">
                                            {{$row->name}}
                                        </option>
                                    @endforeach


                                </select>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                         </span>
                                @endif
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">  المنطقه     </label>
                                <select type="email" class="form-control"  name="district" id="exampleInputPassword1" >
                                     @php(
                                    $district1=\App\district::find($order->district_id)
                                    )
                                    @if(count($district1)==0)
                                        @else
                                        <option  value="{{$district1->id}}">
                                            {{$district1->name}}
                                        </option>
                                        @endif

                                    @foreach($dist as $row)
                                        <option  value="{{$row->id}}">
                                            {{$row->name}}
                                        </option>
                                    @endforeach


                                </select>
                                @if ($errors->has('district'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('district') }}</strong>
                                         </span>
                                @endif
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">    العنوان  </label>
                                <textarea type="text" class="form-control"  name="address" id="exampleInputPassword1"  placeholder="العنوان ">{{$order->address}}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                         </span>
                                @endif
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">     علامه مميزه للعنوان  </label>
                                <textarea type="text" class="form-control"  name="land" id="exampleInputPassword1"   placeholder="العنوان ">{{$order->land}}</textarea>
                                @if ($errors->has('land'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('land') }}</strong>
                                         </span>
                                @endif
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">  الخدمه     </label>
                                <select  class="form-control"  name="service" id="exampleInputPassword1" >
  @php(
                                    $service1=\App\service::find($order->service_id)
                                    )
                                    @if(count($service1)==0)
                                        @else
                                        <option  value="{{$service1->id}}">
                                            {{$service1->name}}
                                        </option>
                                        @endif
                                    @foreach($service as $row)
                                        <option  value="{{$row->id}}">
                                            {{$row->name}}
                                        </option>
                                    @endforeach


                                </select>
                                @if ($errors->has('service'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('service') }}</strong>
                                         </span>
                                @endif
                            </div>


                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">  الحاله      </label>
                                <select  class="form-control"  name="status" id="exampleInputPassword1" >
                                    
                                      @php(
                                    $statu1=\App\status::find($order->status_id)
                                    )
                                    @if(count($statu1)==0)
                                        @else
                                        <option  value="{{$statu1->id}}">
                                            {{$statu1->name}}
                                        </option>
                                        @endif

                                    @foreach($status as $row)
                                        <option  value="{{$row->id}}">
                                            {{$row->name}}
                                        </option>
                                    @endforeach


                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                         </span>
                                @endif
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1"> سعر الفاتوره     </label>
                                <input type="text" class="form-control"  name="invoice" id="exampleInputPassword1"value="{{$order->invoice}}"  placeholder="سعر الفاتوره">
                                @if ($errors->has('invoice'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('invoice') }}</strong>
                                         </span>
                                @endif
                            </div>
                            
                              <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1"> نوع الشحنه      </label>
                                <input type="text" class="form-control"  name="type" id="exampleInputPassword1"value="{{$order->type}}">
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                         </span>
                                @endif
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1"> سعر الشحن     </label>
                                <input type="text" class="form-control"  name="shipping_fees" id="exampleInputPassword1"  value="{{$order->shipping_fees}}" placeholder="سعر الشحن">
                                @if ($errors->has('shipping_fees'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('shipping_fees') }}</strong>
                                         </span>
                                @endif
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1"> الحساب الكلي      </label>
                                <input type="text" class="form-control"  name="total" id="exampleInputPassword1"  value="{{$order->total}}" placeholder="الحساب الكلي">
                                @if ($errors->has('total'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('total') }}</strong>
                                         </span>
                                @endif
                            </div>



                            <div class="form-group col-lg-3">
                                <label for="exampleInputPassword1">    ملاحظات      </label>
                                <textarea type="text" class="form-control"  name="des" id="exampleInputPassword1"  value="{{$order->order_note}}" placeholder="ملاحظة    "></textarea>
                                @if ($errors->has('des'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('des') }}</strong>
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

@endsection