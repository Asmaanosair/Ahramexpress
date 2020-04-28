@extends('layouts.admin_lay')
@section('content')



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">الجدول الخاص بالفروع </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            {{--            <button onclick="myFunction()">Print this page</button>--}}


            <a href="{{url('kt_admin/c_branch')}}" class="btn btn-warning pull-right">اضافه فرع  </a>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>الفرع    </th>
                    <th>رقم التليفون والايميل الخاص بالفرع   </th>
                    <th> العنوان </th>
                    <th>  تعديل </th>

                    <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                @foreach($branch as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->phone}}
                            {{$row->email}}
                        </td>
                        <td>{{$row->address}}

                            <br> @php(
                            $country=\App\country::find($row->country_id)->name
                            )
                            @if(count($country)==0)
                            @else
                                {{$country}}
                            @endif
                            <br> @php(
                            $city=\App\city::find($row->city_id)->name
                            )
                            @if(count($city)==0)
                            @else
                                {{$city}}
                            @endif
                            <br> @php(
                            $dist=\App\district::find($row->district_id)->name
                            )
                            @if(count($dist)==0)
                            @else
                                {{$dist}}
                            @endif
                        </td>

                        <td><a  href="{{url('kt_admin/e_branch/'.$row->id)}}"class=" btn btn-success">  تعديل  </a></td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>الفرع    </th>
                    <th>رقم التليفون والايميل الخاص بالفرع   </th>
                    <th> العنوان </th>
                    <th>  تعديل </th>

                    <th>CSS grade</th>
                </tfoot>
            </table>
        </div>


        <!-- /.box-body -->
    </div>

    </div>



@endsection