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
                    <th>اسم التاجر ورقم الفون  </th>


                    <th>  العنوان     </th>
                    <th> كود التتبع  </th>

                    <th> ميعاد الاستلام  </th>
                    <th> حالة الطلب  </th>
                    <th>  المندوب  </th>
                    <th>  تعديل   </th>

                    <th>مشاهدة تفاصيل الطلب </th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $row)
                    <tr>
                        @php(
                           $client=\App\client::find($row->client_id)
                           )
                        @if(count($client)==0)
                        @else

                            <td>
                                ({{$client->name}})<br>
                                ({{$client->phone}})<br>

                            </td>


                            <td>


                                {{$client->address}}  <br>
                                ({{$client->land}})



                            </td>

                        @endif

                        <td>
                            {{$row->track_num}}

                        </td>
                        <td>
                            <a   href="" class="btn btn-warning text-blue">   {{$row->number}} عدد الشحنات </a>



                        </td>

                        <td>{{$row->r_date}}
                        </td>

                        <form role="form" action="{{url('/kt_admin/up_order/')}}" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <td>
                                @php(
                               $status=\App\status::find($row->status_id)
                               )
                                @if(count($status)==0)
                                    <select name="status" class="form-control">
                                        @php(
                                       $statuses=\App\status::all()
                                       )
                                        @foreach($statuses as $row)
                                            <option value=""> لم يتم الاختيار  </option>

                                            <option value="{{$row->id}}"> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                @else


                                    <select name="status" class="form-control">
                                        @php(
                                       $statuses=\App\status::all()
                                       )
                                        @foreach($statuses as $row)
                                            <option value=" {{$status->id}}" selected>  {{$status->name}}  </option>

                                            <option value="{{$row->id}}"> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                @endif


                            </td>
                            <td>
                                @php(
                               $boy=\App\delivery_boy::find($row->delivery_boy_id)
                               )
                                @if(count($boy)==0)
                                    <select name="status" class="form-control">
                                        @php(
                                       $boys=\App\delivery_boy::all()
                                       )
                                        @foreach($boys as $row)
                                            <option value=""> لم يتم الاختيار  </option>

                                            <option value="{{$row->id}}"> {{$row->name}}</option>
                                        @endforeach
                                    </select>
                                @else


                                    <select name="status" class="form-control">
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


                        <td><a href="" class="btn btn-success"> مشاهدة الطلب </a> </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>اسم التاجر ورقم الفون  </th>


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