@extends('layouts.start_layout')


@section('content')
    <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right m-t-15">
                                <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                        data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i
                                        class="fa fa-cog"></i></span></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
    
                            </div>
                            <h4 class="page-title">Invoice</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <h3 class="logo invoice-logo">Uplon</h3>
                                    </div>
                                    <div class="float-right">
                                        <h5>Invoice # <br>
                                            <small>{{date(' D:M:Y')}}</small>
                                        </h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">

                                        <div class="float-left m-t-30">
                                            <address>
                                                <strong>Twitter, Inc.</strong><br>
                                                795 Folsom Ave, Suite 600<br>
                                                San Francisco, CA 94107<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-7890
                                            </address>
                                        </div>
                                        <div class="float-right m-t-30">
                                            <p><strong>Order Date: </strong> {{$order->created_at}}</p>
                                            <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-danger">Pending</span></p>
                                            <p class="m-t-10"><strong>Order ID: </strong> #{{$order->id}}</p>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="m-h-50"></div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead class="bg-faded">
                                                <tr><th>كود التتبع </th>
                                                    <th>نوع الشحنه </th>
                                                    <th>االاسم ورقم الفون  </th>
                                                    <th>سعر الشحن </th>
                                                    <th>سعر الفاتوره  </th>
                                                    <th>
القيمة الاجمالية للفاتورة </th>
                                                </tr></thead>
                                                <tbody>
                                                       @foreach($data as $row)
                                                <tr>
                                                    <td>{{$row->track_number}}</td>
                                                    <td>{{$row->type}}</td>
                                                    <td>{{$row->name}} <br> {{$row->phone}}/{{$row->phone1}}</td>
                                                    <td>{{$row->shipping_fees}}$</td>
                                                    <td>{{$row->invoice}}$</td>
                                                    <td>{{$row->total}}$</td>
                                                </tr>
                                                @endforeach
                                                <!--<tr>-->
                                                <!--    <td>2</td>-->
                                                <!--    <td>Mobile</td>-->
                                                <!--    <td>Lorem ipsum dolor sit amet.</td>-->
                                                <!--    <td>5</td>-->
                                                <!--    <td>$50</td>-->
                                                <!--    <td>$250</td>-->
                                                <!--</tr>-->
                                                <!--<tr>-->
                                                <!--    <td>3</td>-->
                                                <!--    <td>LED</td>-->
                                                <!--    <td>Lorem ipsum dolor sit amet.</td>-->
                                                <!--    <td>2</td>-->
                                                <!--    <td>$500</td>-->
                                                <!--    <td>$1000</td>-->
                                                <!--</tr>-->
                                                <!--<tr>-->
                                                <!--    <td>4</td>-->
                                                <!--    <td>LCD</td>-->
                                                <!--    <td>Lorem ipsum dolor sit amet.</td>-->
                                                <!--    <td>3</td>-->
                                                <!--    <td>$300</td>-->
                                                <!--    <td>$900</td>-->
                                                <!--</tr>-->
                                                <!--<tr>-->
                                                <!--    <td>5</td>-->
                                                <!--    <td>Mobile</td>-->
                                                <!--    <td>Lorem ipsum dolor sit amet.</td>-->
                                                <!--    <td>5</td>-->
                                                <!--    <td>$80</td>-->
                                                <!--    <td>$400</td>-->
                                                <!--</tr>-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="clearfix m-t-30">
                                            <h5 class="small text-inverse font-600"><b>PAYMENT TERMS AND POLICIES</b></h5>

                                            <small>
                                                All accounts are to be paid within 7 days from receipt of
                                                invoice. To be paid by cheque or credit card or direct payment
                                                online. If account is not paid within 7 days the credits details
                                                supplied as confirmation of work undertaken will be charged the
                                                agreed quoted fee noted above.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6 ">
                                        <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                                        <p class="text-right">Discout: 12.9%</p>
                                        <p class="text-right">VAT: 12.9%</p>
                                        <hr>
                                        <h3 class="text-right">USD 2930.00</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end row -->





@stop