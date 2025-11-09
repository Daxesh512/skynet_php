(function ($) {
    'use strict';



    let main_url = $('#main_url').val();

    $(".project-gallery").mixItUp();

    $(".img-popup").magnificPopup({
        type: 'image',
        gallery: {
          enabled: true
        },
    });



    $(window).on('load', function (event) {

        if (mainbs.is_announcement == 1) {
            // trigger announcement banner base on sessionStorage
            let announcement = sessionStorage.getItem('announcement') != null ? false : true;
            // console.log(sessionStorage.getItem('announcement'));
            if (announcement) {
                setTimeout(function () {
                    $('.announcement-banner').trigger('click');
                }, mainbs.announcement_delay * 1000);
            }
        }

    });

    // announcement banner magnific popup
    if (mainbs.is_announcement == 1) {
        $('.announcement-banner').magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            callbacks: {
                open: function () {
                    $.magnificPopup.instance.close = function () {
                        // Do whatever else you need to do here
                        sessionStorage.setItem("announcement", "closed");
                        // console.log(sessionStorage.getItem('announcement'));

                        // Call the original close method to close the announcement
                        $.magnificPopup.proto.close.call(this);
                    };
                }
            }
        });
    }


    // // background video initialization for home 5
    if ($("#bgndVideo").length > 0) {
        $("#bgndVideo").YTPlayer();
    }

    /*-----------------------------
	=== ALL ESSENTIAL FUNCTIONS ===
	------------------------------*/


    //=== 01. Main Menu
    function mainMenu() {
        var menuItems = $('.primary-menu'),
            navContainer = $('.header-navigation'),
            menuContainer = $('.site-nav-menu'),
            navToggler = $('.nav-toggler'),
            closeIcon = $('.nav-close');

        // Adds toggle button to li items that have children
        menuItems.find('li a').each(function () {
            if ($(this).next().length > 0) {
                $(this).parent('li').append('<span class="dd-trigger"><i class="fal fa-plus"></i></span>');
            }
        });

        menuItems.find('li a.p-link').each(function () {
                $(this).append('<span class="dd-trigger2"><i class="fal fa-plus"></i></span>');
        });

        // expands the dropdown menu on each click
        menuItems.find('li .dd-trigger').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('open').parent('li').children('ul').stop(true, true).slideToggle(350);
            $(this).find("i").toggleClass("fa-minus fa-plus");
        });

        // Open menu on toggler click
        navToggler.on('click', function (e) {
            menuContainer.toggleClass('menu-opened');
            e.preventDefault();
            $(this).toggleClass('menu-opened');
        });

        // Close menu on toggler click
        closeIcon.on('click', function (e) {
            menuContainer.removeClass('menu-opened');
            navToggler.removeClass('menu-opened');
            e.preventDefault();
        });

        // check browser width in real-time
        function breakpointCheck() {
            var windoWidth = window.innerWidth;

            if (windoWidth <= 1100) {
                navContainer.addClass('breakpoint-on');
            } else {
                navContainer.removeClass('breakpoint-on');
            }
        }

        breakpointCheck();
        $(window).on('resize', function () {
            breakpointCheck();
        });

        // Search Widget
        var searchBtn = $('.search-icon'),
            searchClose = $('.search-close'),
            searchFrom = $('.search-form');

        searchBtn.on('click', function (e) {
            searchFrom.toggleClass('opened');
            e.preventDefault();
        });

        searchClose.on('click', function (e) {
            searchFrom.removeClass('opened');
            e.preventDefault();
        });

        // One Page Active Class
        var scrollLink = $(".onepage-nav li a");
        $(window).scroll(function () {
            var scrollbarLocation = $(this).scrollTop();
            scrollLink.each(function () {
                var sectionOffset = $(this.hash).offset().top - 90;
                if (sectionOffset <= scrollbarLocation) {
                    $(this).parent().addClass("current");
                    $(this).parent().siblings().removeClass("current");
                }
            });
        });

    }

    //=== 02. Preloader
    function preloader() {
        if ($('#preloader').length) {
            $('#preloader').delay(300).fadeOut(500);
        }
    }

    


    //=== 03. Portfolio Slider
    function portfolioDetailsSlider() {
        $('.portfolio-details-slider').slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
        });
    }

    function portfolioSlider() {
        $('.portfolio-slider-one').slick({
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-long-arrow-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-long-arrow-right"></i></span>',
            speed: 1000,
            slidesToShow: 3,
            slidesToScroll: 1,
            appendArrows: $('.portfolio-arrow'),
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    function portfolioSliderTwo() {
        $('.portfolio-slider-two').slick({
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 1,
            appendArrows: $('.portfolio-arrow-two'),
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    function portfolioSliderThree() {
        $('.portfolio-slider-three').slick({
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-long-arrow-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-long-arrow-right"></i></span>',
            speed: 1000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }



    //=== 04. Team Slider
    function teamSlider2() {
        $('.team_slider').slick({
            dots: false,
            nav: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }
    //=== 04. Team Slider
    function teamSlider() {
        $('.team-slider').slick({
            dots: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            speed: 1000,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    function teamSliderTwo() {
        $('.team-slider-two').slick({
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            speed: 1000,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<span class="prev"><i class="fal fa-long-arrow-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-long-arrow-right"></i></span>',
            appendArrows: $('.team-slider-two-arrow'),
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    //=== 05. Counter
    function counterUp() {
        $('.counter-active').on('inview', function (event, isInView) {
            if (isInView) {
                $(this).find('.counter').each(function () {
                    var $this = $(this);
                    $({
                        Counter: 0
                    }).animate({
                        Counter: $this.text()
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter));
                        },
                    });
                });
                $(this).unbind('inview');
            }
        });
    }

    //=== 06. Testimonials
    function testimonialsSlider() {
        $('.testimonials-slider').slick({
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: false,
            speed: 1000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    }

    function testimonialsSliderTwo() {
        $('.testimonials-slider-two').slick({
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            speed: 1000,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<span class="prev"><i class="fal fa-long-arrow-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-long-arrow-right"></i></span>',
            appendArrows: $('.testimonials-arrow'),
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                }
            }]
        });
    }

    //=== 07. Back to top
    function showBackToTop() {
        var scroll = $(window).scrollTop();

        if (scroll > 600) {
            $('.back-to-top').fadeIn(200)
        } else {
            $('.back-to-top').fadeOut(200)
        }
    }

    function backToTop() {
        $('.back-to-top').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: 0,
            }, 1500);
        });
    }

    //=== 08. Banner slider
    function mainSlider() {
        var slider = $('.banner-slider-active');
        slider.on('init', function (e, slick) {
            var $firstAnimatingElements = $('.single-banner:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        slider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.single-banner[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        slider.slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: true,
            prevArrow: '<span class="prev"><i class="fal fa-angle-left"></i></span>',
            nextArrow: '<span class="next"><i class="fal fa-angle-right"></i></span>',
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function () {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
    }

    //=== 09. Brand Slider
    function brandSlider() {
        $('.brand-slider').slick({
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: false,
            speed: 1000,
            slidesToShow: 5,
            slidesToScroll: 2,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        });
    }


    //=== 11. Product Gallery
    function productGallery() {
        var mainImage = $('.product-main-slider'),
            thumbImage = $('.product-thumb-slider');
        mainImage.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: thumbImage
        });

        thumbImage.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: mainImage,
            dots: false,
            arrows: false,
            focusOnSelect: true
        });
    }

    //=== 12. Video Popup
    function videoPopup() {
        $('.video-popup').magnificPopup({
            type: 'iframe'
        });
    }

    //===== 13. Product quantity
  



    //===== 15. Sticky Header
    function stickyHeader() {
        var sticky = $('header.sticky-header');
        var scrollFromtop = $(window).scrollTop();
        var scrollLimit = $('header').height();

        if (scrollFromtop < scrollLimit) {
            sticky.removeClass('sticky-on');
        } else {
            sticky.addClass('sticky-on');
        }
    }

    //===== 16. Syotimer
    function syotimerActive() {
        $('#simple_timer').syotimer({
            year: 2022,
            month: 5,
            day: 9,
            hour: 20,
            minute: 30,
        });
    }

    /*---------------------
    === DOCUMENT READY  ===
    ----------------------*/
    $(document).ready(function () {
        mainMenu();
        portfolioSlider();
        portfolioSliderTwo();
        portfolioSliderThree();
        portfolioDetailsSlider();
        teamSlider();
        counterUp();
        testimonialsSlider();
        testimonialsSliderTwo();
        mainSlider();
        backToTop();
        brandSlider();
        productGallery();
        videoPopup();
        syotimerActive();
        teamSliderTwo();
        teamSlider2();
    });

    /*--------------------
    === WINDOW SCROLL  ===
    ----------------------*/
    $(window).on('scroll', function () {
        showBackToTop();
        stickyHeader();
    });

    /*------------------
    === WINDOW LOAD  ===
    --------------------*/
    $(window).on('load', function () {
        preloader();

        new WOW().init();
    });

})(jQuery);