(function (window, $) {
    $(document).ready(function() {

        // open/close navigation menu on mobile
        $('.nav-opener').click(function(e) {
            e.preventDefault();
            $('.navbar').addClass('open');
            $('body').addClass('nav-open');
            $(this).addClass('open');
            $('.nav-closer').addClass('open');
        });
        $('.nav-closer').click(function(e) {
            e.preventDefault();
            $('.navbar').removeClass('open');
            $('body').removeClass('nav-open');
            $(this).removeClass('open');
            $('.nav-opener').removeClass('open');
        });

        // Configure filter bar
        if ($('.primary-sidebar').length !== 0) {
            $('.bapf_sfilter').each(function() {
                var $filterType = $(this).find('.bapf_head h3').text();
                var $filter     = $(this).find('.bapf_body ')
                if ($(this).find('.select2-selection__rendered').text() == 'Any') {
                    $(this).find('.select2-selection__rendered').text($filterType);
                }

                // Configure Price filter.
                if ($(this).data('name') == 'Price') {
                    var $priceFilter = $(this).parent().detach();
                    $('.primary-sidebar').append('<div class="berocket_single_filter_widget price-filter"><span class="select2-container--default"><span class="select2-selection--single">Price</span></span><div class="price-slider"></div></div>');

                    $('.price-slider').append($priceFilter);
                }
            });

            // Add price filter dropdown.
            $('.price-filter').click(function() {
                if (!$('.price-filter').hasClass('open')) {
                    setTimeout(function() {
                        $('.price-filter').addClass('open');
                        $('.primary-sidebar').addClass('price-filter-open');
                    }, 10);
                }
            });

            $('body').click(function() {
                if ($('.price-filter').hasClass('open')) {
                    $('.price-filter').removeClass('open');
                    $('.primary-sidebar').removeClass('price-filter-open');
                }
            });

            // change filter titles when ajax updates.
            $(window).change(function() {
                setTimeout(function() {
                    $('.bapf_sfilter').each(function() {
                        var $filterType = $(this).find('.bapf_head h3').text();
                        var $filter     = $(this).find('.bapf_body ')
                        if ($(this).find('.select2-selection__rendered').text() == 'Any') {
                            $(this).find('.select2-selection__rendered').text($filterType);
                        }
                    });
                }, 1500);
            });
        }

        $('.search-mob > a').click(function(e) {
            e.preventDefault();

            $('.searchform-mobile').toggle();
        });

        $('.search-mob .close-btn').click(function(e) {
            e.preventDefault();

            $('.searchform-mobile').toggle();
        });
    });
})(window, jQuery);;"use strict";
