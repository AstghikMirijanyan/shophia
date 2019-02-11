$(document).ready(function () {
    $('.slickslider').slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        fade: true,
        cssEase: 'linear',
        arrows: true,
        accessibility: false,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
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
    $('.fromSlider .text-block').each(function (index) {
        if ($(this).hasClass('active') && index != length) {
            $(this).removeClass('active').fadeOut(1000).next('.text-block').addClass('active').fadeIn(1000);
            return false;
        } else if (index == length) {
            $(this).removeClass('active').fadeOut(1000);
            $('.fromSlider .text-block').eq(0).addClass('active').fadeIn(1000);
            return false;
        }
    });
};


$(".cart_btn").click(function () {
    $(".header-cart").toggle(300);
});


$(".btn_search").click(function () {
    if ($('.search_input.active').length && $(".search_input").val() !== '') {
        $(this).closest('form').submit();
    } else {
        $(".search_input").toggleClass("active").focus;
        $(this).toggleClass("animate");
        $(".search_input").val("");
    }
});

// function addCart(id){
//
//     $('.shopping_cart').modal();
// }


$('.brand_carousel').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
});

function showCart(cart) {
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}

function getCart() {
    $.ajax({
        url: 'carts/cart/show',
        type: 'GET',
        success: function (res) {
            if (!res) {
                alert("ERROR");
            }
            showCart(res);
        },
        error: function () {
            alert('No Cart');
        }

    });
}

$('#cart .modal-body').on('click', '.del-item', function () {
    var id = $(this).attr('data-id');
    $.ajax({
        url: 'carts/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) {
                alert('no shuch this product');
            }
            showCart(res);
        },
        error: function () {
            alert('ERROR');
        }
    })
});


function clearCart() {
    $.ajax({
        url: 'carts/cart/clear',
        type: 'GET',
        success: function (res) {
            if (!res) {
                alert('no such this product');
            }
            showCart(res);
        },
        error: function () {
            alert('ERROR');
        }
    });
}


$('.add_cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data_id');
    $.ajax({
        url: 'carts/cart/add',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) {
                alert('no such this product');

            }
            showCart(res);

        },
        error: function () {
            alert('ERROR');
        }
    })
});