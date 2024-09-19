@extends('layouts.front')
@section('content')
<!-- PRICING-3
============================================= -->
<section id="pricing-3" class="gr--whitesmoke inner-page-hero pb-60 pricing-section">
    <div class="container">


        <!-- SECTION TITLE -->	
        <div class="row justify-content-center">	
            <div class="col-md-10 col-lg-8">
                <div class="section-title text-center mb-60">	

                    <h2 class="s-52 w-700">Simple, Flexible Pricing</h2>

                    <!-- TOGGLE BUTTON -->
                    <div class="toggle-btn ext-toggle-btn toggle-btn-md mt-30">
                        <span class="toggler-txt">Billed monthly</span>
                        <label class="switch-wrap">
                            <input type="checkbox" id="checbox" onclick="check()">
                            <span class="switcher bg--grey switcher--theme">
                                <span class="show-annual"></span>
                                <span class="show-monthly"></span>
                            </span>
                        </label>
                        <span class="toggler-txt">Billed yearly</span>

                        <!-- Text -->	
                        <p class="color--theme">Save up to 25% with yearly billing</p>

                    </div>


                </div>	
            </div>
        </div>	<!-- END SECTION TITLE -->	


        <!-- PRICING TABLES -->
        <div class="pricing-3-wrapper text-center">
            <div class="row row-cols-1 row-cols-md-3">


                <!-- FREE PLAN -->
                <div class="col">
                    <div id="pt-3-1" class="p-table pricing-3-table bg--white-100 block-shadow r-12 wow fadeInUp">


                        <!-- TABLE HEADER -->
                        <div class="pricing-table-header">

                            <!-- Title -->
                            <h4 class="s-32">Wall Mount Device</h4>

                            <!-- Text -->
                            <p class="color--grey">Wall mounted device with lifetime subscription.</p>

                            <!-- Price -->	
                            <div class="price mt-25">
                                <sup class="color--black">£</sup>								
                                <span class="color--black">120</span>
                                <sup class="validity color--grey">forever</sup>
                            </div>

                        </div>	<!-- END TABLE HEADER -->


                        <!-- BUTTON -->
                        <a href="#" class="pt-btn btn btn--theme hover--theme">Get started</a>
                        <p class="p-sm btn-txt">7-Day Money Back Guarantee</p>	


                    </div>
                </div>	<!-- END FREE PLAN -->


                <!-- PLUS PLAN -->
                <div class="col">
                    <div id="pt-3-2" class="p-table pricing-3-table bg--white-100 block-shadow r-12 wow fadeInUp">


                        <!-- TABLE HEADER -->
                        <div class="pricing-table-header">

                            <!-- Title -->
                            <h4 class="s-32">Table Top Device</h4>

                            <!-- Text -->	
                            <p class="color--grey">Free standing table top device with lifetime subscription.</p>

                            <!-- Price -->	
                            <div class="price mt-25">
                                <sup class="color--black">£</sup>								
                                <span class="color--black">150</span>
                                <sup class="validity color--grey">forever</sup>
                            </div>

                        </div>	<!-- END TABLE HEADER -->


                        <!-- BUTTON -->
                        <a href="#" class="pt-btn btn btn--theme hover--theme">Get started</a>
                        <p class="p-sm btn-txt">7-Day Money Back Guarantee</p>	


                    </div>
                </div>	<!-- END PLUS PLAN -->


                <!-- PRO PLAN -->
                <div class="col">
                    <div id="pt-3-3" class="p-table pricing-3-table bg--white-100 block-shadow r-12 wow fadeInUp">


                        <!-- TABLE HEADER -->
                        <div class="pricing-table-header">

                            <!-- Title -->
                            <h4 class="s-32">Subscription only</h4>

                            <!-- Text -->	
                            <p class="color--grey">Use Same Page on your own device.</p>

                            <!-- Price -->	
                            <div class="price mt-25">								

                                <!-- Monthly Price -->	
                                <div class="price2">
                                    <sup class="color--black">£</sup>								
                                    <span class="color--black">4</span>
                                    <sup class="coins color--black">99</sup>
                                    <sup class="validity color--grey">per month</sup>
                                </div>

                                <!-- Yearly Price -->	
                                <div class="price1">
                                    <sup class="color--black">£</sup>								
                                    <span class="color--black">49</span>
                                    <sup class="coins color--black">90</sup>
                                    <sup class="validity color--grey">per year</sup>
                                </div>

                            </div>

                        </div>	<!-- END TABLE HEADER -->


                        <!-- BUTTON -->
                        <a href="#" class="pt-btn btn btn--theme hover--theme">Upgrade to PRO</a>
                        <p class="p-sm btn-txt">7-Day Money Back Guarantee</p>	


                    </div>
                </div>	<!-- END PRO PLAN -->


            </div>
        </div>	<!-- PRICING TABLES -->


    </div>	   <!-- End container -->
</section>	<!-- END PRICING-3 -->

<!-- PRICING COMPARE
============================================= -->
<section id="comp-table" class="pb-60 pricing-section division">
    <div class="container">


        <!-- SECTION TITLE -->	
        <div class="row justify-content-center">	
            <div class="col-md-10 col-lg-9">
                <div class="section-title mb-70">	

                    <!-- Title -->	
                    <h2 class="s-52 w-700">Compare Our Plans</h2>	

                    <!-- Text -->	
                    <p class="p-xl">Complete list of features available</p>
                        
                </div>	
            </div>
        </div>


        <!-- PRICING COMPARE -->
        <div class="comp-table wow fadeInUp">
            <div class="row">
                <div class="col">


                    <!-- Table -->	
                    <div class="table-responsive mb-50">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th style="width: 34%;"></th>
                                    <th style="width: 22%;">Wall Mount Device</th>
                                    <th style="width: 22%;">Table Top Device</th>
                                    <th style="width: 22%;">Subscription Only</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>
                                    <th scope="row" class="text-start">Available Users</th>
                                    <td class="color--black">Up to 4</td>
                                    <td class="color--black">Up to 250</td>
                                    <td class="color--black">Unlimited</td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Available Storage</th>
                                    <td class="color--black">2Gb</td>
                                    <td class="color--black">3Gb</td>
                                    <td class="color--black">N/A</td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Private Cloud Hosting</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-check"></span></td>
                                    <td class="ico-15 disabled-option"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">User Permissions</th>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Direct Integrations</th>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Data Backup</th>
                                    <td class="color--black">Daily</td>
                                    <td class="color--black">Daily</td>
                                    <td class="color--black">Daily</td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">No Ads. No Trackers</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Advanced Security</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-start">Another Option</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>


                                <tr>
                                    <th scope="row" class="text-start">Another Option</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>
                                

                                <tr>
                                    <th scope="row" class="text-start">Another Option</th>
                                    <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                </tr>											
                                
                                <tr class="table-last-tr">
                                    <th scope="row" class="text-start">Customer Support</th>
                                    <td class="color--black">Priority</td>
                                    <td class="color--black">Priority</td>
                                    <td class="color--black">Standard</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>	<!-- End Table -->	

                </div>
            </div>
        </div>	<!-- END PRICING COMPARE -->


        <!-- PRICING COMPARE PAYMENT -->
        <div class="comp-table-payment">	
            <div class="row row-cols-1 row-cols-md-3">


                <!-- Payment Methods -->
                <div class="col col-lg-5">
                    <div id="pbox-1" class="pbox mb-40 wow fadeInUp">

                        <!-- Title -->
                        <h6 class="s-18 w-700">Accepted Payment Methods</h6>

                        <!-- Payment Icons -->
                        <ul class="payment-icons ico-45 mt-25">
                            <li><img src="{{asset('front-assets/images/png_icons/visa.png')}}" alt="payment-icon"></li>
                            <li><img src="{{asset('front-assets/images/png_icons/am.png')}}" alt="payment-icon"></li>
                            <li><img src="{{asset('front-assets/images/png_icons/discover.png')}}" alt="payment-icon"></li>
                            <li><img src="{{asset('front-assets/images/png_icons/paypal.png')}}" alt="payment-icon"></li>	
                            <li><img src="{{asset('front-assets/images/png_icons/jcb.png')}}" alt="payment-icon"></li>
                        </ul>

                    </div>
                </div>	


                <!-- Payment Guarantee -->

                <div class="col col-lg-4">
                    <div id="pbox-2" class="pbox mb-40 wow fadeInUp">

                        <!-- Title -->
                        <h6 class="s-18 w-700">Money Back Guarantee</h6>

                        <!-- Text -->
                        <p>Explore Same Page Premium for 14 days. If it’s not a perfect fit, receive a full refund.</p>
                        
                    </div>
                </div>	


                <!-- Payment Encrypted -->
                <div class="col col-lg-3">
                    <div id="pbox-3" class="pbox mb-40 wow fadeInUp">

                        <!-- Title -->
                        <h6 class="s-18 w-700">SSL Encrypted Payment</h6>

                        <!-- Text -->
                        <p>Your information is protected by AES-256 SSL encryption.</p>

                    </div>
                </div>	


            </div>
        </div>	<!-- END PRICING COMPARE PAYMENT -->


    </div>	   <!-- End container -->
</section>	<!-- END PRICING COMPARE -->




<!-- BRANDS-1
============================================= -->
<div id="brands-1" class="bg--white-400 py-80 brands-section">
    <div class="container">	


        <!-- BRANDS TITLE -->
        <div class="row justify-content-center">	
            <div class="col-md-10 col-lg-9">
                <div class="brands-title mb-50">
                    <h5 class="s-17">Trusted and used by over XXXXX families</h5>
                </div>
            </div>
        </div>


        <!-- BRANDS CAROUSEL -->				
        <div class="row">
            <div class="col text-center">	
                <div class="owl-carousel brands-carousel-6">

                                    
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>

                                        
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>

                                        
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>

                                        
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>

                                        
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>

                                        
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>


                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>

                                                
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>

                    
                    <!-- BRAND LOGO IMAGE -->
                    <div class="brand-logo">
                        <a href="#"><img class="img-fluid" src="{{asset('front-assets/images/brand-7.png')}}" alt="brand-logo"></a>
                    </div>


                </div>	
            </div>
        </div>  <!-- END BRANDS CAROUSEL -->


    </div>	<!-- End container -->
</div>	<!-- END BRANDS-1 -->








<!-- BANNER-1
============================================= -->
<section id="banner-1" class="pt-100 banner-section">
    <div class="container">


        <!-- BANNER-1 WRAPPER -->
        <div class="banner-1-wrapper r-16">
            <div class="banner-overlay bg--05 bg--scroll">
                <div class="row">


                    <!-- BANNER-1 TEXT -->
                    <div class="col">
                        <div class="banner-1-txt color--white">

                            <!-- Title -->	
                            <h2 class="s-45 w-700">Give it a try!</h2>

                            <!-- Text -->
                            <p class="p-xl">It only takes a few clicks to get started</p>

                            <!-- Button -->
                            <a href="signup.html" class="btn r-04 btn--theme hover--tra-white">Get started now
                            </a>

                        </div>
                    </div>	<!-- END BANNER-1 TEXT -->


                </div>   <!-- End row -->	
            </div>   <!-- End banner overlay -->	
        </div>    <!-- END BANNER-1 WRAPPER -->


    </div>     <!-- End container -->	
</section>	<!-- END BANNER-1 -->
@endsection