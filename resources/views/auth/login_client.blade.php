@extends('layouts.account_layout')
@section('content')

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

    <div class="account-bg">
        <div class="card-box mb-0">
            <div class="text-center m-t-20">
                <a href="index.php" class="logo">
                    <img src="{{asset('img/logo.png')}}">
                </a>
            </div>
            <div class="m-t-10 p-20">
                <div class="row">
                    <div class="col-12 text-center">
                        <h6 class="text-muted text-uppercase m-b-0 m-t-0">تسجيل دخول</h6>
                    </div>
                </div>
                <form class="m-t-20" action="{{url('/client_login')}}" method="post"   enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    @if(session('success'))
            <div class="alert alert-danger">
                <strong>{{session('success')}}</strong>
            </div>
            @else
            @endif
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="phone" required=""   name="phone" placeholder="رقم الموبايل">
                        </div>
                    </div>
                    @if ($errors->has('phone'))
                        <span class="help-block text-red">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                         </span>
                    @endif


                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required=""  name="password" placeholder="كلمة المرور">
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block  text-red">
                                            <strong>{{ $errors->first('password') }}</strong>
                                         </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="checkbox checkbox-custom">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    تذكرني وابقى مسجلاً
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-10">
                        <div class="col-12">
                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit">دخول النظام</button>
                        </div>
                    </div>

                    <div class="form-group row m-t-30 mb-0">
                        <div class="col-12">
                            <a href="pages-recoverpw.php" class="text-muted"><i class="fa fa-lock m-r-5"></i> نسيت كلمة المرور؟</a>
                        </div>
                    </div>

                    <!--  <div class="form-group row m-t-30 mb-0">
                          <div class="col-12 text-center">
                              <h5 class="text-muted"><b>Sign in with</b></h5>
                          </div>
                      </div>

                      <div class="form-group row mb-0 text-center">
                          <div class="col-12">
                              <button type="button" class="btn btn-facebook waves-effect font-14 waves-light m-t-20">
                                  <i class="fa fa-facebook m-r-5"></i> Facebook
                              </button>

                              <button type="button" class="btn btn-twitter waves-effect font-14 waves-light m-t-20">
                                  <i class="fa fa-twitter m-r-5"></i> Twitter
                              </button>

                              <button type="button" class="btn btn-googleplus waves-effect font-14 waves-light m-t-20">
                                  <i class="fa fa-google-plus m-r-5"></i> Google+
                              </button>
                          </div>
                      </div> -->

                </form>

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end card-box-->

    <div class="m-t-20">
        <div class="text-center">
            <p class="text-white">لا تمتلك حساب؟ <a href="{{url('/client_register')}}" class="text-white m-l-5"><b>تسجيل جديد</b></a></p>
        </div>
    </div>

</div>
<!-- end wrapper page -->



@stop