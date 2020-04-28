@extends('layouts.admin_lay')
@section('content')

<div class="row" >
    <div class="col-md-12">
        <!-- The time line -->
        <form role="form" action="{{url('/kt_admin/c_branch/')}}" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
                {{csrf_field()}}

                <div class="form-group ">
                    <label for="exampleInputPassword1"> الاسم    </label>
                    <input type="text" class="form-control"  name="name" id="exampleInputPassword1"  placeholder="الاسم">
                    @if ($errors->has('name'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="exampleInputPassword1"> رقم الهاتف   </label>
                    <input type="text" class="form-control"  name="ph" id="exampleInputPassword1"  placeholder="الهاتف">
                    @if ($errors->has('ph'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('ph') }}</strong>
                                         </span>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="exampleInputPassword1">  الايميل    </label>
                    <input type="email" class="form-control"  name="email" id="exampleInputPassword1"  placeholder="الايميل ">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">المحافظة</label>
                    <select class="form-control" id="country" name="country_id">
                        <option value="" selected disabled>Select</option>
                        @foreach($country as  $coun)
                            <option value="{{$coun->id}}">{{$coun->name}}</option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">المدينة</label>
                    <select class="form-control" name="state" id="state">


                    </select>
                </div>


                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">المنطقة</label>

                    <select class="form-control" name="city" id="city">

                    </select>
                </div>

                <div class="form-group ">
                    <label for="exampleInputPassword1">    العنوان  </label>
                    <textarea type="text" class="form-control"  name="address" id="exampleInputPassword1"  placeholder="العنوان "></textarea>
                    @if ($errors->has('address'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                         </span>
                    @endif
                </div>

            </div>
            <button type="submit" class="btn btn-success">تعديل   </button>

        </form>
    </div>
    <!-- /.col -->
</div>
    @stop

