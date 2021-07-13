/*---------------------------------------------
Template name:  Trizen - Travel, hotel Booking HTML5 Template
Version:        1.0
Author:         TechyDevs
Author Email:   contact@tecydevs.com

[Table of Content]

01: Preloader
02: Header top bar menu
02: Responsive Mobile menu
03: Canvas menu open
04: Canvas menu close
05: Dashboard menu
06: window resize
07: Navbar offset top
08: Page scroll anchor menu
09: Back to top button
10: Hotel-card-carousel
11: Car-carousel
12: Trending-carousel
13: Gallery-carousel
14: Client logo
15: Testimonial-carousel
16: Fancybox for video
17: Fancybox for gallery
18: ripple-bg
19: Ui range slider
20: Filer uploader
21: Daterangepicker
22: Bootstrap select picker
23: Bootstrap tooltip
24: Add multiple flight function
25: multi-flight-remove
26: Google map
27: Guests Dropdown
28: mobile dropdown menu
29: Sub menu open
----------------------------------------------*/

(function ($) {
    "use strict";
    var $window = $(window);

    $window.on('load', function () {
        var $document = $(document);
        var $dom = $('html, body');
        var preloader = $('#preloader');
        var dropdownMenu = $('.main-menu-content .dropdown-menu-item');
        var isMenuOpen = false;
        var topNav = document.querySelector('.header-menu-wrapper');
        var scrollTopBtn = $('#back-to-top');
        var scrollLink = $('#single-content-nav .scroll-link');
        var hotelCardCarousel = $('.hotel-card-carousel');
        var hotelCardCarouselTwo = $('.hotel-card-carousel-2');
        var cardImgCarousel = $('.card-img-carousel');
        var carCarousel = $('.car-carousel');
        var trendingCarousel = $('.trending-carousel');
        var galleryCarousel = $('.gallery-carousel');
        var clientCarousel = $('.client-logo');
        var testimonialCarousel = $('.testimonial-carousel');
        var testimonialCarouselTwo = $('.testimonial-carousel-2');
        var fancyVideo = $('[data-fancybox="video"]');
        var fancyGallery = $('[data-fancybox="gallery"]');
        var rippleBg = $('.ripple-bg');
        var masonryGrid = $('.grid-masonry');
        var rangeSlider = $('#slider-range');
        var rangeSliderAmount = $('#amount');
        var rangeSliderTwo = $('#slider-range2');
        var rangeSliderAmountTwo = $('#amount2');
        var dateRangePicker = $('input[name="daterange"]');
        var $dateRangePickerTwo = $('input.date-range');
        var bootstrapSelectMenu = $('.select-contain-select');
        var numberCounter = $('.counter');
        var fullWidthSlider = $('.full-width-slider');

        /* ======= Preloader ======= */
        preloader.delay('500').fadeOut(2000);

        /*=========== Header top bar menu ============*/
        $document.on('click', '.down-button', function () {
            $(this).toggleClass('active');
            $('.header-top-bar').slideToggle(200);
        });

        /*=========== Responsive Mobile menu ============*/
        $document.on('click', '.menu-toggler', function () {
            $(this).toggleClass('active');
            $('.main-menu-content').slideToggle(200);
        });

        /*=========== Dropdown menu ============*/
        dropdownMenu.parent('li').children('a').append(function () {
            return '<button class="drop-menu-toggler" type="button"><i class="la la-angle-down"></i></button>';
        });

        /*=========== Dropdown menu ============*/
        $document.on('click', '.main-menu-content .drop-menu-toggler', function () {
            var Self = $(this);
            Self.parent().parent().children('.dropdown-menu-item').toggle();
            return false;
        });

        /*=========== Sub menu ============*/
        $('.main-menu-content .dropdown-menu-item .sub-menu').parent('li').children('a').append(function () {
            return '<button class="sub-menu-toggler" type="button"><i class="la la-plus"></i></button>';
        });

        /*=========== Dropdown menu ============*/
        $document.on('click', '.main-menu-content .dropdown-menu-item .sub-menu-toggler', function () {
            var Self = $(this);
            Self.parent().parent().children('.sub-menu').toggle();
            return false;
        });

        /*=========== Canvas menu open ============*/
        $document.on('click', '.user-menu-open', function () {
            $('.user-canvas-container').addClass('active');
        });

        /*=========== Canvas menu close ============*/
        $document.on('click', '.side-menu-close', function () {
            $('.user-canvas-container, .sidebar-nav').removeClass('active');
        });

        /*=========== Dashboard menu ============*/
        $document.on('click', '.menu-toggler', function () {
            $('.sidebar-nav').toggleClass('active');
        });

        /*=========== When window will resize then this action will work ============*/
        $window.on('resize', function () {
            if ($window.width() > 991) {
                $('.main-menu-content').show();
                $('.dropdown-menu-item').show();
                $('.sub-menu').show();
                $('.header-top-bar').show();
            } else {
                if (isMenuOpen) {
                    $('.main-menu-content').show();
                    $('.dropdown-menu-item').show();
                    $('.sub-menu').show();
                    $('.header-top-bar').show();
                } else {
                    $('.main-menu-content').hide();
                    $('.dropdown-menu-item').hide();
                    $('.sub-menu').hide();
                    $('.header-top-bar').hide();
                }
            }
        });

        /*=========== Navbar offset top ============*/
        if ($(topNav).length) {
            var topOfNav = topNav.offsetTop;
        }

        $window.on('scroll', function () {

            if ($window.scrollTop() >= topOfNav) {
                document.body.style.paddingTop = topNav.offsetHeight + 'px';
                document.body.classList.add('fixed-nav');
            }
            else {
                document.body.style.paddingTop = '0px';
                document.body.classList.remove('fixed-nav');
            }

            //back to top button control
            if ($window.scrollTop() > 500) {
                $(scrollTopBtn).addClass('active');
            } else {
                $(scrollTopBtn).removeClass('active');
            }

            //page scroll position
            findPosition();

        });

        /*========== Page scroll ==========*/

        scrollLink.on('click', function (e) {
            var target = $($(this).attr('href'));

            $($dom).animate({
                scrollTop: target.offset().top
            }, 600);

            $(this).addClass('active');

            e.preventDefault();
        });

        function findPosition() {
            $('.page-scroll').each(function () {
                if (($(this).offset().top - $(window).scrollTop()) < 20) {
                    scrollLink.removeClass('active');
                    $('#single-content-nav').find('[data-scroll="' + $(this).attr('id') + '"]').addClass('active');
                }
            });
        }

        /*===== Back to top button ======*/
        $document.on("click", "#back-to-top", function () {
            $($dom).animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        /*==== Hotel-card-carousel =====*/
        if ($(hotelCardCarousel).length) {
            $(hotelCardCarousel).owlCarousel({
                loop: true,
                items: 4,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                active: true,
                margin: 30,
                navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>'],
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 991 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 3
                    },
                    // breakpoint from 1441 up
                    1441: {
                        items: 4
                    }
                }
            });
        }

        /*==== Hotel-card-carousel 2 =====*/
        if ($(hotelCardCarouselTwo).length) {
            $(hotelCardCarouselTwo).owlCarousel({
                loop: true,
                items: 3,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                active: true,
                margin: 30,
                navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>'],
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 991 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 3
                    },
                }
            });
        }

        /*==== card-img-carousel =====*/
        if ($(cardImgCarousel).length) {
            $(cardImgCarousel).owlCarousel({
                loop: true,
                items: 1,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                autoHeight: true,
                active: true,
                margin: 30,
                navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>']
            });
        }

        /*==== Car-carousel =====*/
        if ($(carCarousel).length) {
            $(carCarousel).owlCarousel({
                loop: true,
                items: 3,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                active: true,
                margin: 30,
                navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>'],
                responsive: {
                    // breakpoint from 167 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 768 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 3
                    }
                }
            });
        }

        /*==== Trending-carousel =====*/
        if ($(trendingCarousel).length) {
            $(trendingCarousel).owlCarousel({
                loop: true,
                items: 3,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                margin: 30,
                navText: ['<i class="la la-long-arrow-left"></i>', '<i class="la la-long-arrow-right"></i>'],
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 768 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 3
                    }
                }
            });
        }

        /*==== Gallery-carousel =====*/
        if ($(galleryCarousel).length) {
            $(galleryCarousel).owlCarousel({
                loop: true,
                items: 1,
                nav: true,
                dots: true,
                smartSpeed: 700,
                margin: 20,
                navText: ['<i class="la la-long-arrow-left"></i>', '<i class="la la-long-arrow-right"></i>']
            });
        }

        /*==== Client logo =====*/
        if ($(clientCarousel).length) {
            $(clientCarousel).owlCarousel({
                loop: true,
                items: 6,
                nav: false,
                dots: false,
                smartSpeed: 700,
                autoplay: true,
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 425 up
                    425: {
                        items: 2
                    },
                    // breakpoint from 480 up
                    480: {
                        items: 2
                    },
                    // breakpoint from 767 up
                    767: {
                        items: 4
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 6
                    }
                }
            });
        }

        /*==== testimonial-carousel =====*/
        if ($(testimonialCarousel).length) {
            $(testimonialCarousel).owlCarousel({
                loop: true,
                items: 2,
                nav: true,
                dots: false,
                smartSpeed: 700,
                autoplay: false,
                margin: 30,
                navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>'],
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 900 up
                    900: {
                        items: 2
                    }

                }
            });
        }

        /*==== testimonial-carousel-2 =====*/
        if ($(testimonialCarouselTwo).length) {
            $(testimonialCarouselTwo).owlCarousel({
                loop: true,
                items: 3,
                nav: true,
                dots: true,
                smartSpeed: 700,
                autoplay: false,
                margin: 30,
                navText: ['<i class="la la-long-arrow-left"></i>', '<i class="la la-long-arrow-right"></i>'],
                responsive: {
                    // breakpoint from 0 up
                    0: {
                        items: 1
                    },
                    // breakpoint from 768 up
                    768: {
                        items: 2
                    },
                    // breakpoint from 992 up
                    992: {
                        items: 3
                    }
                }
            });
        }

        /*==== Fancybox for video =====*/
        if ($(fancyVideo).length) {
            $(fancyVideo).fancybox({
                buttons: [
                    "share",
                    "fullScreen",
                    "close"
                ]
            });
        }

        /*==== Fancybox for gallery =====*/
        if ($(fancyGallery).length) {
            $(fancyGallery).fancybox({
                buttons: [
                    "share",
                    "slideShow",
                    "fullScreen",
                    "download",
                    "thumbs",
                    "close"
                ]
            });
        }

        /*====  Ripple-bg =====*/
        if ($(rippleBg).length) {
            $(rippleBg).ripples({
                resolution: 500,
                dropRadius: 20,
                perturbance: 0
            });
        }

        if ($(masonryGrid).length) {
            $(masonryGrid).masonry({});
        }

        /*======= ui price range slider ========*/
        if ($(rangeSlider).length) {
            $(rangeSlider).slider({
                range: true,
                min: 0,
                max: 1000,
                values: [40, 800],
                slide: function (event, ui) {
                    $(rangeSliderAmount).val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
        }
        $(rangeSliderAmount).val("$" + $(rangeSlider).slider("values", 0) +
            " - $" + $(rangeSlider).slider("values", 1));

        /*======= ui price range slider 2 ========*/
        if ($(rangeSliderTwo).length) {
            $(rangeSliderTwo).slider({
                range: true,
                min: 0,
                max: 1000,
                values: [40, 800],
                slide: function (event, ui) {
                    $(rangeSliderAmountTwo).val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
        }

        $(rangeSliderAmountTwo).val("$" + $(rangeSliderTwo).slider("values", 0) +
            " - $" + $(rangeSliderTwo).slider("values", 1));


        /*==== Daterangepicker =====*/
        if ($(dateRangePicker).length) {
            $(dateRangePicker).daterangepicker({
                opens: 'right',
                locale: {
                    format: 'DD/MM/YYYY',
                }
            });
        }

        /*==== Daterangepicker =====*/
        if ($($dateRangePickerTwo).length) {
            $dateRangePickerTwo.daterangepicker({
                singleDatePicker: true,
                opens: 'right',
                minDate: new Date,
            });
        }

        /*==== Bootstrap select picker =====*/
        if ($(bootstrapSelectMenu).length) {
            $(bootstrapSelectMenu).selectpicker({
                liveSearch: true,
                liveSearchPlaceholder: 'Search',
                liveSearchStyle: 'contains',
                size: 5
            });
        }

        /*==== counter =====*/
        if (numberCounter.length) {
            numberCounter.countTo({
                speed: 1200
            });
        }

        /*==== Bootstrap tooltip =====*/
        if ($('[data-toggle="tooltip"]').length) {
            $('[data-toggle="tooltip"]').tooltip();
        }

        /*==== When you will click the add another flight btn then this action will be work =====*/
        $document.on('click', '.add-flight-btn', function () {

            if ($('.multi-flight-field').length < 3) {
                $('.multi-flight-field:last').clone().insertAfter('.multi-flight-field:last');
            }

            $(this).closest('.multi-flight-wrap').find('.multi-flight-field:last').children('.multi-flight-delete-wrap').show();

            $('.date-multi-picker').daterangepicker('destroy');

            var i = 0;
            $('.date-multi-picker').each(function () {
                var $this = $(this);
                $this.attr('id', 'date' + i).daterangepicker({
                    singleDatePicker: true,
                    opens: 'right',
                    local: {
                        format: 'DD/MM/YYYY'
                    }
                });
                i++;
            });

        });

        /*=========== multi-flight-remove ============*/
        $document.on('click', '.multi-flight-remove', function () {
            $('.multi-flight-remove').closest('.multi-flight-wrap').find('.multi-flight-field').not(':first').last().remove();
        });

        /*====  mobile dropdown menu  =====*/
        $document.on('click', '.toggle-menu > li .toggle-menu-icon', function (e) {
            e.preventDefault();
            $(this).closest('li').siblings().removeClass('active').find('.toggle-drop-menu, .dropdown-menu-item').slideUp(200);
            $(this).closest('li').toggleClass('active').find('.toggle-drop-menu, .dropdown-menu-item').slideToggle(200);
            return false;
        });

        /*====== Dropdown btn ======*/
        $('.dropdown-btn').on('click', function (e) {
            e.preventDefault();
            $(this).next('.dropdown-menu-wrap').slideToggle(300);
            e.stopPropagation();
        });

        /*====== When you click on the out side of dropdown menu item then its will be hide ======*/
        $document.on('click', function (event) {
            var $trigger = $('.dropdown-contain');
            if ($trigger !== event.target && !$trigger.has(event.target).length) {
                $('.dropdown-menu-wrap').slideUp(300);
            }
        });

        $('.progressbar-line').each(function () {
            $(this).find('.progressbar-line-item').animate({
                width: $(this).attr('data-percent')
            }, 6000);
        });

        if ($(fullWidthSlider).length) {
            $(fullWidthSlider).owlCarousel({
                center: true,
                items: 2,
                nav: true,
                dots: false,
                loop: true,
                margin: 10,
                smartSpeed: 500,
                navText: ['<i class="la la-long-arrow-left"></i>', '<i class="la la-long-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        autoplay: true
                    },
                    576: {
                        items: 2
                    }
                }
            });
        }

        /*======= Recommended tag =======*/
        $document.on('click', '.recommended-tag', function () {
            $(this).addClass('active');
            $('.undo-btn').addClass('active');
            $(this).siblings().removeClass('active');
        });

        /*======= Undo btn =======*/
        $document.on('click', '.undo-btn', function () {
            $(this).removeClass('active');
            $('.recommended-tag').removeClass('active');
        });

        /*======= paste-btn =======*/
        $document.on('click', '.paste-btn', function (e) {
            e.preventDefault();
            $('#resume_text').toggle();
        });

        /*======= isotope =======*/
        $('.blog-masonry').isotope({
            itemSelector: '.blog-masonry .blog-item-isotope',
            percentPosition: true,
            masonry: {
                columnWidth: '.blog-masonry .blog-item-isotope'
            }
        });




        /* Review Rate Stars */
        $('.review-form .review-items .rates > i').each(function () {
            var list = $(this).parent(),
                listItems = list.children(),
                itemIndex = $(this).index(),
                parentItem = list.parent();
            $(this).hover(function () {
                for (var i = 0; i < listItems.length; i++) {
                    if (i <= itemIndex) {
                        $(listItems[i]).addClass('hovered');
                    } else {
                        break;
                    }
                }
                $(this).click(function () {
                    for (var i = 0; i < listItems.length; i++) {
                        if (i <= itemIndex) {
                            $(listItems[i]).addClass('selected');
                        } else {
                            $(listItems[i]).removeClass('selected');
                        }
                    }
                    ;
                    parentItem.children('.ts_review_stats').val(itemIndex + 1);
                });
            }, function () {
                listItems.removeClass('hovered');
            });
        });


        //Button Like Review
        $('.ts-like-review').click(function (e) {
            e.preventDefault();
            var me = $(this);
            var comment_id = me.data('id');
            $.ajax({
                url: ts_params.ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'like_review',
                    comment_ID: comment_id
                },
                success: function (res) {
                    if (res.status) {
                        // $('i', me).toggleClass('la-thumbs-o-up la-thumbs-o-down');
                        $(me).toggleClass('comment-like comment-dislike');
                        if (typeof res.data.like_count != undefined) {
                            res.data.like_count = parseInt(res.data.like_count);
                            me.find('span.like-count').html(res.data.like_count);
                        }
                    }
                }
            });
        });

        var body = $('body');
        body.on('click', '.btn-show-price', function (ev) {
            ev.preventDefault();
            $('.form-check-availability-hotel', body).trigger('submit');
        });





        /* Price range */
        function format_money($money) {
            // if (!$money) {
            //     return ts_params.free_text;
            // }

            $money = ts_number_format($money, ts_params.booking_currency_precision, ts_params.decimal_separator, ts_params.thousand_separator);
            var $symbol = ts_params.currency_symbol;
            var $money_string = '';

            switch (ts_params.currency_position) {
                case "right":
                    $money_string = $money + $symbol;
                    break;
                case "left_space":
                    $money_string = $symbol + " " + $money;
                    break;

                case "right_space":
                    $money_string = $money + " " + $symbol;
                    break;
                case "left":
                default:
                    $money_string = $symbol + $money;
                    break;
            }

            return $money_string;
        }
        function ts_number_format(number, decimals, dec_point, thousands_sep) {
            number = (number + '')
                .replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + (Math.round(n * k) / k)
                        .toFixed(prec);
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
                .split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '')
                .length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1)
                    .join('0');
            }
            return s.join(dec);
        }
        $(".price_range").each(function () {
            var t = $(this);
            var min = $(this).data('min');
            var max = $(this).data('max');
            var step = $(this).data('step');
            var value = $(this).val();
            var from = value.split(';');
            var prefix_symbol = $(this).data('symbol');
            var to = from[1];
            from = from[0];
            $(this).ionRangeSlider({
                min: min,
                max: max,
                type: 'double',
                prefix: prefix_symbol,
                prettify: false,
                step: step,
                onFinish: function (data) {
                    t.trigger('ts_ranger_price_change');
                    set_price_range_val(data, $('input[name="price_range"]'));
                    format_price_price_ranger(data);
                },
                from: from,
                to: to,
                force_edges: true,
            });
        });
        var rangeContainer = $('.sidebar-item.range-slider');
        function format_price_price_ranger(data) {


            var min = rangeContainer.find('.price_range').data('min');
            var max = rangeContainer.find('.price_range').data('max');
            var convert_price_min = data.from;
            var convert_price_max = data.to;
            rangeContainer.find('.irs-from').text(convert_price_min);
            rangeContainer.find('.irs-to').text(convert_price_max);

        }

        function set_price_range_val(data, element) {
            var exchange = 1;
            var from = Math.round(parseInt(data.from) / exchange);
            var to = Math.round(parseInt(data.to) / exchange);
            var text = from + ";" + to;
            element.val(text);
        }



        /* Taxonomy advance search */
        var advFacilities = [];
        $('.taxonomy-advance-search input[type="checkbox"]').each(function () {
            var t = $(this);
            if (t.is(':checked')) {
                advFacilities.push(t.val());
            }
        });
        $('.taxonomy-advance-search input[type="checkbox"]').change(function () {
            var t = $(this);
            if (t.is(':checked')) {
                advFacilities.push(t.val());
            } else {
                var index = advFacilities.indexOf(t.val());
                if (index > -1) {
                    advFacilities.splice(index, 1);
                }
            }
            t.closest('.taxonomy-advance-search').find('.data_taxonomy').val(advFacilities.join(','));
        });
    });

})(jQuery);