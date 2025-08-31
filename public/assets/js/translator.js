(function ($) {
    "use strict";

    // Translation function
    function translatePage() {
        const currentLang = $('html').attr('lang') || 'en';
        
        // Load appropriate translation file
        const script = document.createElement('script');
        script.src = `/assets/js/translations/${currentLang}.js`;
        script.onerror = function() {
            console.error(`Failed to load translation file: ${currentLang}.js`);
            return;
        };
        script.onload = function() {
            console.log(`Translation file loaded: ${currentLang}.js`);
            console.log('Available translations:', Object.keys(translations));
            // Translate all elements with data-translate attribute
            $('[data-translate]').each(function() {
                const key = $(this).attr('data-translate');
                const translation = translations[key];
                if (translation) {
                    $(this).text(translation);
                    console.log(`Translated: ${key} -> ${translation}`);
                } else {
                    console.warn(`Translation not found for key: ${key}`);
                }
            });
            
            // Translate elements with specific classes
            $('.translate-text').each(function() {
                const text = $(this).text().trim();
                const translation = translations[text];
                if (translation) {
                    $(this).text(translation);
                }
            });
            
            // Translate placeholders
            $('input[placeholder], textarea[placeholder]').each(function() {
                const placeholder = $(this).attr('placeholder');
                const translation = translations[placeholder];
                if (translation) {
                    $(this).attr('placeholder', translation);
                }
            });
            
            // Translate alt attributes
            $('img[alt]').each(function() {
                const alt = $(this).attr('alt');
                const translation = translations[alt];
                if (translation) {
                    $(this).attr('alt', translation);
                }
            });
            
            // Translate title attributes
            $('[title]').each(function() {
                const title = $(this).attr('title');
                const translation = translations[title];
                if (translation) {
                    $(this).attr('title', translation);
                }
            });
            
            // Translate page titles
            $('title[data-translate]').each(function() {
                const key = $(this).attr('data-translate');
                const translation = translations[key];
                if (translation) {
                    const currentTitle = $(this).text();
                    const newTitle = currentTitle.replace(key, translation);
                    $(this).text(newTitle);
                    document.title = newTitle;
                }
            });
        };
        document.head.appendChild(script);
    }

    // Initialize translation when document is ready
    $(document).ready(function() {
        translatePage();
    });

    // Re-translate when language changes
    $(document).on('languageChanged', function() {
        translatePage();
    });

})(jQuery);
