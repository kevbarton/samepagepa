@extends('layouts.front')
@section('content')
<!-- FAQs-2
			============================================= -->
			<section id="faqs-2" class="gr--whitesmoke pb-30 inner-page-hero faqs-section division">				
				<div class="container">
					

					
					
					<div class="row justify-content-center">
						<div class="col-lg-11 col-xl-10">


							<!-- INNER PAGE TITLE -->
							<div class="inner-page-title">
								<h2 class="s-52 w-700">Our Integrations</h2>
								<p class="p-lg">Some common questions we get about Same Page</p>
							</div>


					<!-- INTEGRATIONS-1 WRAPPER -->
					<div class="integrations-1-wrapper">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 rows-2">

		 					<!-- TOOL #4 -->
		 					<div class="col">
		 						<a href="#" class="in_tool it-4 r-12 mb-30 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="in_tool-logo-wrap">
		 								<div class="in_tool-logo ico-60">
											<img class="img-fluid" src="{{asset('front-assets/images/png_icons/tool-4.png')}}">
										</div>
									</div>

									<!-- Text -->
									<div class="in_tool-txt">
										<h6 class="s-20 w-700">Outlook</h6>
										<p class="p-sm">Email / Calendar</p>
									</div>

		 						</a>
		 					</div>	<!-- END FEATURE BOX #4 -->	



		 					<!-- TOOL #2 -->
		 					<div class="col">
		 						<a href="#" class="in_tool it-2 r-12 mb-30 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="in_tool-logo-wrap">
		 								<div class="in_tool-logo ico-60">
											<img class="img-fluid" src="{{asset('front-assets/images/png_icons/tool-2.png')}}">
										</div>
									</div>

									<!-- Text -->
									<div class="in_tool-txt">
										<h6 class="s-20 w-700">Google</h6>
										<p class="p-sm">Email / Calendar</p>
									</div>

		 						</a>
		 					</div>	<!-- END FEATURE BOX #2 -->	


		 					<!-- TOOL #3 -->
		 					<div class="col">
		 						<a href="#" class="in_tool it-3 r-12 mb-30 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="in_tool-logo-wrap">
		 								<div class="in_tool-logo ico-60">
											<img class="img-fluid" src="{{asset('front-assets/images/png_icons/tool-3.png')}}">
										</div>
									</div>

									<!-- Text -->
									<div class="in_tool-txt">
										<h6 class="s-20 w-700">Apple</h6>
										<p class="p-sm">Email / Calendar</p>
									</div>

		 						</a>
		 					</div>	<!-- END FEATURE BOX #3 -->	



							<!-- TOOL #1 -->
		 					<div class="col">
		 						<a href="#" class="in_tool it-1 r-12 mb-30 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="in_tool-logo-wrap">
		 								<div class="in_tool-logo ico-60">
											<img class="img-fluid" src="{{asset('front-assets/images/png_icons/tool-1.png')}}">
										</div>
									</div>

									<!-- Text -->
									<div class="in_tool-txt">
										<h6 class="s-20 w-700">Zapier</h6>
										<p class="p-sm">Integrations</p>
									</div>

		 						</a>
		 					</div>	<!-- END FEATURE BOX #1 -->	



		 					<!-- TOOL #6 -->
		 					<div class="col">
		 						<a href="#" class="in_tool it-6 r-12 mb-30 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="in_tool-logo-wrap">
		 								<div class="in_tool-logo ico-60">
											<img class="img-fluid" src="{{asset('front-assets/images/png_icons/tool-6.png')}}">
										</div>

									</div>

									<!-- Text -->
									<div class="in_tool-txt">
										<h6 class="s-20 w-700">Slack</h6>
										<p class="p-sm">Share findings</p>
									</div>

		 						</a>
		 					</div>	<!-- END FEATURE BOX #6 -->	



		 					<!-- TOOL #9 -->
		 					<div class="col">
		 						<a href="#" class="in_tool it-9 r-12 wow fadeInUp">

		 							<!-- Icon -->
		 							<div class="in_tool-logo-wrap">
		 								<div class="in_tool-logo ico-60">
											<img class="img-fluid" src="{{asset('front-assets/images/png_icons/tool-9.png')}}">
										</div>
									</div>

									<!-- Text -->
									<div class="in_tool-txt">
										<h6 class="s-20 w-700">Google Drive</h6>
										<p class="p-sm">Import data</p>
									</div>

		 						</a>
		 					</div>	<!-- END FEATURE BOX #9 -->	


		 				</div>
		 			</div>	<!-- END INTEGRATIONS-1 WRAPPER -->


		 			<!-- MORE BUTTON
					<div class="row">
						<div class="col">
							<div class="more-btn text-center mt-60 wow fadeInUp">	
								<a href="integrations.html" class="btn btn--tra-black hover--theme">View all integrations</a>
							</div>	
						</div>
					</div> 
					-->
							
							
							<!-- MORE QUESTIONS LINK -->	
							<div class="more-questions">
								<div class="more-questions-txt bg--white-400 r-100">
									<p class="p-lg">Have any questions? <a href="{{route('front.contactus')}}" class="color--theme">Get in Touch</a></p>
								</div>
							</div>


						</div>	
					</div>    <!-- End row -->	
				</div>	   <!-- End container -->	
			</section>	<!-- END FAQs-2 -->	
@endsection