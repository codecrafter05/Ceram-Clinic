<!DOCTYPE html>
<html lang="{{ session('locale', 'en') }}" dir="{{ session('locale', 'en') === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CERAM CENTER - {{ isset($customPage) && $customPage && !$customPage instanceof \Illuminate\Database\Eloquent\Collection && method_exists($customPage, 'getText') ? $customPage->getText('page_name') : 'Custom Pages' }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting?->site_icon ? asset('storage/' . $setting->site_icon) : asset('assets/images/favicon.png') }}">

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
    
    <!-- Custom Page Styles -->
    <style>
        .custom-page-content {
            margin-top: 40px;
            padding: 40px 0;
        }
        
        .content-wrapper {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
        }
        
        .content-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #28a745, #ffc107, #dc3545);
            background-size: 300% 100%;
            animation: gradientShift 3s ease-in-out infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .content-wrapper h1,
        .content-wrapper h2,
        .content-wrapper h3,
        .content-wrapper h4,
        .content-wrapper h5,
        .content-wrapper h6 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .content-wrapper p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 16px;
        }
        
        .content-wrapper ul,
        .content-wrapper ol {
            margin-bottom: 20px;
            padding-left: 30px;
        }
        
        .content-wrapper li {
            color: #666;
            line-height: 1.8;
            margin-bottom: 10px;
        }
        
        .content-wrapper blockquote {
            border-left: 4px solid #007bff;
            padding-left: 20px;
            margin: 30px 0;
            font-style: italic;
            color: #555;
        }
        
        .content-wrapper img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .content-wrapper a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .content-wrapper a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        
        .section-title.text-center h3 {
            color: #007bff;
            font-size: 18px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }
        
        .section-title.text-center h2 {
            font-size: 42px;
            font-weight: 700;
            color: #333;
            margin-bottom: 0;
        }
        
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 30px 20px;
                margin: 20px 0;
            }
            
            .section-title.text-center h2 {
                font-size: 32px;
            }
            
            .custom-page-content {
                margin-top: 20px;
                padding: 20px 0;
            }
        }
    </style>
</head>
<body>

    <x-preloader />
    <x-header />

    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 data-cursor="-opaque"><span>{{ isset($customPage) && $customPage && !$customPage instanceof \Illuminate\Database\Eloquent\Collection && method_exists($customPage, 'getText') ? $customPage->getText('page_name') : 'Custom Pages' }}</span></h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item" data-translate="home"><a href="{{ route('home') }}">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">{{ isset($customPage) && $customPage && !$customPage instanceof \Illuminate\Database\Eloquent\Collection && method_exists($customPage, 'getText') ? $customPage->getText('page_name') : 'Custom Pages' }}</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page About Us Start -->
    <div class="about-us page-about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title text-center">
                            <h3 class="wow fadeInUp" data-translate="Custom Page">Custom Page</h3>
                            <h2 class="wow fadeInUp" data-wow-delay="0.25s" data-cursor="-opaque">{{ isset($customPage) && $customPage && !$customPage instanceof \Illuminate\Database\Eloquent\Collection && method_exists($customPage, 'getText') ? $customPage->getText('title') : 'Custom Pages' }}</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Custom Page Content Start -->
                        <div class="custom-page-content wow fadeInUp" data-wow-delay="0.5s">
                            <div class="content-wrapper">
                                {!! isset($customPage) && $customPage && !$customPage instanceof \Illuminate\Database\Eloquent\Collection && method_exists($customPage, 'getText') ? $customPage->getText('description') : 'Browse through our custom pages.' !!}
                            </div>
                        </div>
                        <!-- Custom Page Content End -->
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page About Us End -->

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
    <script src="{{ asset('assets/js/translator.js') }}"></script>
</body>
</html>