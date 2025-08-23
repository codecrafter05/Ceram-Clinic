<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}" dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Page Title -->
    <title>CERAM CLINIC - Contact Us</title>
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- css files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mousecursor.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
    
</head>
<body>
    <x-preloader />
    <x-header />

    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque">Contact<span> Us</span></h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">contact us</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Contact Start -->
     <div class="page-contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">contact info</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Connecting</span> Near & Far </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">For emergency dental care or to schedule an appointment, contact our office at visit our clinic.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact US Info Start -->
                        <div class="contact-us-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Contact US Item Start -->
                                    <div class="contact-us-item wow fadeInUp">
                                        <!-- Icon Box Start -->
                                        <div class="icon-box">
                                            <img src="{{ asset('assets/images/icon-location.svg') }}" alt="">
                                        </div>
                                        <!-- Icon Box End -->

                                        <!-- Contact Us Content Start -->
                                        <div class="contact-info-content">
                                            <h3>visit us on</h3>
                                            <p>6H48+HR Manama , Bahrain</p>
                                        </div>
                                        <!-- Contact Us Content End -->
                                    </div>
                                    <!-- Contact Us Item End -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Contact US Item Start -->
                                    <div class="contact-us-item wow fadeInUp" data-wow-delay="0.25s">
                                    <!-- Icon Box Start -->
                                    <div class="icon-box">
                                        <img src="{{ asset('assets/images/icon-phone.svg') }}" alt="">
                                    </div>
                                    <!-- Icon Box End -->

                                    <!-- Contact Us Content Start -->
                                    <div class="contact-info-content">
                                        <h3>contact us</h3>
                                        <p>{{ $setting?->contact_number }}</p>
                                    </div>
                                    <!-- Contact Us Content End -->
                                    </div>
                                <!-- Contact Us Item End -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Contact US Item Start -->
                                    <div class="contact-us-item wow fadeInUp" data-wow-delay="0.5s">
                                        <!-- Icon Box Start -->
                                        <div class="icon-box">
                                            <img src="{{ asset('assets/images/icon-clock.svg') }}" alt="">
                                        </div>
                                        <!-- Icon Box End -->

                                        <!-- Contact Us Content Start -->
                                        <div class="contact-info-content">
                                            <h3>working hours</h3>
                                            <p>Mon to Fri : 10:00 To 6:00</p>
                                            <p>Sat : 10:00AM To 3:00PM</p>
                                        </div>
                                        <!-- Contact Us Content End -->
                                    </div>
                                    <!-- Contact Us Item End -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Contact US Item Start -->
                                    <div class="contact-us-item wow fadeInUp" data-wow-delay="0.75s">
                                        <!-- Icon Box Start -->
                                        <div class="icon-box">
                                            <img src="{{ asset('assets/images/icon-mail.svg') }}" alt="">
                                        </div>
                                        <!-- Icon Box End -->

                                        <!-- Contact Us Content Start -->
                                        <div class="contact-info-content">
                                            <h3>email us</h3>
                                            <p>{{ $setting?->contact_email }}</p>
                                        </div>
                                        <!-- Contact Us Content End -->
                                    </div>
                                    <!-- Contact Us Item End -->
                                </div>
                            </div>
                        </div>
                        <!-- Contact US Info End -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Google Map Start -->
                    <div class="google-map">
                        <!-- Google Map Iframe Start -->
                        <div class="google-map-iframe">
                            <iframe src="{{ $setting?->location_url }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- Google Map Iframe End -->
                    </div>
                    <!-- Google Map End -->
                </div>
            </div>
        </div>
     </div>
    <!-- Page Contact End -->

    <!-- Contact Form Start -->
	<div class="contact-us-form">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<!-- Contact Us Image Start -->
					 <div class="contact-us-img">
						<figure class="reveal image-anime">
							<img src="{{ asset('assets/images/contact-us-img.jpg') }}" alt="">
						</figure>
					 </div>
					<!-- Contact Us Image End -->
				</div>
				<div class="col-lg-6">
					<div class="contact-form">
						<!-- Section Title Start -->
						<div class="section-title">
                            <h3 class="wow fadeInUp">contact us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><span>Get</span> In Touch With Us</h2>
                        </div>
                        <!-- Section Title End -->

						<form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.25s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="fullname" placeholder="Enter Name" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required="">
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="form-group col-md-12 mb-5">
                                    <textarea name="msg" class="form-control" id="msg" rows="5" placeholder="Your Message" required=""></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                    
                                <div class="col-md-12">
                                    <button type="submit" class="btn-default">send message</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Form End -->
    
    <x-footer />

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/parallaxie.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/magiccursor.js') }}"></script>
    <script src="{{ asset('assets/js/SplitText.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/function.js') }}"></script>
    <script src="{{ asset('assets/js/language-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/language-switcher.js') }}"></script>

</body>
</html>