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
        <title>{{ $seo->title_team ?? 'CERAM CLINIC - Our Team' }}</title>
        <meta name="description" content="{{ $seo->description_team }}">
        <meta name="keywords" content="{{ $seo->key_team }}">

        <!-- Open Graph -->
        <meta property="og:title" content="{{ $seo->title_team }}">
        <meta property="og:description" content="{{ $seo->description_team }}">
        @if($seo->image_team)
            <meta property="og:image" content="{{ asset('storage/'.$seo->image_team) }}">
        @endif

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo->title_team }}">
        <meta name="twitter:description" content="{{ $seo->description_team }}">
        @if($seo->image_team)
            <meta name="twitter:image" content="{{ asset('storage/'.$seo->image_team) }}">
        @endif
    @else
        <!-- Default fallback -->
        <title data-translate="Team">CERAM CLINIC - Our Team</title>
    @endif
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" src="{{ $setting?->site_icon ? asset('storage/' . $setting->site_icon) : asset('assets/images/favicon.png') }}">
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
						<h1 data-cursor="-opaque"><span>Our</span> Team</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">team</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Team Start -->
    <div class="page-team">
    <div class="container">
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
        @endphp

        @forelse($team as $member)
            <div class="col-lg-3 col-md-6">
            <div class="team-member-item wow fadeInUp">
                <div class="team-image">
                <figure class="image-anime">
                    <img src="{{ $member->photo ? Storage::url($member->photo) : asset('images/team-1.jpg') }}"
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

                <div class="team-content">
                <h3>{{ $member->getText('name') }}</h3>
                @if($member->getText('position'))
                    <p>{{ $member->getText('position') }}</p>
                @endif
                </div>
            </div>
            </div>
        @empty
            <div class="col-12">
            <p class="text-center m-0">
                {{ session('locale','en') === 'ar' ? 'لا يوجد أعضاء فريق حالياً.' : 'No team members yet.' }}
            </p>
            </div>
        @endforelse
        </div>
    </div>
    </div>
    <!-- Page Team End -->


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