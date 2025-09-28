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
    <title data-translate="Ceramic Clinic - Gallery">Ceramic Center - Gallery</title>
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
						<h1 data-cursor="-opaque" data-translate="Gallery">Gallery</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./" data-translate="home">home</a></li>
								<li class="breadcrumb-item active" aria-current="page" data-translate="gallery">gallery</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Gallery Start -->
    <div class="page-faqs gallery-page">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="faq-sidebar">
                        <div class="faq-catagery-list wow fadeInUp" data-wow-delay="0.25s">
                            <ul>
                                <li class="active">
                                    <a href="#" data-category="all" data-translate="All">{{ session('locale', 'en') === 'ar' ? 'الكل' : 'All' }}</a>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="#" data-category="{{ $category->id }}">
                                            {{ $category->getText('name') }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-8">
                    <div class="gallery-content">
                        <!-- Gallery Grid -->
                        <div class="gallery-grid">
                            <div class="row" id="gallery-items">
                                @foreach($galleries as $index => $gallery)
                                    <div class="col-lg-6 col-md-6 gallery-item" 
                                         data-category="{{ $gallery->gallery_category_id ?? 'all' }}"
                                         data-type="{{ $gallery->type ?? 'image' }}">
                                        
                                        @if(($gallery->type ?? 'image') === 'video')
                                            <!-- Video Item -->
                                            <div class="gallery-video wow fadeInUp" 
                                                 data-wow-delay="{{ ($index % 2) * 0.2 }}s">
                                                <div class="video-wrapper">
                                                    <video controls preload="metadata">
                                                        <source src="{{ asset('storage/'.$gallery->image) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <div class="video-overlay">
                                                        <i class="fas fa-play"></i>
                                                    </div>
                                                </div>
                                                @if($gallery->title)
                                                    <div class="gallery-caption">
                                                        <h5>{{ $gallery->getText('title') }}</h5>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <!-- Image Item -->
                                            <div class="gallery-image wow fadeInUp" 
                                                 data-wow-delay="{{ ($index % 2) * 0.2 }}s"
                                                 data-cursor-text="View">
                                                <a href="{{ asset('storage/'.$gallery->image) }}" class="gallery-lightbox">
                                                    <figure>
                                                        <img src="{{ asset('storage/'.$gallery->image) }}" 
                                                             alt="{{ $gallery->getText('title') ?? 'Gallery Image' }}">
                                                        <div class="gallery-overlay">
                                                            <i class="fas fa-search-plus"></i>
                                                        </div>
                                                    </figure>
                                                </a>
                                                @if($gallery->title)
                                                    <div class="gallery-caption">
                                                        <h5>{{ $gallery->getText('title') }}</h5>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Gallery End -->


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
    
    <!-- Gallery Filter Script -->
    <script>
        $(document).ready(function() {
            // Category filter functionality - using correct selectors
            $('.faq-catagery-list a').click(function(e) {
                e.preventDefault();
                
                // Remove active class from all items
                $('.faq-catagery-list li').removeClass('active');
                
                // Add active class to clicked item
                $(this).parent().addClass('active');
                
                // Get selected category
                var selectedCategory = $(this).data('category');
                
                console.log('Selected category:', selectedCategory);
                
                // Filter gallery items
                if (selectedCategory === 'all') {
                    // Show all items
                    $('.gallery-item').show();
                } else {
                    // Hide all items first
                    $('.gallery-item').hide();
                    
                    // Show only items with matching category
                    $('.gallery-item').each(function() {
                        var itemCategory = $(this).attr('data-category');
                        console.log('Item category:', itemCategory);
                        if (itemCategory == selectedCategory) {
                            $(this).show();
                        }
                    });
                }
            });
            
            // Initialize Magnific Popup for lightbox
            $('.gallery-lightbox').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1]
                },
                image: {
                    titleSrc: function(item) {
                        return item.el.find('img').attr('alt');
                    }
                }
            });
        });
    </script>

</body>
</html>