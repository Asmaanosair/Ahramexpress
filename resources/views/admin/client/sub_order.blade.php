@extends('layouts.admin_lay')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">الشحنات  الخاصه بالتاجر   </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>اسم المستلم ورقم الفون  </th>


                    <th>  العنوان    وعلامه مميزه </th>
                    <th> كود التتبع  </th>
                    <th>  الحساب الكلي  </th>
                       <th> نوع الشحنه  </th>
                    <th> ميعاد الاستلام  </th>
                    <th> حالة الطلب  </th>
                    <th>  المندوب  </th>
                    <th>  تعديل   </th>

                    <th>مشاهدة تفاصيل الطلب </th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $row1)
                    <tr>


                        <td>
                            ({{$row1->name}})<br>
                            ({{$row1->phone}})<br>
                            ({{$row1->phone1}})<br>
                        </td>


                        <td>


                            {{$row1->address}}  <br>
                            ({{$row1->land}})



                        </td>



                        <td>
                            {{$row1->track_number}}

                        </td>
                        <td>
                            {{$row1->total}}



                        </td>
                        
                          <td>
                            {{$row1->type}}



                        </td>

                        <td>{{$row1->t_date}}
                        </td>

                        <form role="form" action="{{url('/kt_admin/up_sub_order_boy/'.$row1->id)}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <td>
                                @php(
                               $status=\App\status::find($row1->status_id)
                               )
                                @if(count($status)==0)
                                    <select name="status" class="form-control" >
                                        @php(
                                       $statuses=\App\status::all()
                                       )
                                        <option value=""> لم يتم الاختيار  </option>
                                        @foreach($statuses as $row)


                                            <option value="{{$row->id}}"> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                @else


                                    <select name="status" class="form-control">
                                        @php(
                                       $statuses=\App\status::all()
                                       )
                                        <option value=" {{$status->id}}" selected>  {{$status->name}}  </option>
                                        @foreach($statuses as $row)
                                            <option value="{{$row->id}}"> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                @endif


                            </td>
                            <td>
                                @php(
                               $boy=\App\delivery_boy::find($row1->delivery_boy_id)
                               )
                                @if(count($boy)==0)
                                    <select name="boy" class="form-control">
                                        @php(
                                       $boys=\App\delivery_boy::all()
                                       )
                                        <option value=" "> لم يتم الاختيار  </option>
                                        @foreach($boys as $row)

                                            <option value="{{$row->id}}"> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                @else


                                    <select name="boy" class="form-control">
                                        @php(
                                       $boys=\App\delivery_boy::all()
                                       )
                                        @foreach($boys as $row)
                                            <option value=" {{$boy->id}}" selected>  {{$boy->name}}  </option>

                                            <option value="{{$row->id}}"> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                @endif


                            </td>
                            <td>
                                <button type="submit" class="btn  bg-blue-gradient  inline"><i class="fa fa-edit" ></i></button>

                            </td>

                        </form>


                        <td><a href="{{url('/kt_admin/e_sub_order_boy/'.$row1->id)}}" class="btn btn-success"> مشاهدة الشحنه </a> </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>اسم المستلم ورقم الفون  </th>


                    <th>  العنوان    وعلامه مميزه </th>
                    <th> كود التتبع  </th>
                    <th>  الحساب الكلى   </th>
                    <th> ميعاد التسليم  </th>
                    <th> حالة الشحنه  </th>
                    <th>  المندوب  </th>
                    <th>  تعديل   </th>


                    <th>مشاهدة تفاصيل الشحنه  </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    </div>


@endsection