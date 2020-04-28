@extends('layouts.account_layout')
@section('content')

 <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

            <div class="account-bg">
                <div class="card-box mb-0">
                    <div class="text-center m-t-20">
                        <a href="index.php" class="logo">
                            <img src="http://ahramexpress.com/images/logo.png">
                        </a>
                    </div>
                    <div class="m-t-10 p-20">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h6 class="text-muted text-uppercase m-b-0 m-t-0">تسجيل جديد - حساب تاجر</h6>
                            </div>
                        </div>
                       <form class="m-t-20" action="{{url('/client_register')}}" method="post"   enctype="multipart/form-data">
                    {{csrf_field()}}

                            

                            <div class="form-group row">
                                <div class="col-12">
                                    
                                    <input class="form-control" type="text"  name="phone"required="" placeholder="رقم الموبايل">
                                </div>
                            </div>
                            
                        @if ($errors->has('phone'))
                            <span class="help-block  text-red">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                         </span>
                        @endif

                            <div class="form-group row">
                                <div class="col-12">
                               
                                    <input class="form-control" type="password" name="password" required="" placeholder="كلمة المرور">
                                </div>
                            </div>
                            
                        @if ($errors->has('password'))
                            <span class="help-block  text-red">
                                            <strong>{{ $errors->first('password') }}</strong>
                                         </span>
                        @endif

                            <div class="form-group row">
                                <div class="col-12">
                               
                                    <input class="form-control" type="password" required name="password_confirmation" placeholder="تأكيد كلمة المرور">
                                </div>
                            </div>
                            
                        @if ($errors->has('confirmed'))
                            <span class="help-block  text-red">
                                            <strong>{{ $errors->first('confirmed') }}</strong>
                                         </span>
                        @endif

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox-signup" type="checkbox" checked="checked" required >
                                        <label for="checkbox-signup">أوافق على <a href="#">الشروط والأحكام</a></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">سجل الآن</button>
                                </div>
                            </div>

                            <!--  <div class="form-group row m-t-30 mb-0">
                                <div class="col-12 text-center">
                                    <h5 class="text-muted"><b>Sign Up with</b></h5>
                                </div>
                            </div>

                          <div class="form-group row mb-0 text-center">
                                <div class="col-12">
                                    <button type="button" class="btn btn-facebook font-14 waves-effect waves-light m-t-20">
                                        <i class="fa fa-facebook m-r-5"></i> Facebook
                                    </button>

                                    <button type="button" class="btn btn-twitter font-14 waves-effect waves-light m-t-20">
                                        <i class="fa fa-twitter m-r-5"></i> Twitter
                                    </button>

                                    <button type="button" class="btn btn-googleplus font-14 waves-effect waves-light m-t-20">
                                        <i class="fa fa-google-plus m-r-5"></i> Google+
                                    </button>
                                </div>
                            </div> -->


                        </form>

                    </div>
                </div>
            </div>
            <!-- end card-box-->

            <div class="m-t-20">
                <div class="text-center">
                    <p class="text-white">لديك حساب في أهرامكس؟ <a href="{{url('/client_login')}}" class="text-white m-l-5"><b>تسجيل دخول</b> </a></p>
                </div>
            </div>

        </div>
        <!-- end wrapper page -->




@stop