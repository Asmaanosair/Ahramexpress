<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{url('site/assets/images/favicon.ico')}}">

    <!-- App title -->
    <title>لوحة تحكم التجار - Ahram Express </title>

    <!-- Switchery css -->
    <link href="{{url('site/plugins/switchery/switchery.min.css ')}}" rel="stylesheet" />
    <link href="{{url('site/plugins/fileuploads/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link href="{{url('site/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{url('site/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->

    <script src="{{url('site/assets/js/modernizr.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('site/plugins/morris/morris.css')}}">
    
     <link href="{{asset('site/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/plugins/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
        <link href="{{asset('site/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container">

            <!-- LOGO -->
            <div class="topbar-right" style="float: right;">
                <a href="index.php" class="logo">
                    <img src="{{url('site/assets/images/logo.png')}}" >
                </a>
            </div>
            <!-- End Logo container-->


            <div class="menu-extras navbar-topbar" style="float: left; padding: 20px;">

                <ul class="list-inline float-right mb-0">

                    <li class="list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>




                </ul>

            </div> <!-- end menu-extras -->
            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->


    <div class="navbar-custom">
        <div class="container" >
            <div id="navigation" style="float:right; direction: rtl;">
                <!-- Navigation Menu-->
                <ul class="navigation-menu text-right">
                    <li>
                        <a href="{{url('/dashboard')}}"><i class="zmdi zmdi-view-dashboard"></i> <span> الواجهة </span> </a>
                    </li>
                    <li>
                        <a href="{{url('order_system')}}"><i class="fa fa-random"></i> <span> أرسل شحنات </span> </a>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="fa fa-first-order"></i> <span> طلباتي </span> </a>
                        <ul class="submenu" >
                            <li><a href="{{url('/pick_up')}}">الاستلام</a></li>
                            <li><a href="{{url('/Cargo')}}">الشحنات</a></li>


                        </ul>
                    </li>
                    <!-- <li class="has-submenu">
                         <a href="#"><i class="zmdi zmdi-money"></i> <span> المالية </span> </a>
                         <ul class="submenu">
                             <li><a href="icons-materialdesign.php">التحصيلات</a></li>
                             <li><a href="icons-ionicons.php">طلب سحب</a></li>

                         </ul>
                     </li> -->

                    <li class="has-submenu">
                        <a href="#"><i class="zmdi zmdi-account-circle"></i> <span> ملفي </span> </a>
                        <ul class="submenu">
                            <li><a href="{{url('/my-account-package')}}">نظام حسابي</a></li>
                            <li><a href="{{url('/client_account')}}">معلوماتي</a></li>

                        </ul>
                    </li>

                    <li>
                        <a href="cs.php"><i class="zmdi zmdi-view-dashboard"></i> <span> خدمة العملاء </span> </a>
                    </li>
                    <li>
                        <a href="{{url('/logout_client')}}"><i class="zmdi zmdi-power"></i> <span> تسجيل خروج </span> </a>
                    </li>

                </ul>
                </li>

                </ul>
                <!-- End navigation menu  -->
            </div>
        </div>
    </div>
</header>
<!-- End Navigation Bar-->


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="wrapper">
    <div class="container">
  @yield('content')




  <!-- Footer -->
      <footer class="footer text-center">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      2014 - <?php echo date("Y"); ?> &copy; Ahram Express LLC. - ahramex.com
                  </div>
              </div>
          </div>
      </footer>
      <!-- End Footer -->


    </div> <!-- container -->





</div> <!-- End wrapper -->


<!-- jQuery  -->
<script src="{{url('site/assets/js/jquery.min.js')}}"></script>
<script src="{{url('site/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('site/assets/js/waves.js')}}"></script>
<script src="{{url('site/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('site/plugins/switchery/switchery.min.js')}}"></script>

<!-- Counter Up  -->
<script src="{{url('site/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{url('site/plugins/counterup/jquery.counterup.js')}}"></script>

<script type="text/javascript" src="{{url('site/plugins/jquery-knob/excanvas.js')}} "></script>
<![endif]-->
<script src="{{url('site/plugins/jquery-knob/jquery.knob.js')}}"></script>

<script src="{{url('site/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
<!-- Peity chart js -->
<script src="{{url('site/plugins/peity/jquery.peity.min.js')}}"></script>

<!-- App js -->
<script src="{{url('site/assets/js/jquery.core.js')}}"></script>
<script src="{{url('site/assets/js/jquery.app.js')}}"></script>
<script src="{{url('site/plugins/fileuploads/js/dropify.min.js')}}"></script>


<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong appended.'
        },
        error: {
            'fileSize': 'The file size is too big (1M max).'
        }
    });
</script>

<script src="{{asset('site/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('/site/plugins/raphael/raphael.min.js')}}"></script>

<!-- Page specific js -->
<script src="{{asset('/site/assets/pages/jquery.dashboard.js')}}"></script>

<!-- google analytic code -->


<!-- google analytic code ends here -->

<script src="{{asset('/site/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('/site/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/jszip.min.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/buttons.print.min.js')}}"></script>

<!-- Key Tables -->
<script src="{{asset('/site/plugins/datatables/dataTables.keyTable.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('/site/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/site/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<!-- Selection table -->
<script src="{{asset('/site/plugins/datatables/dataTables.select.min.js')}}"></script>

<script src="{{asset('/site/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('/site/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
        <script src="{{asset('/site/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('/site/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('/site/plugins/clockpicker/bootstrap-clockpicker.js')}}"></script>
        <script src="{{asset('/site/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

        <script src="{{asset('/site/assets/pages/jquery.form-pickers.init.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // Default Datatable
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        // Key Tables

        $('#key-table').DataTable({
            keys: true
        });

        // Responsive Datatable
        $('#responsive-datatable').DataTable();

        // Multi Selection Datatable
        $('#selection-datatable').DataTable({
            select: {
                style: 'multi'
            }
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>
<script type="text/javascript">
    $('#country').change(function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:"GET",
                url:"{{url('get-state-list')}}?country_id="+countryID,
                success:function(res){
                    if(res){
                        $("#state").empty();
                        $("#state").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#state").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#state").empty();
                    }
                }
            });
        }else{
            $("#state").empty();
            $("#city").empty();
        }
    });
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:"GET",
                url:"{{url('get-city-list')}}?state_id="+stateID,
                success:function(res){
                    if(res){
                        $("#city").empty();
                        $.each(res,function(key,value){
                            $("#city").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#city").empty();
                    }
                }
            });
        }else{
            $("#city").empty();
        }

    });
</script>




</body>
</html>