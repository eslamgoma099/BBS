(function ($) {
    $(document).ready(function () {
        /*$('.carousel').carousel({
            interval: 2000
        })*/

        var isCarouselPaused = false;

        $(window).on( 'load resize', function() {
            if ( document.documentElement.clientWidth <= 992 ) {
                if (!isCarouselPaused) {
                    $('#carousel-main').carousel({
                        interval: 2500
                    });
                    $('#carousel-main').carousel('cycle');
                    isCarouselPaused = true;
                }
            } else {
                if (isCarouselPaused) {
                    $('#carousel-main').carousel('pause');
                    isCarouselPaused = false;
                }

                $('.dropdawn-menu-block').removeAttr("style");
            };
        });

        $('.dropdawn-menu-block').slideUp();

        var header = $('header'),
            scrollPrev = 0;

        $(window).scroll(function() {
            var scrolled = $(window).scrollTop();



            if ( scrolled && scrolled > scrollPrev ) {
                header.addClass('show-header');
            } else if (scrolled == 0){
                header.removeClass('header-fix show-header');
            } else if (!($(this).scrollTop())){
                $('header').removeClass("header-fix");
            }

            else {
                header.addClass('header-fix show-header');
                header.removeClass('show-header');
            }
            scrollPrev = scrolled;
        });

        function checkWidth() {
            var windowWidth = $('body').innerWidth();

            if(windowWidth > 992){

            }
        }

        $(window).on("resize", function () {

        }).resize();

        var adjust_size = function() {


            var windowWidth = $('body').innerWidth();

            if(windowWidth > 992){
                /* Выплывающее меню */
                $('#navbarNav > ul > li').hover(function(e) {
                    $('header').addClass('hover-nav');
                    clearTimeout($.data(this,'timer'));
                    //$('.dropdawn-menu-block',this).stop(true,true).slideDown(0);
                    $('.bg-menu',this).stop(true,true).slideDown(0);
                    //$('header .bg-menu').stop(true,true).slideDown(0);
                    var height_nav = $('header').outerHeight(true);


                    var height_row = $(this).find('.row').outerHeight(true);

                    /*$('.hover-nav').height(height_nav + height_row + 10);*/
                    $('.bg-menu',this).height(height_nav + height_row + 10);
                }, function () {
                    $.data(this,'timer', setTimeout($.proxy(function() {
                        $('.dropdawn-menu-block',this).stop(true,true).slideUp(0);
                        $('.bg-menu',this).stop(true,true).slideUp(0);
                    }, this), 0));
                    $('header').removeClass('hover-nav');
                    $('header').height(95);
                    $('.bg-menu',this).height(0);
                });


            } else {
                /*$('#navbarNav > ul > li').on("click", function () {
                    $(this).toggleClass('active');
                    $(this).children('.dropdawn-menu-block').slideToggle(500);
                });*/




            }
        };
        adjust_size();
        $(window).resize(adjust_size);

        $("#navbarNav > ul > li").click(function() {
            if ($(window).width() < 992) {
                $(this).toggleClass('active');
                $(this).children('.dropdawn-menu-block').slideToggle(500);
            }
        });

        var wid = $(window).width();
        if (wid < 992) {
            $(function () {
                var location = window.location.href;
                /*var cur_url = '/' + location.split('/')[1].pop();*/
                var cur_url = location.replace(/^.*?:\/\/.*?(?=\/|$)/,'').replace(/#.*$/, '').replace(/\?.*$/, '');
                /*var cur_url = location.replace(/#.*$/, '').replace(/\?.*$/, '');*/
                $('.dropdawn-menu-block .dropdawn-menu li').each(function () {
                    var link = $(this).find('a').attr('href');

                    if (cur_url == link) {
                        $(this).addClass('current');
                        $(this).parents('li').addClass('active');
                        $(this).parents('.dropdawn-menu-block').slideDown();
                    }
                });
            });

        } else {
            $('.dropdawn-menu-block').slideUp();
        }

        $(function () {
            var location = window.location.href;
            var cur_url = location.replace(/^.*?:\/\/.*?(?=\/|$)/,'').replace(/#.*$/, '').replace(/\?.*$/, '');
            $('.footer-menu li').each(function () {
                var link = $(this).find('a').attr('href');

                if (cur_url == link) {
                    $(this).addClass('current');
                }
            });
        });


        $('#navbarNav .dropdawn-menu a').click(function() {
            location.reload();
        });

        $(window).on("resize", checkWidth);

        checkWidth();

        $('.select').select2();

        $(".navbar-toggler").on("click", function () {
            $(this).toggleClass("active");

        });

        $(".select-no-find").select2({containerCssClass : "error", dropdownCssClass: "no-find"});

        var ua = navigator.userAgent.toLowerCase();
        var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
        var isIphone = ua.indexOf("iphone") > -1; //&& ua.indexOf("mobile");
        if(isAndroid) {
            $('.iphone-block').hide();
        }

        if(isIphone) {
            $('.android-block').hide();
        }

        $('[data-toggle="collapse"]').on('click', function() {
            $navMenuCont = $($(this).data('target'));
            $navMenuCont.animate({
                'width': 'toggle'
            }, 550);

        });

        $('.btn-scroll').bind('click', function(e) {
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top
            }, 1000);
            e.preventDefault();
        });

        /*var clicked = "false";

        $('.navbar-btn-menu').click(function(e) {
            e.preventDefault();
            var overflowState = 'auto'

            if (clicked == "false") {
                overflowState = 'hidden';
                clicked = "true";
            } else {
                overflowState = 'auto';
                clicked = "false";
            }
            $('html, body').css('overflow', overflowState);
        });*/

        $('.trading-instruments-page .select-form').on('change', function (e) {
            $(this).parents('.tab-pane').find('.button-variant-menu li a').eq($(this).val()).tab('show');
        });

        const targetElement = document.getElementById("navbarNav");

        $('.collapse').on('shown.bs.collapse', function(e) {
            var height_menu = $(this).outerHeight(true);
            $('.main-wrapper').height(height_menu);
            /*$('body').height(height_menu);*/
            $('.main-menu').height(height_menu);
            /*$('html').attr('style', '');
            $('body').attr('style', '');*/
            $('.main-wrapper').addClass('wrapper-hidden');
            $('.main-wrapper').css('overflow: hidden;');
            $(this).addClass('menu-scroll');
            $('body').addClass('noscroll');
            $(".menu-overlay").fadeIn(300);
            bodyScrollLock.disableBodyScroll(targetElement);
        });

        $('.collapse').on('hidden.bs.collapse', function(e) {
            var height_menu = $(this).outerHeight(true);
            $('.main-wrapper').attr('style', '');
            $('.main-menu').attr('style', '');
            $('.main-wrapper').removeClass('wrapper-hidden');
            $(this).removeClass('menu-scroll');
            /*$('body').attr('style', '');
            $('html').attr('style', '');*/
            $('body').removeClass('noscroll');
            $(".menu-overlay").fadeOut(300);
            bodyScrollLock.enableBodyScroll(targetElement);
        });


        $(".lang-href").on("click", function () {
            var screenHeight = $('.navbar-collapse ul').outerHeight(true);
            var elementCheck = $(this).parents('li').find('.dropdawn-menu-block');
            if (elementCheck.is(':hidden')) {
                $('.navbar-collapse').animate({"scrollTop":screenHeight},'slow');
            }
        });

        /*$('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            initialIndex: '.active',
            watchCSS: true
        });*/

        jQuery(window).scroll(function() {

            if (jQuery(this).scrollTop()>0)
            {
                jQuery('.scroll-icon').addClass('none');
            }
            else
            {
                jQuery('.scroll-icon').removeClass('none');
            }
        });



        $(document).on("click", '.block-traders-top .arrow-show', function () {
            $(this).parent().find('.investors-info-hide').slideToggle(500);
            $(this).parent().toggleClass('active');
            $(this).toggleClass("active");
        });
        $(document).on('click', '.carousel-social .block-traders-top', function () {
            $(this).toggleClass("active");
            $(this).find('.arrow-show').toggleClass('active');
            $(this).find('.investors-info-hide').slideToggle(500);
        });

        $('.carousel-cell').addClass("pageloaded");

        var $carousel = $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            initialIndex: '.active',
            hash: true,
            watchCSS: true
        });
        var flkty = $carousel.data('flickity');

        $carousel.on( 'staticClick.flickity', function( event, pointer, cellElement, cellIndex ) {
            // dismiss if cell was not clicked
            if ( !cellElement ) {
                return;
            }
            // go to next if current cell selected
            if ( cellIndex == flkty.selectedIndex ) {

            } else {
                $carousel.flickity( 'select', cellIndex );
            }
        });

        const loadFont = (url) => {
            // the 'fetch' equivalent has caching issues
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let css = xhr.responseText;
                    css = css.replace(/}/g, 'font-display: swap; }');

                    const head = document.getElementsByTagName('head')[0];
                    const style = document.createElement('style');
                    style.appendChild(document.createTextNode(css));
                    head.appendChild(style);
                }
            };
            xhr.send();
        }

        loadFont('https://fonts.googleapis.com/css?family=Bitter|Montserrat:600');
    });

    lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });

    // lazyLoadCSS("css/select2.min.css", "select2");
    // lazyLoadCSS("css/flickity.min.css", "flickity");
    // lazyLoadCSS("css/jscrollpane.css", "jscrollpane");
})(window.jQuery);