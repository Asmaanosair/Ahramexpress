@extends('layouts.admin_lay')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title text-green"> جدول المناطق التابعه لمدينة {{$name->name}}  </h3>

                    <button type="button" class="btn btn-warning pull-right text-blue" data-toggle="modal" data-target="#modal-warning">
                        <i calss="fa fa-plus"></i>اضافه
                    </button>

                    <div class="modal modal-warning fade" id="modal-warning">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">اضافه  </h4>
                                </div>
                                <form role="form" action="{{url('/kt_admin/add_district')}}" method="post" enctype="multipart/form-data" >
                                    <div class="modal-body">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> الاسم </label>
                                            <input type="text" class="form-control"  name="name" id="exampleInputPassword1"  placeholder="الاسم">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> المدن  </label>
                                            <select  class="form-control"  name="city" >
                                                <option value="{{$name->id}}">{{$name->name}}</option>
                                                @foreach($city as $row)

                                               <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                            </select>
                                            @if ($errors->has('city'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
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
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <div class="box-tools">

                    </div>
                </div>

            </div>
            <div class="containers">
                <table class="table table-striped projects text-center">
                    <thead>
                    <tr>

                        <th style="width: 20%">  الاسم  </th>

                        <th style="width: 18%">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($city as $row)
                        <form method="post" action="{{url('/kt_admin/up_district/'.$row->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <tr>

                                <td>
                                    <input type="text" name="name" required="required" class="form-control" value="<?php echo $row->name; ?>">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                    @endif
                                </td>
                                <td>
                                    <select  class="form-control"  name="city" >
                                        @php(
                                        $city1=\App\city::find($row->city_id)->name
                                        )
                                        @if(isset($city1))
                                            <option value="{{$row->city_id}}">{{$city1}}</option>
                                            @else

                                        @endif
                                        @foreach($city as $row2)

                                            <option value="{{$row2->id}}">{{$row2->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                         </span>
                                    @endif
                                </td>




                                <td>
                                    <button type="submit" class="btn btn-success btn-md">تعديل   </button>
                                </td>
                                <td>
                                    <a href="{{url('/kt_admin/del_district/'.$row->id)}}" class="btn btn-danger delete_item"> حذف</a>
                                </td>


                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <a href="{{url('/kt_admin/district')}}" class="btn btn-primary "> السابق</a>
        </div>
    </div>
    {{$city->links()}}
@endsection