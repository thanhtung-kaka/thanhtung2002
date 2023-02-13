/*--------------*/
        // Main/Product image slider for product page
        $('.main-img-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 4000,
            speed: 300,
            lazyLoad: 'ondemand',
            asNavFor: '.thumb-nav',
            prevArrow: '<div class="slick-prev"><i class="fas fa-angle-left"></i><span class="sr-only sr-only-focusable"><</span></div>',
            nextArrow: '<div class="slick-next"><i class="fas fa-angle-right"></i><span class="sr-only sr-only-focusable">></span></div>'
        });
        // Thumbnail/alternates slider for product page
        $('.thumb-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            centerPadding: '0px',
            asNavFor: '.main-img-slider',
            dots: false,
            centerMode: false,
            draggable: true,
            speed: 200,
            focusOnSelect: true,
            prevArrow: '<div class="slick-prev"><i class="fas fa-angle-left"></i><span class="sr-only sr-only-focusable"><</span></div>',
            nextArrow: '<div class="slick-next"><i class="fas fa-angle-right"></i><span class="sr-only sr-only-focusable">></span></div>'
        });
        //keeps thumbnails active when changing main image, via mouse/touch drag/swipe
        $('.main-img-slider').on('afterChange', function (event, slick, currentSlide, nextSlide) {
            //remove all active class
            $('.thumb-nav .slick-slide').removeClass('slick-current');
            //set active class for current slide
            $('.thumb-nav .slick-slide:not(.slick-cloned)').eq(currentSlide).addClass('slick-current');
        });
//# sourceURL=pen.js