
@extends('layouts.admin_lay')
@section('content')

    <div class="row">

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>خدمات التوصيل  </h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="fa fa-list-alt"></i>
                </div>
                <a href="{{url('/kt_admin/service')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>انواع التوصيل </h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="fa fa-car"></i>
                </div>
                <a href="{{url('/kt_admin/delivery')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>الخيارات الاضافيه </h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="fa fa-openid"></i>
                </div>
                <a href="{{url('/kt_admin/option')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->
    </div>
    <br>


    <div class="row">

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>المدن</h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="fa fa-circle-thin"></i>
                </div>
                <a href="{{url('/kt_admin/city')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>المناطق</h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('/kt_admin/district')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>المحافظات</h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('/kt_admin/country')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
    </div>

    <br>
    <div class="row">

        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>الاوزان</h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="fa fa-wechat"></i>
                </div>
                <a href="{{url('/kt_admin/weight')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>المركبات</h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="{{url('/kt_admin/vehicle')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>المسافات </h3>

                    <p>.....</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="{{url('/kt_admin/distance')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

@stop