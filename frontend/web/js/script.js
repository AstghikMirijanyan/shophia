
   $(document).ready(function(){
       $('.slickslider').slick({
           dots: true,
           slidesToShow: 1,
           slidesToScroll: 1,
           arrows: false,
           autoplay: true,
           autoplaySpeed: 2000,
           fade: true,
           cssEase: 'linear'
       });
   });

   $(window).on('load', function () {
       $preloader = $('.loaderArea'),
           $loader = $preloader.find('.loader');
       $loader.fadeOut();
       $preloader.delay(350).fadeOut('slow');
   });
