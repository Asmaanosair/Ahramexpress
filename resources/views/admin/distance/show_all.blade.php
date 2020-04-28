@extends('layouts.admin_lay')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title text-green"> جدول المسافات  </h3>

                    <button type="button" class="btn btn-warning pull-right text-blue" data-toggle="modal" data-target="#modal-warning">
                        <i calss="fa fa-plus"></i>اضافه
                    </button>

                    <div class="modal modal-warning fade" id="modal-warning">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">اضافه </h4>
                                </div>
                                <form role="form" action="{{url('/kt_admin/add_distance')}}" method="post" enctype="multipart/form-data" >
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
                                            <label for="exampleInputPassword1" dir="rtl"> السعر    </label>
                                            <input type="text" class="form-control" name="price" id="exampleInputPassword1"  placeholder="السعر">
                                            @if ($errors->has('price'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
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


                        <th style="width: 18%">السعر </th>



                        <th style="width: 18%">Action</th>

                        <th style="width: 18%">اضافه مدينه </th>
                        <th style="width: 18%"> رؤية المدن </th>
                        <th style="width: 18%">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($distance as $row)


                            <tr>
                                <form method="post" action="{{url('/kt_admin/up_distance/'.$row->id)}}" enctype="multipart/form-data">
                                <td>
                                    {{csrf_field()}}
                                    <input type="text" name="name" required="required" class="form-control" value="<?php echo $row->name; ?>">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                    @endif
                                </td>


                                <td>
                                    <input type="text" name="price" required="required" class="form-control" value="<?php echo $row->price; ?>">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                         </span>
                                    @endif
                                </td>



                                <td>
                                    <button type="submit" class="btn btn-success btn-md">تعديل   </button>
                                </td>
                        </form>


                                <td>
                                    <a  href="#" data-toggle="modal" class=" btn btn-warning" data-target="#modal-success{{$row->id}}"><i class="fa fa-plus text-success"></i>  اضافة مدينة</a>
                                    <!-- /.modal -->
                                    <div class="modal modal-success fade" id="modal-success{{$row->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">{{$row->name}}</h4>
                                                </div>
                                                <form role="form" action="{{url('/kt_admin/add_from_to/'.$row->id)}}" method="post" enctype="multipart/form-data" >
                                                    <div class="modal-body">
                                                        {{csrf_field()}}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1"> من </label>
                                                                <select  class="form-control"  name="from" >

                                                                    @foreach($city as $row2)

                                                                        <option value="{{$row2->id}}">{{$row2->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('from'))
                                                                    <span class="help-block">
                                                                <strong>{{ $errors->first('from') }}</strong>
                                                                      </span>
                                                                @endif

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1" dir="rtl"> الي   </label>
                                                                <select  class="form-control" multiple  name="to" >

                                                                    @foreach($city as $row2)

                                                                        <option value="{{$row2->id}}">{{$row2->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('to'))
                                                                    <span class="help-block">
                                            <strong>{{ $errors->first('to') }}</strong>
                                         </span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </td>
                                <td>
                                    <a href="{{url('/kt_admin/show_from_to/'.$row->id)}}" class="btn btn-primary ">  رؤية المدن التابعه ل  {{$row->name}}</a>
                                </td>
                                <td>
                                    <a href="{{url('/kt_admin/del_distance/'.$row->id)}}" class="btn btn-danger delete_item"> حذف</a>
                                </td>


                            </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection