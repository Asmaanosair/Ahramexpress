@extends('layouts.admin_lay')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    <h3 class="box-title text-green"> جدول المدن التابعه لمحافظة {{$name->name}}   </h3>

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
                                <form role="form" action="{{url('/kt_admin/add_city')}}" method="post" enctype="multipart/form-data" >
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
                                            <label for="exampleInputPassword1"> المحافظات  </label>
                                            <select  class="form-control"  name="country" >
                                                <option value="{{$name->id}}">{{$name->name}}</option>

                                                @foreach($counrty as $row)

                                               <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                            </select>
                                            @if ($errors->has('country'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
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
                        <form method="post" action="{{url('/kt_admin/up_city/'.$row->id)}}" enctype="multipart/form-data">
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
                                    <select  class="form-control"  name="country" >
                                        @php(
                                        $country1=\App\country::find($row->country_id)
                                        )
                                        @if(isset($country1))
                                            <option value="{{$row->country_id}}">{{$country1->name}}</option>
                                            @else

                                        @endif
                                        @foreach($counrty as $row2)

                                            <option value="{{$row2->id}}">{{$row2->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                         </span>
                                    @endif
                                </td>
                                @if($row->active==1)

                                <td>
                                    <a href="{{url('/kt_admin/notactive_city/'.$row->id)}}" class="btn btn-success delete_item"> مفعل </a>
                                </td>
@else
                                <td>
                                    <a href="{{url('/kt_admin/active_city/'.$row->id)}}" class="btn btn-danger delete_item">  غير مفعل </a>
                                </td>
                                @endif




                                <td>
                                    <button type="submit" class="btn btn-success btn-md">تعديل   </button>
                                </td>
                                <td>
                                    <a href="{{url('/kt_admin/del_city/'.$row->id)}}" class="btn btn-danger delete_item"> حذف</a>
                                </td>


                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <a href="{{url('/kt_admin/city')}}" class="btn btn-primary "> السابق</a>
        </div>

    </div>
    {{$city->links()}}
@endsection