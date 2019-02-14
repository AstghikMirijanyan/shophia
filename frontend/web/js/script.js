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
    var id = $(this).attr('data_id'),
    qty = $('#qty').val();
    $.ajax({
        url: 'carts/cart/add',
        data: {id: id, qty: qty},
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
//Wishlist function
$('.add-to-wishlist').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    $.ajax({
        url :'wishlist/wishlist/add',
        type:'GET',
        data:{id : id},
        success:function(data){
            $('.popup').html(data);
        }
    })
});




function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});


$('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
});
$('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').slideUp(300);
});
$('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('span').text($(this).text());
    $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
});

var lowerSlider = document.querySelector('#lower');
var  upperSlider = document.querySelector('#upper');

document.querySelector('#two').value=upperSlider.value;
document.querySelector('#one').value=lowerSlider.value;

var  lowerVal = parseInt(lowerSlider.value);
var upperVal = parseInt(upperSlider.value);

upperSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);

    if (upperVal < lowerVal + 4) {
        lowerSlider.value = upperVal - 4;
        if (lowerVal == lowerSlider.min) {
            upperSlider.value = 4;
        }
    }
    document.querySelector('#two').value=this.value
};

lowerSlider.oninput = function () {
    lowerVal = parseInt(lowerSlider.value);
    upperVal = parseInt(upperSlider.value);
    if (lowerVal > upperVal - 4) {
        upperSlider.value = lowerVal + 4;
        if (upperVal == upperSlider.max) {
            lowerSlider.value = parseInt(upperSlider.max) - 4;
        }
    }
    document.querySelector('#one').value=this.value
};

$("#search_note").on("pjax:end", function() {
    $.pjax.reload({
        container:"#notes"
    });
});


new WOW().init();