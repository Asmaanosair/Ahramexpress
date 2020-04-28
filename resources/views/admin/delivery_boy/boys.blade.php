@extends('layouts.admin_lay')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <a href="{{url('kt_admin/c_boy')}}" class="btn btn-warning pull-right">اضافه مندوب  </a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id Code  </th>

                    <th>اسم المندوب و رقم الفون  </th>



                    <th> الايميل  </th>
                    <th>الطلبات الخاصه بالمندوب </th>
                    <th> الشحنات  الخاصه بالمندوب </th>
                    <th>    الصفحه الشخصيه  </th>
                    <th> Active </th>
                    <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                @foreach($boy as $row)
                    <tr>

                        <td>{{$row->number}}
                            <br>
                        <td>{{$row->name}}
                            <br>

                            {{$row->phone}}

                        </td>
                        <td>     {{$row->email}}</td>
                        <td><a href="{{url('kt_admin/boy_order'.$row->id)}}" class="btn btn-warning"> الطلبات  </a> </td>
                        </td>

                        <td><a href="{{url('kt_admin/boy_sub_order'.$row->id)}}" class="btn btn-warning"> الشحنات  </a> </td>
                        </td>

                        <td><a href="{{url('kt_admin/boy/'.$row->id)}}" class="btn btn-primary">الصفحه الشخصيه </a> </td>

                        <td>



                            @if($row->status==1) <a href="{{url('kt_admin/disable_boy/'.$row->id)}}" class="btn btn-success">Active</a>
@else
                            <a href="{{url('kt_admin/enable_boy/'.$row->id)}}" class="btn btn-danger">Not Active</a></td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>اسم المندوب و رقم الفون  </th>


                    <th> الايميل  </th>
                    <th>الطلبات الخاصه بالمندوب </th>
                    <th> الشحنات  الخاصه بالمندوب </th>
                    <th>
                       Active
                    </th>
                    <th>CSS grade</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

        </div>
@endsection