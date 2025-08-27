<!-- Footer Start -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- About Footer Start -->
                    <div class="about-footer">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            @if($setting?->site_logo)
                            <img src="{{ asset('storage/' . $setting->site_logo) }}" alt="Site Logo">
                            @endif
                        </div>
                        <!-- Footer Logo End -->

                        <!-- About Footer Content Start -->
                        <div class="about-footer-content">
                            <p>The goal our clinic is provide friendly, caring dentistry and highest level of general, cosmetic, and specialist dental treatments.</p>
                         </div>
                         <!-- About Footer Content End -->
                     </div>
                    <!-- About Footer End -->
                </div>
                <div class="col-lg-3 col-md-4">
                    <!-- Footer Quick Links Start -->
                    <div class="footer-links footer-quick-links">
                        <h3>quick links</h3>
                        <ul>                            
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li><a href="{{ url('/about') }}">about us</a></li>
                            <li><a href="{{ url('/services') }}">services</a></li>
                            <li><a href="{{ url('/contact') }}">contact us</a></li>
                        </ul>
                    </div>
                    <!-- Footer Quick Links End -->
                </div>

                <div class="col-lg-3 col-md-4">
                    <!-- Footer Social Links Start -->
                    <div class="footer-links footer-social-links">
                        <h3>social media</h3>
                            @if(!empty($setting?->social_media) && is_array($setting->social_media))
                                <ul>
                                @foreach($setting->social_media as $item)
                                    @php
                                    $text = app()->getLocale() === 'ar'
                                        ? ($item['text_ar'] ?? '')
                                        : ($item['text_en'] ?? '');
                                    $link = $item['link'] ?? '#';
                                    @endphp
                                    <li>
                                    <a href="{{ $link }}" target="_blank" rel="noopener">
                                        {{ $text }}
                                    </a>
                                    </li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                    <!-- Footer Social Links End -->
                </div>

                <div class="col-lg-2 col-md-4">
                    <!-- Footer Contact Links Start -->
                    <div class="footer-links footer-contact-links">
                        <h3>Useful Links</h3>
                        <ul>
                            @foreach($customPage as $page)
                                <li>
                                    <a href="{{ url('/page/' . $page->slug) }}">
                                        {{ $page->getText('page_name') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Footer Contact Links End -->
                </div>                
            </div>

            <!-- Footer Copyright Section Start -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Footer Copyright Start -->
                        <div class="footer-copyright-text">
                            <p>{!! $setting->getText('copyright') !!}</p>
                        </div>
                        <!-- Footer Copyright End -->
                    </div>
                </div>
            </div>
            <!-- Footer Copyright Section End -->
        </div>
    </footer>
<!-- Footer End -->