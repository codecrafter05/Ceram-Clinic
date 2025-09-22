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
    @php
        $seo = \App\Models\SeoSetting::first();
    @endphp

    @if($seo)
        <!-- Dynamic SEO Meta -->
        <title data-translate="Services">{{ $seo->title_service ?? 'Services - CERAM CLINIC' }}</title>
        <meta name="description" content="{{ $seo->description_service }}">
        <meta name="keywords" content="{{ $seo->key_service }}">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $seo->title_service }}">
        <meta property="og:description" content="{{ $seo->description_service }}">
        @if($seo->image_service)
            <meta property="og:image" content="{{ asset('storage/'.$seo->image_service) }}">
        @endif

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo->title_service }}">
        <meta name="twitter:description" content="{{ $seo->description_service }}">
        @if($seo->image_service)
            <meta name="twitter:image" content="{{ asset('storage/'.$seo->image_service) }}">
        @endif
    @else
        <!-- Default fallback -->
        <title data-translate="Services">Services - CERAM CLINIC</title>
    @endif
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ $setting?->site_icon ? asset('storage/' . $setting->site_icon) : asset('assets/images/favicon.png') }}">
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
						<h1 data-cursor="-opaque"><span data-translate="Our">Our</span> <span data-translate="Services">Services</span></h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./" data-translate="home">home</a></li>
								<li class="breadcrumb-item active" aria-current="page" data-translate="our services">our services</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Services Start -->
    <div class="page-services">
        <div class="container">
            <div class="row">
                @php
                    use Illuminate\Support\Facades\Storage;
                @endphp

                @forelse ($services as $service)
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item wow fadeInUp">
                            <div class="icon-box">
                                <div class="img">
                                    <img
                                        src="{{ $service->icon ? Storage::url($service->icon) : asset('images/icon-services-1.svg') }}"
                                        alt="{{ $service->getText('title') }}">
                                </div>
                            </div>

                            <div class="service-body">
                                <h3>{{ $service->getText('title') }}</h3>
                                <p>{!! $service->getText('description') !!}</p>
                                {{-- <p>{!! nl2br(e($service->getText('description'))) !!}</p> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center m-0">
                            {{ $locale === 'ar' ? 'لا توجد خدمات متاحة حالياً.' : 'No services available at the moment.' }}
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Page Services End -->


    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-translate="why choose us">why choose us</h3>
                        <h2 data-cursor="-opaque"><span data-translate="Diagnosis of">Diagnosis of</span> <span data-translate="Dental Diseases">Dental Diseases</span></h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s" data-translate="We are committed to sustainability. eco-friendly initiatives.">We are committed to sustainability. eco-friendly initiatives.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 order-1">
                    <div class="why-choose-box-1">
                        @php $delay = 0; @endphp
                        @forelse ($whyLeft as $item)
                            <div class="why-choose-item wow fadeInUp" @if($delay) data-wow-delay="{{ $delay }}s" @endif>
                                <div class="icon-box">
                                    <img src="{{ $item->icon_url }}" alt="{{ $item->getText('title') }}">
                                </div>
                                <div class="why-choose-content">
                                    <h3>{{ $item->getText('title') }}</h3>
                                    <p>{!! $item->getText('description') !!}</p>
                                </div>
                            </div>
                            @php $delay += 0.25; @endphp
                        @empty
                            {{-- لا شيء --}}
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-4 order-lg-1 order-md-2 order-1">
                    <div class="why-choose-image wow fadeInUp">
                        <figure>
                            <img src="{{ asset('assets/images/why-choose-us-img.png') }}" alt="">
                        </figure>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 order-lg-2 order-md-1 order-2">
                    <div class="why-choose-box-2">
                        @php $delay = 0; @endphp
                        @forelse ($whyRight as $item)
                            <div class="why-choose-item wow fadeInUp" @if($delay) data-wow-delay="{{ $delay }}s" @endif>
                                <div class="icon-box">
                                    <img src="{{ $item->icon_url }}" alt="{{ $item->getText('title') }}">
                                </div>
                                <div class="why-choose-content">
                                    <h3>{{ $item->getText('title') }}</h3>
                                    <p>{!! $item->getText('description') !!}</p>
                                </div>
                            </div>
                            @php $delay += 0.25; @endphp
                        @empty
                            {{-- لا شيء --}}
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Why Choose Us Section End -->

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
    <script src="{{ asset('assets/js/language-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/translator.js') }}"></script>
    
</body>
</html>