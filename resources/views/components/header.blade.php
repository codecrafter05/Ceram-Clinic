<!-- Header Start -->
	<header class="main-header">
		<div class="header-sticky">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					<!-- Logo Start -->
					<a class="navbar-brand" href="./">
						<img src="{{ $setting?->site_logo ? asset('storage/' . $setting->site_logo) : asset('assets/images/logo.png') }}" alt="Logo">
					</a>
					<!-- Logo End -->

					<!-- Main Menu Start -->
					<div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="./">Home</a></li>                                
                                <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                                <li class="nav-item submenu"><a class="nav-link" href="#">Pages</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
                                        <li class="nav-item"><a class="nav-link" href="/faqs">FAQ's</a></li>
                                        <li class="nav-item"><a class="nav-link" href="/404">404</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/contact">Contact Us</a></li>
                                <li class="nav-item highlighted-menu"><a class="nav-link" id="langBtn" href="#">{{ session('locale', 'en') === 'ar' ? 'English' : 'عربي' }}</a></li>      
                            </ul>
                        </div>
                        <!-- Let’s Start Button Start -->
                        <div class="header-btn d-inline-flex">
                            <button id="langBtn" class="btn-default" data-current-lang="{{ session('locale', 'en') }}">{{ session('locale', 'en') === 'ar' ? 'English' : 'عربي' }}</button>
                        </div>
                        <!-- Let’s Start Button End -->
					</div>
					<!-- Main Menu End -->
					<div class="navbar-toggle"></div>
				</div>
			</nav>
			<div class="responsive-menu"></div>
		</div>
	</header>
<!-- Header End -->