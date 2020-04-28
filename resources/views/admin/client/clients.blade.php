@extends('layouts.admin_lay')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <a href="{{url('kt_admin/c_client')}}" class="btn btn-warning pull-right">اضافه عميل  </a>
            <table  id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th>اسم العميل  </th>
                    <th>رقم الفون </th>
                    <th> العنوان </th>
                    <th>صفحه العميل (s)</th>
                    <th>طلب اوردر جديد </th>
                    <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                @foreach($client as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}
                        </td>
                        <td>{{$row->address}}
                        </td>
                        <td><a href="{{url('kt_admin/client/'.$row->id)}}" class="btn btn-primary">الصفحه الشخصيه </a> </td>
                        <td> <button class="btn btn-warning  " data-toggle="modal" data-target="#modal-warning{{$row->id}}"> طلب اوردر جديد </button>







                        </td>
                        <td><a  href="{{url('kt_admin/order_client/'.$row->id)}}"class=" btn btn-success">مشاهدة الطلبات الخاصه بالعميل </a></td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>اسم العميل  </th>
                    <th>رقم الفون </th>

                    <th> العنوان </th>
                    <th>صفحه العميل (s)</th>
                    <th>طلب اوردر جديد </th>
                    <th>CSS grade</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    @foreach($client as $row2)





        <div class="modal modal-warning fade" id="modal-warning{{$row2->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">اضافه  </h4>
                </div>
                <form role="form" action="{{url('/kt_admin/new_order/'.$row2->id)}}" method="post" enctype="multipart/form-data" >
                    <div class="modal-body">
                        {{csrf_field()}}



                        <div class="form-group">
                            <label for="exampleInputPassword1"> عدد  الشحنات  </label>
                            <input type="text" class="form-control"  name="numb" id="exampleInputPassword1"  placeholder="عدد الشحنات ">
                            @if ($errors->has('numb'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('numb') }}</strong>
                                         </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> الوقت المحدد للاستلام  </label>
                            <input type="datetime-local" class="form-control"  name="r_date" id="exampleInputPassword1"  placeholder="الاسم">
                            @if ($errors->has('r_date'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('r_date') }}</strong>
                                         </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> قيمه الشحنات  </label>
                            <input type="text" class="form-control"  name="amount" id="exampleInputPassword1"  placeholder="قيمه الشحنات">
                            @if ($errors->has('amount'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                         </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1"> وسيله النقل   </label>
                            <select class="form-control"  name="vehicl" id="exampleInputPassword1"  >
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

                                <option value="1">
                                    نعم
                                </option>
                                <option value="0">
                                    لا
                                </option>




                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                         </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">حالة الطلب   </label>
                            <select class="form-control"  name="status_id" id="exampleInputPassword1"  >
                                @foreach($status as $s_status)

                                <option value="{{$s_status->id}}">
                                    {{$s_status->name}}
                                </option>
                                    @endforeach



                            </select>
                            @if ($errors->has('status_id'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('status_id') }}</strong>
                                         </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">  ملاحظه   </label>
                            <textarea type="text" class="form-control"  name="note" id="exampleInputPassword1"  placeholder=" ملاحظه"></textarea>
                            @if ($errors->has('note'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('note') }}</strong>
                                         </span>
                            @endif
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-outline">اضافة  </button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        </div>
        <!-- /.modal-dialog -->
            @endforeach
    </div>
@endsection