<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
	<!-- Page Title -->
    <title>Dentaire - Dentist & Dental Clinic HTML Template</title>
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
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
						<h1 class="text-anime-style-2" data-cursor="-opaque"><span>Frequently</span> Asked Questions</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">faqs</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    @php
        use Illuminate\Support\Str;
    @endphp

    <!-- Page Faqs Start -->
    <div class="page-faqs">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="faq-sidebar">
                        <div class="faq-catagery-list wow fadeInUp" data-wow-delay="0.25s">
                            <ul>
                                @php $hasCats = false; @endphp
                                @foreach ($categories as $cat)
                                    @if ($cat->faqs->count() > 0)
                                        @php
                                            $catId  = 'cat-'.$cat->id;
                                            $catTxt = $cat->getText('name');
                                            $hasCats = true;
                                        @endphp
                                        <li><a href="#{{ $catId }}">{{ $catTxt }}</a></li>
                                    @endif
                                @endforeach

                                @unless($hasCats)
                                    <li>{{ $locale === 'ar' ? 'لا توجد تصنيفات.' : 'No categories.' }}</li>
                                @endunless
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-8">
                    @php $hasContent = false; @endphp
                    @foreach ($categories as $cat)
                        @if ($cat->faqs->count() > 0)
                            @php
                                $catId   = 'cat-'.$cat->id;
                                $accId   = 'accordion-'.$cat->id;
                                $catName = $cat->getText('name');
                                $hasContent = true;
                            @endphp

                            <div class="faqs-section" id="{{ $catId }}">
                                <div class="faqs-section-title">
                                    <h2 class="text-anime-style-2" data-cursor="-opaque">{{ $catName }}</h2>
                                </div>

                                <div class="faq-accordion" id="{{ $accId }}">
                                    @foreach ($cat->faqs as $faq)
                                        @php
                                            $i         = $loop->iteration;
                                            $headingId = "heading-{$cat->id}-{$i}";
                                            $collapseId= "collapse-{$cat->id}-{$i}";
                                            $show      = $i === 1 ? 'show' : '';
                                            $expanded  = $i === 1 ? 'true' : 'false';
                                            $delaySec  = number_format(($i-1)*0.25, 2);
                                        @endphp

                                        <div class="accordion-item wow fadeInUp" @if($i>1) data-wow-delay="{{ $delaySec }}s" @endif>
                                            <h2 class="accordion-header" id="{{ $headingId }}">
                                                <button class="accordion-button @if(!$show) collapsed @endif"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#{{ $collapseId }}"
                                                        aria-expanded="{{ $expanded }}"
                                                        aria-controls="{{ $collapseId }}">
                                                    {{ $faq->getText('question') }}
                                                </button>
                                            </h2>

                                            <div id="{{ $collapseId }}"
                                                class="accordion-collapse collapse {{ $show }}"
                                                aria-labelledby="{{ $headingId }}"
                                                data-bs-parent="#{{ $accId }}">
                                                <div class="accordion-body">
                                                    {!! $faq->getText('answer') !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @unless($hasContent)
                        <p class="m-0">
                            {{ $locale === 'ar' ? 'لا توجد أسئلة متاحة حالياً.' : 'No FAQs available at the moment.' }}
                        </p>
                    @endunless
                </div>
            </div>
        </div>
    </div>
    <!-- Page Faqs End -->



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
    <script src="{{ asset('assets/js/lang.js') }}"></script>

</body>
</html>