
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>@yield('pagetitle','SamepagePA Dashboard')</title>
		<meta charset="utf-8" />
		<meta name="description" content="@yield('pagedescription','SamepagePA')" />
		<meta name="keywords" content="@yield('pagekeywords','SamepagePA')" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="@yield('pagetitle','SamepagePA Dashboard')" />
		<meta property="og:url" content="{{url('/dashboard')}}" />
		<meta property="og:site_name" content="SamepagePA" />
		<link rel="canonical" href="{{url('/dashboard')}}" />
		<link rel="shortcut icon" href="{{asset('admin-assets/media/logos/favicon.ico')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{asset('admin-assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin-assets/css/custom.css?v='.time())}}" rel="stylesheet" type="text/css" />
        @stack('styles')
	</head>
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                @include('shared.admin.header')
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    @include('shared.admin.sidebar')
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						@yield('content')
						@include('shared.admin.footer')
					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<script>var hostUrl = "admin-assets/";</script>
		<script src="{{asset('admin-assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/js/widgets.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/js/custom/widgets.js')}}"></script>
        <script src="{{asset('admin-assets/js/custom.js?v='.time())}}"></script>
        @stack('scripts')
	</body>
</html>