@extends('layouts.admin_lay')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$track->track_num}}السجل الخاص بالشحنه   </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th> اسم المندوب والكود الخاص بيه   </th>



                 
                    <th>الحالات  </th>
                    <th>المواعيد  </th>
                </tr>
                </thead>
                <tbody>
                @foreach($order as $row1)
                    <tr>
                        @php(
                           $boy=\App\delivery_boy::find($row1->delivery_boy_id)
                           )
                        @if(count($boy)==0)
                        @else

                            <td>
                                ({{$boy->name}})<br>
                                ({{$boy->number}})<br>

                            </td>




                        @endif

                        @php(
                         $stat=\App\status::find($row1->status_id)
                         )
                        @if(count($stat)==0)
                        @else

                            <td>
                                ({{$stat->name}})<br>


                            </td>




                        @endif
                        <td>
                        {{$row1->history}}


                        </td>









                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th> اسم المندوب والكود الخاص بيه   </th>



                    <th>  السجل   </th>
                    <th>الحالات  </th>
              



                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    </div>


@endsection