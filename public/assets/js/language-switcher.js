(function ($) {
    "use strict";

    // Language Switcher Function
    function initLanguageSwitcher() {
        // Get current language from session or default to 'en'
        let currentLang = $('html').attr('lang') || 'en';
        let currentDirection = $('html').attr('dir') || 'ltr';

        // Function to switch language
        function switchLanguage(language) {
            $.ajax({
                url: '/switch-language',
                method: 'POST',
                data: {
                    language: language,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        // Update HTML attributes
                        $('html').attr('lang', response.language);
                        $('html').attr('dir', response.direction);
                        
                        // Update button text
                        const newText = response.language === 'ar' ? 'English' : 'عربي';
                        $('.nav-link#langBtn, .btn-lang#langBtn, .btn-lang-mobile#langBtnMobile').text(newText);
                        $('.nav-link#langBtn, .btn-lang#langBtn, .btn-lang-mobile#langBtnMobile').attr('data-current-lang', response.language);
                        
                        // Add RTL/LTR classes to body
                        $('body').removeClass('rtl ltr').addClass(response.direction);
                        
                        // Trigger translation update
                        $(document).trigger('languageChanged');
                        
                        // Reload page to apply all changes
                        setTimeout(function() {
                            window.location.reload();
                        }, 100);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error switching language:', error);
                }
            });
        }

        // Handle language button clicks
        $(document).on('click', '#langBtn, #langBtnMobile', function(e) {
            e.preventDefault();
            
            const currentLang = $(this).attr('data-current-lang') || 'en';
            const newLang = currentLang === 'ar' ? 'en' : 'ar';
            
            switchLanguage(newLang);
        });

        // Initialize language on page load
        function initializeLanguage() {
            $.ajax({
                url: '/current-language',
                method: 'GET',
                success: function(response) {
                    $('html').attr('lang', response.language);
                    $('html').attr('dir', response.direction);
                    $('body').removeClass('rtl ltr').addClass(response.direction);
                    
                    // Update button text
                    const buttonText = response.language === 'ar' ? 'English' : 'عربي';
                    $('.nav-link#langBtn, .btn-lang#langBtn, .btn-lang-mobile#langBtnMobile').text(buttonText);
                    $('.nav-link#langBtn, .btn-lang#langBtn, .btn-lang-mobile#langBtnMobile').attr('data-current-lang', response.language);
                },
                error: function(xhr, status, error) {
                    console.error('Error getting current language:', error);
                }
            });
        }

        // Initialize on document ready
        $(document).ready(function() {
            initializeLanguage();
        });
    }

    // Initialize when document is ready
    $(document).ready(function() {
        initLanguageSwitcher();
    });

})(jQuery);
