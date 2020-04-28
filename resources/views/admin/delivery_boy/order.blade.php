@extends('layouts.admin_lay')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">الطلبات  الخاصه {{$boy->name}} </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>



                    <th>  وقت  تلقي الطلب من التاجر  </th>
                    <th> كود التتبع  </th>

                    <th> ميعاد الاستلام  </th>
                    <th> حالة الطلب  </th>
                    <th>  المندوب  </th>
                    <th>  تعديل   </th>

                    <th>مشاهدة تفاصيل الطلب </th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $row1)


                    <td>
                        {{ date("d-M-Y ", strtotime($row1->created_at))}}

                    </td>


                    <td>
                        {{$row1->track_num}}

                    </td>


                    <td>
                        {{ date("d-M-Y ", strtotime($row1->r_date))}}

                    </td>

                    <form role="form" action="{{url('/kt_admin/up_order_boy/'.$row1->id)}}" method="post" enctype="multipart/form-data" >
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
                                   $statuses2=\App\status::all()
                                   )
                                    <option value=" {{$status->id}}" selected>  {{$status->name}}  </option>
                                    @foreach($statuses2 as $row)
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
                                    <option value=""> لم يتم الاختيار  </option>
                                    @foreach($boys as $row)

                                        <option value="{{$row->id}}"> {{$row->name}}</option>
                                    @endforeach
                                </select>
                            @else


                                <select name="boy" class="form-control">
                                    @php(
                                   $boys2=\App\delivery_boy::all()
                                   )
                                    <option value=" {{$boy->id}}" selected>  {{$boy->name}}  </option>
                                    @foreach($boys2 as $row)
                                       

                                        <option value="{{$row->id}}"> {{$row->name}}</option>
                                    @endforeach
                                </select>
                            @endif


                        </td>
                        <td>
                            <button type="submit" class="btn  bg-blue-gradient  inline"><i class="fa fa-edit" ></i></button>

                        </td>

                    </form>


                    <td><a href="{{url('/kt_admin/e_order/'.$row1->id)}}" class="btn btn-success"> مشاهدة الطلب </a> </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>



                    <th>  العنوان    وعلامه مميزه </th>
                    <th> كود التتبع  </th>

                    <th> ميعاد الاستلام  </th>
                    <th> حالة الطلب  </th>
                    <th>  المندوب  </th>

                    <th>مشاهدة تفاصيل الطلب  </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    </div>


@endsection