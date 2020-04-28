@extends('layouts.admin_lay')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <form role="form" action="{{url('/kt_admin/up_order/'.$order->id)}}" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    {{csrf_field()}}



                    <div class="form-group">
                        <label for="exampleInputPassword1"> الوقت المحدد للاستلام  </label>
                        <input type="datetime-local" class="form-control"  name="r_date" id="exampleInputPassword1"  value="{{$order->r_date}}" placeholder="الاسم">
                        @if ($errors->has('r_date'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('r_date') }}</strong>
                                         </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> قيمه الشحنات  </label>
                        <input type="text" class="form-control"  name="amount" id="exampleInputPassword1" value="{{$order->amount}}"  placeholder="قيمه الشحنات">
                        @if ($errors->has('amount'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                         </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"> وسيله النقل   </label>
                        <select class="form-control"  name="vehicl" id="exampleInputPassword1"  >
                            @php(
                            $veh=\App\vehicle::find($order->vehicles_id)
                            )
                            @if(count($veh)==0)
                                <option value="" selected>
                                    لم يتم الاختيار
                                </option>
                                @else

                                <option value="{{$veh->id}}" selected>
                                    {{$veh->name}}
                                </option>
                                @endif
                            @foreach($vehicl as $row1)

                                <option value="{{$row1->id}}">
                                    {{$row1->name}}
                                </option>
                            @endforeach





                        </select>
                        @if ($errors->has('vehicl'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('vehicl') }}</strong>
                                         </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"> قابل للكسر او لا  </label>
                        <select class="form-control"  name="status" id="exampleInputPassword1"  >
                            @if($order->status==1)

                            <option value="1" selected>
                                نعم
                            </option>
                            <option value="0">
                                لا
                            </option>
@else
                                <option value="1" >
                                    نعم
                                </option>
                                <option value="0" selected>
                                    لا
                                </option>

                            @endif



                        </select>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                         </span>
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">  ملاحظه   </label>
                        <textarea type="text" class="form-control"  name="note" id="exampleInputPassword1"   placeholder=" ملاحظه">{{$order->note}}</textarea>
                        @if ($errors->has('note'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('note') }}</strong>
                                         </span>
                        @endif
                    </div>


                </div>


                    <button type="submit" class="btn btn-success">تعديل   </button>

            </form>
        </div>
        <!-- /.col -->
    </div>
@endsection