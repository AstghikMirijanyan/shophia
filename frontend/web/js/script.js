
   $(document).ready(function(){
       $('.slickslider').slick({
           dots: true,
           slidesToShow: 1,
           slidesToScroll: 1,
           autoplay: true,
           autoplaySpeed: 2000,
           fade: true,
           cssEase: 'linear',
           arrows: true,
           prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
           nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
       });
   });


   $(window).on('load', function () {
       $preloader = $('.loaderArea');
           $loader = $preloader.find('.loader');
       $loader.fadeOut();
       $preloader.delay(350).fadeOut('slow');
   });



   $('.fromSlider .text-block').eq(0).addClass('active').fadeIn(1000);

   setInterval('blockAnimate();', 4000);

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




   $(".cart_btn").click(function(){
       $(".header-cart").toggle(300);
   });


   $(".btn_search").click(function(){
       $(".search_input").toggleClass("active").focus;
       $(this).toggleClass("animate");
       $(".search_input").val("");
   });


