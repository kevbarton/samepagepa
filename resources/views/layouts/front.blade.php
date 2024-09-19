<!doctype html>
<!-- Same Page - Family PA Calendar Assistants design by SamePage -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="SamePage">	
		<meta name="description" content="Same Page - Family PA Calendar Assistants">
		<meta name="keywords" content="Responsive, HTML5, DSAThemes, Landing, Software, Mobile App, SaaS, Startup, Creative, Digital Product">	
		<meta name="viewport" content="width=device-width, initial-scale=1">
				
  		<!-- SITE TITLE -->
		<title>Same Page - Family PA Calendar Assistants</title>
							
		<!-- FAVICON AND TOUCH ICONS --><link rel="apple-touch-icon" sizes="57x57" href="{{asset('front-assets/apple-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('front-assets/images/fav/apple-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('front-assets/images/fav/apple-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('front-assets/images/fav/apple-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('front-assets/images/fav/apple-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('front-assets/images/fav/apple-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('front-assets/images/fav/apple-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('front-assets/images/fav/apple-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('front-assets/images/fav/apple-icon-180x180.png')}}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('front-assets/images/fav/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('front-assets/images/fav/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('front-assets/images/fav/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('front-assets/images/fav/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('front-assets/images/fav/manifest.json')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{asset('front-assets/images/fav/ms-icon-144x144.png')}}">
<meta name="theme-color" content="#ffffff">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
		
		<!-- BOOTSTRAP CSS -->
		<link href="{{asset('front-assets/css/bootstrap.min.css')}}" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="{{asset('front-assets/css/flaticon.css')}}" rel="stylesheet">
		<link href="{{asset('front-assets/css/flaticon_sp.css')}}" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="{{asset('front-assets/css/menu.css')}}" rel="stylesheet">	
		<link id="effect" href="{{asset('front-assets/css/dropdown-effects/fade-down.css')}}" media="all" rel="stylesheet">
		<link href="{{asset('front-assets/css/magnific-popup.css')}}" rel="stylesheet">	
		<link href="{{asset('front-assets/css/owl.carousel.min.css')}}" rel="stylesheet">
		<link href="{{asset('front-assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
		<link href="{{asset('front-assets/css/lunar.css')}}" rel="stylesheet">

		<!-- ON SCROLL ANIMATION -->
		<link href="{{asset('front-assets/css/animate.css')}}" rel="stylesheet">

		<!-- TEMPLATE CSS -->
		
		<link href="{{asset('front-assets/css/green-theme.css')}}" rel="stylesheet">
		<!-- RESPONSIVE CSS -->
		<link href="{{asset('front-assets/css/responsive.css')}}" rel="stylesheet">
        @stack('styles')
	</head>

	<body>
<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page font--jakarta">

			@include('shared.front.header')

			@yield('content')

			@include('shared.front.footer')

		</div>	<!-- END PAGE CONTENT -->	

		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="{{asset('front-assets/js/jquery-3.7.0.min.js')}}"></script>
		<script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>	
		<script src="{{asset('front-assets/js/modernizr.custom.js')}}"></script>
		<script src="{{asset('front-assets/js/jquery.easing.js')}}"></script>
		<script src="{{asset('front-assets/js/jquery.appear.js')}}"></script>
		<script src="{{asset('front-assets/js/menu.js')}}"></script>
		<script src="{{asset('front-assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('front-assets/js/pricing-toggle.js')}}"></script>
		<script src="{{asset('front-assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('front-assets/js/request-form.js')}}"></script>	
		<script src="{{asset('front-assets/js/jquery.validate.min.js')}}"></script>
		<script src="{{asset('front-assets/js/jquery.ajaxchimp.min.js')}}"></script>	
		<script src="{{asset('front-assets/js/popper.min.js')}}"></script>
		<script src="{{asset('front-assets/js/lunar.js')}}"></script>
		<script src="{{asset('front-assets/js/wow.js')}}"></script>
				
		<!-- Custom Script -->		
		<script src="{{asset('front-assets/js/custom.js')}}"></script>
        @stack('scripts')
	</body>




</html>