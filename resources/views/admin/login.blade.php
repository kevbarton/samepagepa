
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SamePagePA Dashboard</title>
		<meta charset="utf-8" />
		<meta name="description" content="SamePagePA Dashboard" />
		<meta name="keywords" content="SamePagePA Dashboard" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="SamePagePA Dashboard" />
		<meta property="og:url" content="https://samepagepa.com/dashboard" />
		<meta property="og:site_name" content="SamepagePA" />
		<link rel="canonical" href="https://samepagepa.com/dashboard" />
		<link rel="shortcut icon" href="{{asset('admin-assets/media/logos/favicon.ico')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{asset('admin-assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="app-blank">
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<div class="w-lg-500px p-10">
							<form class="form w-100" novalidate="novalidate"  method="post" action="{{route('dashboard.login')}}">
                                @csrf
								<div class="text-center mb-11">
									<h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
								</div>
								
								<div class="fv-row mb-8">
									<input type="text" placeholder="Email" name="email" autocomplete="off" class="@error('email') is-invalid @enderror form-control bg-transparent" value="{{old('email')}}"/>
                                    @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
								</div>
								<div class="fv-row mb-3">
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
								</div>
								<div class="d-grid mb-10">
									<button type="submit"  class="btn btn-primary">
										<span class="indicator-label">Sign In</span>
										
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>