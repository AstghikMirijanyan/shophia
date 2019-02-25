$(document).ready(function () {
    $('.slickslider').slick({
        dots: false,
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
    $(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});

    $(".input_class_checkbox").click(function() {
        var id = $(this).attr('data-id');
        var state = this.checked ? 1 : 0;
        $.ajax({
            url: lang+'/wishlist/wishlist/add',
            data: {id: id, state: state},
            type: 'GET',
            success: function (data) {

                window.location.reload();

            },
            error: function () {
            }
        })
    });


    $('.cart_add').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var qty = 1,
            qty = $('#qty').val();
        $.ajax({
            url: 'carts/cart/add',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function (data) {

                showCart(data);

            },
            error: function () {

            }
        })
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


    $('.brand_carousel').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
    });


    $(".checkbox-products").click(function() {
        var id = $(this).attr('data-id');
        var state = this.checked ? 1 : 0;
        $.ajax({
            url:'wishlist/wishlist/add',
            data: {id: id, state: state},
            type: 'GET',
            success: function (data) {
                window.location.reload();

            },
            error: function () {

            }
        })
    });





    function showCart(cart) {
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }



    $('.add_cart').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var qty = 1,
            qty = $('#qty').val();
        $.ajax({
            url: lang+'/carts/cart/add',
            data: {id: id, qty: qty},
            type: 'GET',
            success: function (data) {
                showCart(data);
            },
            error: function () {

            }
        })
    });

    $('.del_wish').on('click',function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: '/wishlist/wishlist/remove',
            data: {id: id},
            type: 'GET',
            success: function (data) {

            },
            error: function () {

            }
        })
    });

$('.content').click(function () {
    $(".header-cart").hide('slide');
});
    window.onscroll = function() {
        $(".header-cart").hide('slide');
        $('.choose_languages').hide();

    };

    $(".wishlist_btn").click(function(){

        $(".header-cart").toggle("slide");

    });

    $('.languages').click(function () {
        $('.choose_languages').toggle();
    });

    $('.fromSlider .text-block').eq(0).addClass('active').fadeIn(2000);

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
new WOW().init();