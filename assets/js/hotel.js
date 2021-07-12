(function ($) {
    var requestRunning = false;
    var xhr;
    var hasFilter = false;

    var data = URLToArrayNew();
    /*Layout*/
    $('.toolbar .layout span.layout-item').on('click', function () {
        if(!$(this).hasClass('active')){
            $(this).parent().find('span').removeClass('active');
            $(this).addClass('active');
            data['layout'] = $(this).data('value');
            ajaxFilterHandler(false);
        }
    });

    /*Sort menu*/
    $('.sort-menu input.service_order').change(function () {
        data['orderby'] = $(this).data('value');
        $(this).closest('.dropdown-menu').slideUp(50);
        ajaxFilterHandler();
    });

    /* Price */
    $('.btn-apply-price-range').on('click', function (e) {
        e.preventDefault();
        data['price_range'] = $(this).parent().find('.price_range').val();
        $(this).closest('.dropdown-menu').slideUp(50);
        data['page'] = 1;
        ajaxFilterHandler();
    });

    function ajaxFilterHandler(loadMap = true){
        if (requestRunning) {
            xhr.abort();
        }

        hasFilter = true;

        $('html, body').css({'overflow': 'auto'});

        if (window.matchMedia('(max-width: 991px)').matches) {
            $('.sidebar-filter').fadeOut();
            $('.top-filter').fadeOut();

            if($('#modern-result-string').length) {
                window.scrollTo({
                    top: $('#modern-result-string').offset().top - 20,
                    behavior: 'smooth'
                });
            }
        }

        $('.filter-loading').show();
        var layout = $('#modern-search-result').data('layout');
        data['format'] = $('#modern-search-result').data('format');
        if($('.modern-search-result-popup').length){
            data['is_popup_map'] = '1';
        }
        data['action'] = 'ts_filter_hotel_ajax';
        data['is_search_page'] = 1;
        data['_s'] = ts_params._s;
        if(typeof  data['page'] == 'undefined'){
            data['page'] = 1;
        }

        var divResult = $('.modern-search-result');
        var divResultString = $('.modern-result-string');
        var divPagination = $('.moderm-pagination');

        divResult.addClass('loading');

        xhr = $.ajax({
            url: ts_params.ajax_url,
            dataType: 'json',
            type: 'get',
            data: data,
            success: function (doc) {
                divResult.each(function () {
                    $(this).html(doc.content);
                });

                divResultString.each(function () {
                    $(this).html(doc.count);
                });

                divPagination.each(function () {
                    $(this).html(doc.pag);
                });

                if($('.modern-search-result-popup').length){
                    $('.modern-search-result-popup').html(doc.content_popup);
                    if($('.col-left-map').length){
                        $('.col-left-map').each(function () {
                            $(this).getNiceScroll().resize();
                        })
                    }
                }

                $('.map-full-height, .full-map-form').each(function () {
                    var t = $(this);
                    var data_map = doc.data_map;
                    if(loadMap && !t.is(':hidden'))
                        initHalfMap(t, data_map.data_map, data_map.map_lat_center, data_map.map_lng_center, '', data_map.map_icon);
                });
            },
            complete: function () {
                divResult.removeClass('loading');
                if($('.modern-search-result-popup').length){
                    $('.map-content-loading').fadeOut();
                }

                var time = 0;
                divResult.find('img').one("load", function() {
                    $(this).addClass('loaded');
                    if(divResult.find('img.loaded').length === divResult.find('img').length) {
                        console.log("All images loaded!");
                        if($('.has-matchHeight').length){
                            $('.has-matchHeight').matchHeight({ remove: true });
                            $('.has-matchHeight').matchHeight();
                        }

                        setTimeout(function () {
                            if($('.page-half-map .col-left').length){
                                $('.page-half-map .col-left').each(function () {
                                    $(this).getNiceScroll().resize();
                                })
                            }
                        }, 205);

                        setTimeout(function () {
                            if ($('.page-half-map .col-left-map').length) {
                                $('.page-half-map .col-left-map').getNiceScroll().resize();
                            }
                        }, 205);
                    }
                });

                requestRunning = false;
            },
        });
        requestRunning = true;
    }
    var resizeMap = 0;
    /*$(document).ready(function () {
        if (window.matchMedia('(min-width: 992px)').matches) {
            ajaxFilterMapHandler();
        }


        $(window).resize(function () {
            if (window.matchMedia('(min-width: 992px)').matches) {
                if(resizeMap == 0){
                    ajaxFilterMapHandler();
                    resizeMap = 1;
                }
                $('html, body').css({'overflow': 'auto'});
            }
        });
    });*/

    /*function ajaxFilterMapHandler(){
        var layout = $('#modern-search-result').data('layout');
        data['action'] = 'ts_filter_hotel_map';
        data['is_search_page'] = 1;
        data['_s'] = ts_params._s;
        if(typeof  data['page'] == 'undefined'){
            data['page'] = 1;
        }
        $('.map-loading').fadeIn();
        $.ajax({
            url: ts_params.ajax_url,
            dataType: 'json',
            type: 'get',
            data: data,
            success: function (doc) {
                $('.map-full-height, .full-map-form').each(function () {
                    console.log(doc);
                    var t = $(this);
                    initHalfMap(t, doc.data_map, doc.map_lat_center, doc.map_lng_center, '', doc.map_icon);
                });
            },
            complete: function () {
                $('.map-loading').fadeOut();
                $('.filter-loading').hide();
                resizeMap = 0;
            },
        });
    }*/

    $(document).ready(function () {
        $(document).on('click', '#btn-clear-filter', function () {
            var arrResetTax = [];
            $('.filter-tax').each(function () {
                if(!Object.keys(arrResetTax).includes($(this).data('type'))){
                    arrResetTax[$(this).data('type')] = [];
                }

                if($(this).is(':checked')){
                    arrResetTax[$(this).data('type')].push($(this).val());
                }
            });

            if(Object.keys(arrResetTax).length){
                for(var i = 0; i < Object.keys(arrResetTax).length; i++){
                    if(typeof data['taxonomy['+ Object.keys(arrResetTax)[i] +']'] != 'undefined'){
                        delete data['taxonomy['+ Object.keys(arrResetTax)[i] +']'];
                    }
                }
            }

            if(typeof data['price_range'] != 'undefined'){
                delete data['price_range'];
                $('input[name="price_range"]').each(function () {
                    var sliderPrice = $(this).data("ionRangeSlider");
                    sliderPrice.reset();
                });
            }

            if(typeof data['star_rate'] != 'undefined'){
                delete data['star_rate'];
            }

            if(typeof data['hotel_rate'] != 'undefined'){
                delete data['hotel_rate'];
            }

            if($('.filter-item').length) {
                $('.filter-item').prop('checked', false);
            }
            if($('.filter-tax').length) {
                $('.filter-tax').prop('checked', false);
            }

            if($('.sort-item').length){
                data['orderby'] = '';
                $('.sort-item').find('input').prop('checked', false);
            }

            ajaxFilterHandler();

        });
    });

    function checkClearFilter(){
        if(((typeof data['price_range'] != 'undefined' && data['price_range'].length) || (typeof data['star_rate'] != 'undefined' && data['star_rate'].length ) || (typeof data['hotel_rate'] != 'undefined' && data['hotel_rate'].length ) || (typeof data['taxonomy[hotel_facilities]'] != 'undefined' && data['taxonomy[hotel_facilities]'].length ) || (typeof data['taxonomy[hotel_theme]'] != 'undefined' && data['taxonomy[hotel_theme]'].length ) || (typeof data['orderby'] != 'undefined' && data['orderby'] != 'new')) && hasFilter){
            return true;
        }else{
            return false;
        }
    }

    function URLToArrayNew() {
        var res = {};

        $('.toolbar .layout span').each(function () {
            if($(this).hasClass('active')){
                res['layout'] = $(this).data('value');
            }
        });

        res['orderby'] = '';

        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        if(sURLVariables.length){
            for (var i = 0; i < sURLVariables.length; i++){
                var sParameterName = sURLVariables[i].split('=');
                if(sParameterName.length){
                    if(sParameterName.length){
                        let val = decodeURIComponent(sParameterName[1]);
                        res[decodeURIComponent(sParameterName[0])] = val == 'undefined'? '': val;
                    }
                }

            }
        }
        return res;
    }
})(jQuery);
