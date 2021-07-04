<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from www.themesground.com/flipmart-demo/V2/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2017 10:45:47 GMT -->
<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>  @yield('title')</title>


	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/bootstrap.min.css">

	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{asset('public/frontEnd/css')}}/main.css">
	    <link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/blue.css">
	    <link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/owl.carousel.css">
		<link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/owl.transitions.css">
		<link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/animate.min.css">
		<link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/rateit.css">
		<link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/bootstrap-select.min.css">
		<link href="{{asset('public/frontEnd/css')}}/lightbox.css" rel="stylesheet">

		<link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/style2.css">



		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="{{asset('public/frontEnd')}}/css/font-awesome.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
      

        @yield('css')


	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->


@include('frontEnd.includes.header')

@include('frontEnd.includes.alerts')




<!-- ============================================== HEADER : END ============================================== -->

@include('frontEnd.includes.breadcrumb')



        @yield('mainContent')



		<!-- ============================================== CONTENT ============================================== -->
	
	
	@include('frontEnd.includes.footer')

     @yield('script')


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{asset('public/frontEnd')}}/js/jquery-1.11.1.min.js"></script>


	<script src="{{asset('public/frontEnd')}}/js/bootstrap.min.js"></script>
	
	<script src="{{asset('public/frontEnd')}}/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="{{asset('public/frontEnd')}}/js/owl.carousel.min.js"></script>
	
	<script src="{{asset('public/frontEnd')}}/js/echo.min.js"></script>
	<script src="{{asset('public/frontEnd')}}/js/jquery.easing-1.3.min.js"></script>
	<script src="{{asset('public/frontEnd')}}/js/bootstrap-slider.min.js"></script>
    <script src="{{asset('public/frontEnd')}}/js/jquery.rateit.min.js"></script>
    <script src="{{asset('public/frontEnd')}}/js/lightbox.min.js"></script>
    <script src="{{asset('public/frontEnd')}}/js/bootstrap-select.min.js"></script>
    <script src="{{asset('public/frontEnd')}}/js/wow.min.js"></script>


	<script src="{{asset('public/frontEnd')}}/js/scripts.js"></script>

	

</body>

<!-- Mirrored from www.themesground.com/flipmart-demo/V2/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2017 10:50:31 GMT -->
</html>