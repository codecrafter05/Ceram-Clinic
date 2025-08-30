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

        <!-- SEO Meta -->
    @php
        $seo = \App\Models\SeoSetting::first();
    @endphp

    @if($seo)
        <title>{{ $seo->title_home ?? 'CERAM CLINIC' }}</title>

        <meta name="description" content="{{ $seo->description_home }}">
        <meta name="keywords" content="{{ $seo->key_home }}">

        <!-- OG Meta -->
        <meta property="og:title" content="{{ $seo->title_home }}">
        <meta property="og:description" content="{{ $seo->description_home }}">
        @if($seo->image_home)
            <meta property="og:image" content="{{ asset('storage/'.$seo->image_home) }}">
        @endif

        <!-- Twitter Meta -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo->title_home }}">
        <meta name="twitter:description" content="{{ $seo->description_home }}">
        @if($seo->image_home)
            <meta name="twitter:image" content="{{ asset('storage/'.$seo->image_home) }}">
        @endif
    @else
        <title>CERAM CLINIC</title>
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

    <!-- Hero Section Start -->
	<div class="hero">
		<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h1 data-cursor="-opaque">
                                @if($home && $home->hero_title)
                                    {!! $home->hero_title !!}
                                @else
                                    @if($locale === 'ar')
                                        مرحباً بكم في <span>عيادة سيرام</span> للاسنان الرائعة
                                    @else
                                        Welcome to <span>Ceram Clinic</span> for Excellent Dental Care
                                    @endif
                                @endif
                            </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">
                                @if($home && $home->hero_description)
                                    {!! $home->hero_description !!}
                                @else
                                    @if($locale === 'ar')
                                        عيادة سيرام هي وجهتك المثالية للعناية بصحة أسنانك. نقدم أفضل الخدمات الطبية بأحدث التقنيات وأعلى معايير الجودة.
                                    @else
                                        Ceram Clinic is your ideal destination for dental care. We provide the best medical services with the latest technologies and highest quality standards.
                                    @endif
                                @endif
                            </p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Hero Content Body Start -->
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <a href="/about" class="btn-default">
                                @if($locale === 'ar')
                                    المزيد عنا
                                @else
                                    More About Us
                                @endif
                            </a>
                        </div>
                        <!-- Hero Content Body End -->
                    </div>
                    <!-- Hero Content End -->
                </div>

                <div class="col-lg-6">
                    <!-- Hero Image Start -->
                    <div class="hero-image">
                        <!-- Hero Img Start -->
                        <div class="hero-img">
                            <figure>
                                @if($home && $home->hero_image)
                                    <img src="{{ $home->hero_image_url }}" alt="Hero Image">
                                @else
                                    <img src="{{ asset('assets/images/hero-img.png') }}" alt="">
                                @endif
                            </figure>
                        </div>
                        <!-- Hero Img End -->



                        <!-- Hero Icon List Start -->
                        <div class="hero-icon-list">
                            <div class="hero-icon-box-1">
                                <img src="{{ asset('assets/images/icon-hero-theeth-1.svg') }}" alt="">
                            </div>

                            <div class="hero-icon-box-2">
                                <img src="{{ asset('assets/images/icon-hero-theeth-2.svg') }}" alt="">
                            </div>

                            <div class="hero-icon-box-3">
                                <img src="{{ asset('assets/images/icon-hero-theeth-3.svg') }}" alt="">
                            </div>
                        </div>
                        <!-- Hero Icon List End -->

                        <!-- Icon Start Image Start -->
                        <div class="icon-star-image">
                            <img src="{{ asset('assets/images/icon-star.png') }}" alt="">
                        </div>
                        <!-- Icon Start Image End -->
                    </div>
                    <!-- Hero Image End -->
                </div>
            </div>
        </div>
	</div>
	<!-- Hero Section End -->

    <!-- Call To Action Start -->
    <div class="cta-box">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Cta Box Item Start -->
                    <div class="cta-box-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icon-cta-phone.svg') }}" alt="">
                        </div>
                        <div class="cta-box-content">
                            <h3>need dental services ?</h3>
                            <p>{{ $setting?->contact_number }}</p>
                        </div>
                    </div>
                </div>
                <!-- Cta Box Item End -->

                <!-- Cta Box Item Start -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cta-box-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img src="{{ asset('assets/images/icon-cta-time.svg') }}" alt="">
                        </div>
                        <div class="cta-box-content">
                            <h3>opening hours</h3>
                            <p>{{ $setting?->getText('working_hours') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Cta Box Item End -->

                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Cta Box Btn Start -->
                    <div class="cta-box-btn wow fadeInUp" data-wow-delay="0.5s">
                        <a href="/about" class="btn-default btn-highlighted">More details</a>
                    </div>
                    <!-- Cta Box Btn End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->

    <!-- About Us Section Start -->
	<div class="about-us">
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
                                <img src="{{ asset('assets/images/log.png') }}" alt="">
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
                            <h3 class="wow fadeInUp">about us</h3>
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

                        <!-- About Us Footer Start -->
                        <div class="about-us-footer wow fadeInUp" data-wow-delay="0.75s">
                            <a href="#" class="btn-default">read more about us</a>
                        </div>
                        <!-- About Us Footer End -->
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Our Serviceds Section Start -->
    <div class="our-services">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our services</h3>
                        <h2 data-cursor="-opaque"><span>Hight Quality</span> Services for You.</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">We are committed to sustainability. eco-friendly initiatives.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                @php $delay = 0; @endphp
                @forelse ($services as $service)
                    <div class="col-lg-3 col-md-6">
                        <!-- Service Item Start -->
                        <div class="service-item wow fadeInUp" @if($delay) data-wow-delay="{{ $delay }}s" @endif>
                            <div class="icon-box">
                                <div class="img">
                                    <img src="{{ $service->icon ? Storage::url($service->icon) : asset('assets/images/icon-services-1.svg') }}"
                                        alt="{{ $service->getText('title') }}">
                                </div>
                            </div>
                            <div class="service-body">
                                <h3>{{ $service->getText('title') }}</h3>
                                <p>{!! $service->getText('description') !!}</p>
                            </div>
                        </div>
                        <!-- Service Item End -->
                    </div>
                    @php $delay += 0.25; @endphp
                @empty
                    <div class="col-12">
                        <p class="text-center">{{ $locale === 'ar' ? 'لا توجد خدمات حالياً' : 'No services available' }}</p>
                    </div>
                @endforelse

                <div class="col-lg-12">
                    <!-- Service Box Footer Start -->
                    <div class="services-box-footer wow fadeInUp" data-wow-delay="{{ $delay + 0.25 }}s">
                        <p>
                            {{ $locale === 'ar'
                                ? 'نؤمن باستخدام أحدث التقنيات لضمان أفضل النتائج للمرضى.'
                                : 'We believe in using the latest technology and techniques to ensure the best outcomes for our patients.' }}
                        </p>
                        <a href="{{ route('services.index') }}" class="btn-default">
                            {{ $locale === 'ar' ? 'عرض كل الخدمات' : 'View all services' }}
                        </a>
                    </div>
                    <!-- Service Box Footer End -->
                </div>
            </div>

        </div>

        <!-- Intro Clinic Video Section Start -->
        <div class="intro-clinic-video">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Visit Clinic Start -->
                        <div class="visit-clinic parallaxie" @if($home && $home->video_background_image) style="background-image: url('{{ $home->video_background_image_url }}');" @endif>
                            <!-- Visit Clinic Content Start -->
                            <div class="visit-clinic-content">
                                <!-- Section Title Start -->
                                <div class="section-title">
                                    <h3 class="wow fadeInUp">
                                        @if($home && $home->video_title)
                                            {{ $home->video_title }}
                                        @else
                                            visit clinic
                                        @endif
                                    </h3>
                                    <h2 data-cursor="-opaque">
                                        @if($home && $home->video_subtitle)
                                            {{ $home->video_subtitle }}
                                        @else
                                            Comprehensive Dental Care For All Ages
                                        @endif
                                    </h2>
                                </div>
                                <!-- Section Title End -->
    
                                <!-- Visit Clinic Btn Start -->
                                <div class="visit-clinic-btn wow fadeInUp" data-wow-delay="0.25s" data-cursor-text="Play">
                                    <a href="{{ $home && $home->video_url ? $home->video_url : 'https://www.youtube.com/watch?v=Y-x0efG1seA' }}" class="popup-video play-btn">play video</a>
                                </div>
                                <!-- Visit Clinic Btn End -->
                            </div>
                            <!-- Visit Clinic Content End -->                      
                        </div>
                        <!-- Visit Clinic End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Intro Clinic Video Section End -->

        <!-- Icon Start Image Start -->
        <div class="icon-star-image">
            <img src="{{ asset('assets/images/icon-star.png') }}" alt="">
        </div>
        <!-- Icon Start Image End -->
    </div>
    <!-- Our Serviceds Section End -->

    <!-- Why Choose Us Section Start -->
    <div class="why-choose-us">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">why choose us</h3>
                        <h2 data-cursor="-opaque"><span>Diagnosis of</span> Dental Diseases</h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">We are committed to sustainability. eco-friendly initiatives.</p>
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
        <!-- Icon Start Image Start -->
        <div class="icon-star-image">
            <img src="{{ asset('assets/images/icon-star.png') }}" alt="">
        </div>
        <!-- Icon Start Image End -->
    </div>
    <!-- Why Choose Us Section End -->

    <!-- How It Work Start -->
    <div class="how-it-work">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- How It Work Image Start -->
                    <div class="how-it-work-img">
                        <figure class="reveal image-anime">
                            <img src="{{ asset('storage/' . $about->faq_img) }}" alt="">
                        </figure>
                    </div>
                    <!-- How It Work Image End -->
                </div>

                <div class="col-lg-6">
                    <div class="how-it-work-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">how it work</h3>
                            <h2 data-cursor="-opaque">{{ $about?->getText('faq_title') }}</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">{{ $about?->getText('faq_subTitle') }}</p>
                        </div>

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
                        <!-- How Work Accordion End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work End -->

    <!-- Our Team Start -->
    <div class="our-team">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title">
                    <h3 class="wow fadeInUp">
                        {{ $locale === 'ar' ? 'فريقنا' : 'our team' }}
                    </h3>
                    <h2 data-cursor="-opaque">
                        <span>{{ $locale === 'ar' ? 'فريقنا اللطيف' : 'Our Friendly' }}</span>
                        {{ $locale === 'ar' ? 'من أطباء الأسنان' : 'Dentists Team' }}
                    </h2>
                    <p class="wow fadeInUp" data-wow-delay="0.25s">
                        {{ $locale === 'ar' ? 'نلتزم بالاستدامة ومبادرات صديقة للبيئة.' : 'We are committed to sustainability. eco-friendly initiatives.' }}
                    </p>
                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    use Illuminate\Support\Facades\Storage;
                    use Illuminate\Support\Str;

                    $faMap = [
                    'facebook'  => 'fa-facebook-f',
                    'instagram' => 'fa-instagram',
                    'x'         => 'fa-x-twitter',
                    'twitter'   => 'fa-x-twitter',
                    'youtube'   => 'fa-youtube',
                    'linkedin'  => 'fa-linkedin-in',
                    'tiktok'    => 'fa-tiktok',
                    'snapchat'  => 'fa-snapchat-ghost',
                    'whatsapp'  => 'fa-whatsapp',
                    'website'   => 'fa-globe',
                    'email'     => 'fa-envelope',
                    'phone'     => 'fa-phone',
                    ];
                    $delay = 0;
                @endphp

                @forelse($teamHome as $member)
                    <div class="col-lg-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-member-item wow fadeInUp" @if($delay) data-wow-delay="{{ $delay }}s" @endif>
                        <!-- Team Image Start -->
                        <div class="team-image">
                        <figure class="image-anime">
                            <img src="{{ $member->photo ? Storage::url($member->photo) : asset('assets/images/team-1.jpg') }}"
                                alt="{{ $member->getText('name') }}">
                        </figure>

                        @if(!empty($member->social_links))
                            <div class="team-social-icon">
                            <ul>
                                @foreach($member->social_links as $link)
                                @php
                                    $platform = strtolower($link['platform'] ?? '');
                                    $url = $link['url'] ?? '#';
                                    if ($platform === 'email' && $url && !Str::startsWith($url, 'mailto:')) $url = 'mailto:'.$url;
                                    if ($platform === 'phone' && $url && !Str::startsWith($url, 'tel:')) $url = 'tel:'.preg_replace('/\s+/', '', $url);
                                    $icon = $faMap[$platform] ?? 'fa-link';
                                @endphp
                                <li>
                                    <a href="{{ $url }}" class="social-icon" target="_blank" rel="noopener">
                                    <i class="fa-brands {{ $icon }}"></i>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Content Start -->
                        <div class="team-content">
                        <h3>{{ $member->getText('name') }}</h3>
                        @if($member->getText('position'))
                            <p>{{ $member->getText('position') }}</p>
                        @endif
                        </div>
                        <!-- Team Content End -->
                    </div>
                    <!-- Team Member Item End -->
                    </div>
                    @php $delay += 0.25; @endphp
                @empty
                    <div class="col-12">
                    <p class="text-center">
                        {{ $locale === 'ar' ? 'لا يوجد أعضاء فريق حالياً.' : 'No team members yet.' }}
                    </p>
                    </div>
                @endforelse
            </div>

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <a href="{{ route('team.index') }}" class="btn-default">
                    {{ $locale === 'ar' ? 'عرض كل الفريق' : 'View full team' }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Icon Star Image -->
        <div class="icon-star-image">
            <img src="{{ asset('assets/images/icon-star.png') }}" alt="">
        </div>
    </div>
    <!-- Our Team End -->


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


</body>
</html>