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
    @php
        $seo = \App\Models\SeoSetting::first();
    @endphp

    @if($seo)
        <!-- Dynamic SEO Meta -->
        <title data-translate="About Us">{{ $seo->title_about ?? 'CERAM CLINIC - About Us' }}</title>
        <meta name="description" content="{{ $seo->description_about }}">
        <meta name="keywords" content="{{ $seo->key_about }}">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $seo->title_about }}">
        <meta property="og:description" content="{{ $seo->description_about }}">
        @if($seo->image_about)
            <meta property="og:image" content="{{ asset('storage/'.$seo->image_about) }}">
        @endif

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo->title_about }}">
        <meta name="twitter:description" content="{{ $seo->description_about }}">
        @if($seo->image_about)
            <meta name="twitter:image" content="{{ asset('storage/'.$seo->image_about) }}">
        @endif
    @else
        <!-- Default fallback -->
        <title data-translate="About Us">CERAM CLINIC - About Us</title>
    @endif

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
						<h1 data-cursor="-opaque"><span data-translate="About">About</span> <span data-translate="Us">Us</span></h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./" data-translate="home">home</a></li>
								<li class="breadcrumb-item active" aria-current="page" data-translate="about us">about us</li>
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
                <div class="col-lg-6">
                    <!-- About Image Start -->
                    <div class="about-image">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                @if($about && $about->about_img1)
                                <img src="{{ asset('storage/' . $about->about_img1) }}" alt="About Image 1">
                                @endif
                            </figure>
                        </div>

                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                @if($about && $about->about_img2)
                                <img src="{{ asset('storage/' . $about->about_img2) }}" alt="About Image 2">
                                @endif
                            </figure>
                        </div>

                        <!-- About Experience Circle Start -->
                        <div class="about-experience">
                            <figure>
                                <img src="{{ asset('assets/images/log.png') }}"alt="">
                            </figure>
                        </div>
                        <!-- About Experience Circle End -->
                    </div>
                    <!-- About Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp" data-translate="about us">about us</h3>
                            <h2 data-cursor="-opaque">{{ $about?->getText('title') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ $about?->getText('subTitle') }}</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Us Body Start -->
                        <div class="about-us-body wow fadeInUp" data-wow-delay="0.5s">
                            @if($about && is_array($about->goals))
                                <ul>
                                @foreach($about->goals as $goal)
                                    <li>
                                    {{ app()->getLocale() === 'ar' ? ($goal['text_ar'] ?? '') : ($goal['text_en'] ?? '') }}
                                    </li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                        <!-- About Us Body End -->
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page About Us End -->

    <!-- How It Work Start -->
    <div class="how-it-work about-how-it-work">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                <div class="how-it-work-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                    <h3 class="wow fadeInUp" data-translate="how it work">how it work</h3>
                    <h2 data-cursor="-opaque">{{ $about?->getText('faq_title') }}</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.25s">{{ $about?->getText('faq_subTitle') }}</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- FAQ Accordion Start -->
                    <div class="faq-accordion how-work-accordion" id="accordion">
                    @if($about && is_array($about->faq) && count($about->faq))
                        @foreach($about->faq as $index => $item)
                        @php
                            // IDs فريدة لكل عنصر
                            $headingId = 'heading' . $index;
                            $collapseId = 'collapse' . $index;

                            // أول عنصر مفتوح
                            $isFirst = $index === 0;

                            // اختيار أيقونة (تدوير 1..3)
                            $iconNumber = ($index % 3) + 1;
                        @endphp

                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.{{ $index+1 }}s">
                            <div class="icon-box">
                            <img src="{{ asset('images/icon-how-it-work-' . $iconNumber . '.svg') }}" alt="">
                            </div>

                            <h2 class="accordion-header" id="{{ $headingId }}">
                            <button
                                class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#{{ $collapseId }}"
                                aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                aria-controls="{{ $collapseId }}"
                            >
                                {{ app()->getLocale() === 'ar' ? ($item['question_ar'] ?? '') : ($item['question_en'] ?? '') }}
                            </button>
                            </h2>

                            <div
                            id="{{ $collapseId }}"
                            class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                            aria-labelledby="{{ $headingId }}"
                            data-bs-parent="#accordion"
                            >
                            <div class="accordion-body">
                                <p>
                                {{ app()->getLocale() === 'ar' ? ($item['answer_ar'] ?? '') : ($item['answer_en'] ?? '') }}
                                </p>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- في حال ما في بيانات -->
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-empty">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-empty" aria-expanded="true" aria-controls="collapse-empty">
                            {{ app()->getLocale() === 'ar' ? 'لا توجد أسئلة شائعة بعد' : 'No FAQs yet' }}
                            </button>
                        </h2>
                        <div id="collapse-empty" class="accordion-collapse collapse show" aria-labelledby="heading-empty" data-bs-parent="#accordion">
                            <div class="accordion-body">
                            <p>{{ app()->getLocale() === 'ar' ? 'أضِف الأسئلة من لوحة التحكم.' : 'Add FAQs from the admin panel.' }}</p>
                            </div>
                        </div>
                        </div>
                    @endif
                    </div>
                    <!-- FAQ Accordion End -->
                </div>
                </div>


                <div class="col-lg-6">
                    <!-- How It Work Image Start -->
                    <div class="how-it-work-img">
                        <figure class="reveal image-anime">
                            <img src="{{ asset('storage/' . $about->faq_img) }}" alt="FAQ Image">
                        </figure>
                    </div>
                    <!-- How It Work Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work End -->

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