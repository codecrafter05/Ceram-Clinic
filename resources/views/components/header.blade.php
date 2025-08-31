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
                                <li class="nav-item"><a class="nav-link" href="./" data-translate="Home">Home</a></li>                                
                                <li class="nav-item"><a class="nav-link" href="/about" data-translate="About Us">About Us</a></li>
                                <li class="nav-item"><a class="nav-link" href="/services" data-translate="Services">Services</a></li>
                                <li class="nav-item submenu"><a class="nav-link" href="#" data-translate="Pages">Pages</a>
                                    <ul>
										<li class="nav-item"><a class="nav-link" href="/team" data-translate="Our Team">Our Team</a></li>
                                        <li class="nav-item"><a class="nav-link" href="/gallery" data-translate="Gallery">Gallery</a></li>
                                        <li class="nav-item"><a class="nav-link" href="/faqs" data-translate="FAQ's">FAQ's</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/contact" data-translate="Contact Us">Contact Us</a></li>      
                            </ul>
                        </div>
                        <!-- Let’s Start Button Start -->
                        <div class="header-btn d-inline-flex">
                            <button id="langBtn" class="btn-lang" data-current-lang="{{ session('locale', 'en') }}">{{ session('locale', 'en') === 'ar' ? 'English' : 'عربي' }}</button>
                        </div>
                        <!-- Let’s Start Button End -->
					</div>
					<!-- Main Menu End -->
					<div class="mobile-controls d-flex align-items-center">
						<button id="langBtnMobile" class="btn-lang-mobile" data-current-lang="{{ session('locale', 'en') }}">{{ session('locale', 'en') === 'ar' ? 'English' : 'عربي' }}</button>
						<div class="navbar-toggle"></div>
					</div>
				</div>
			</nav>
			<div class="responsive-menu"></div>
		</div>
	</header>
<!-- Header End -->