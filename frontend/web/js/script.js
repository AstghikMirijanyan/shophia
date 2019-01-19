
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
       $preloader = $('.loaderArea');
           $loader = $preloader.find('.loader');
       $loader.fadeOut();
       $preloader.delay(350).fadeOut('slow');
   });



   $('.fromSlider .text-block').eq(0).addClass('active').fadeIn(1000);

   setInterval('blockAnimate();', 2000);

   function blockAnimate() {
       var length = $('.fromSlider .text-block').length - 1;
       $('.fromSlider .text-block').each(function(index) {
           if($(this).hasClass('active') && index != length) {
               $(this).removeClass('active').fadeOut(1000).next('.text-block').addClass('active').fadeIn(1000);
               return false;
           } else if (index == length) {
               $(this).removeClass('active').fadeOut(1000);
               $('.fromSlider .text-block').eq(0).addClass('active').fadeIn(1000);
               return false;
           }
       });
   };


