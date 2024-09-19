<!-- HEADER
			============================================= -->
			<header id="header" class="white-menu navbar-dark light-hero-header white-scroll">
				<div class="header-wrapper">


					<!-- MOBILE HEADER -->
				    <div class="wsmobileheader clearfix">	  	
				    	<span class="smllogo"><img src="{{asset('front-assets/images/logo-magenta.png')}}" alt="mobile-logo"></span>
				    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	
				 	</div>


				 	<!-- NAVIGATION MENU -->
				  	<div class="wsmainfull menu clearfix">
	    				<div class="wsmainwp clearfix">


	    					<!-- HEADER BLACK LOGO -->
	    					<div class="desktoplogo">
	    						<a href="{{route('front.index')}}" class="logo-black"><img src="{{asset('front-assets/images/logo.png')}}"></a>
	    					</div>


	    					<!-- HEADER WHITE LOGO -->
	    					<div class="desktoplogo">
	    						<a href="{{route('front.index')}}" class="logo-white"><img src="{{asset('front-assets/images/logo-white.png')}}"></a>
	    					</div>


	    					<!-- MAIN MENU -->
	      					<nav class="wsmenu clearfix">
	        					<ul class="wsmenu-list nav-theme">
								<li class="nl-simple" aria-haspopup="true"><a href="{{route('front.index')}}" class="h-link">Home</a></li>
									
	        						<!-- DROPDOWN SUB MENU -->
						          	<li aria-haspopup="true"><a href="#" class="h-link">How It Works<span class="wsarrow"></span></a>
	            						<ul class="sub-menu">
	            							<li aria-haspopup="true"><a href="{{route('front.features')}}">Features</a></li>
	            							<li aria-haspopup="true"><a href="{{route('front.faqs')}}">FAQs</a></li>
	            							<li aria-haspopup="true"><a href="{{route('front.integrations')}}">Integrations</a></li>
	            							<li aria-haspopup="true"><a href="{{route('front.testimonials')}}">Testimonials</a></li>	
						           		</ul>
								    </li>


								    <!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="{{route('front.pricing')}}" class="h-link">Pricing</a></li>


						          	<!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="{{route('front.ourstory')}}" class="h-link">Our Story</a></li>

						          	<!-- SIMPLE NAVIGATION LINK -->
							    	<li class="nl-simple" aria-haspopup="true"><a href="{{route('front.contactus')}}" class="h-link">Contact Us</a></li>


							    	<!-- SIGN IN LINK -->
							    	<li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">
							    		<a href="{{route('front.login')}}" class="h-link">Sign in</a>
							    	</li>


								    <!-- SIGN UP BUTTON -->
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="{{route('appregister')}}" class="btn r-04 btn--theme hover--tra-black last-link">Sign up</a>
								    </li> 


	        					</ul>
	        				</nav>	<!-- END MAIN MENU -->


	    				</div>
	    			</div>	<!-- END NAVIGATION MENU -->


				</div>     <!-- End header-wrapper -->
			</header>	<!-- END HEADER -->