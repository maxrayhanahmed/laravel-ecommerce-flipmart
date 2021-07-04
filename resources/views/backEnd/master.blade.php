<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @foreach($title as $siteTitle)
            {{ $siteTitle->siteTitle }}

        @endforeach
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public/backEnd/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/backEnd/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->

    <!-- Morris Charts CSS -->
    <link href="{{asset('public/backEnd/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/backEnd/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('public/backEnd/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('public/backEnd/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/backEnd/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        @yield('css');


</head>
<body>

  <div id="wrapper">




        @include('backEnd.includes.header')

        @include('backEnd.includes.siteBar')
        
        @include('backEnd.includes.alerts')
                   

        @yield('mainContent');



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    @yield('script');
    <script src="{{asset('public/backEnd/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/backEnd/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/backEnd/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('public/backEnd/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('public/backEnd/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('public/backEnd/data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
     <script src="{{asset('public/backEnd/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backEnd/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/backEnd/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/backEnd/dist/js/sb-admin-2.js')}}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
