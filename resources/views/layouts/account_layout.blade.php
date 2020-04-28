<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">


    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{url('site/assets/images/favicon.ico')}}">

    <!-- App title -->
    <title>منطقة التجار - Ahram Express</title>

    <!-- Bootstrap CSS -->
    <link href="{{url('site/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{url('site/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{url('site/assets/js/modernizr.min.js')}}"></script>

</head>


<body>

@yield('content')

<!-- jQuery  -->
<script src="{{url('site/assets/js/jquery.min.js')}}"></script>
<script src="{{url('site/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('site/assets/js/waves.js')}}"></script>
<script src="{{url('site/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('site/plugins/switchery/switchery.min.js')}}"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="{{url('site/assets/plugins/jquery-knob/excanvas.js')}}"></script>
<![endif]-->
<script src="{{url('site/plugins/jquery-knob/jquery.knob.js')}}"></script>

<script src="{{url('site/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
<!-- Peity chart js -->
<script src="{{url('site/plugins/peity/jquery.peity.min.js')}}"></script>

<!-- App js -->
<script src="{{url('site/assets/js/jquery.core.js')}}"></script>
<script src="{{url('site/assets/js/jquery.app.js')}}"></script>

</body>
</html>