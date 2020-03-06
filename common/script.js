$(document).ready(function() {
    $('.product').mouseover(function() {
        $(this).find(".add-to-cart").addClass('cart-hover');
    });
    $('.product').mouseout(function() {
        $(this).find(".add-to-cart").removeClass('cart-hover');
    });
});