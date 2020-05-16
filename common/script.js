$(document).ready(function() {
    // Hover function
    $('.product').mouseover(function() {
        $(this).find(".add-to-cart").addClass('cart-hover');
    });
    $('.product').mouseout(function() {
        $(this).find(".add-to-cart").removeClass('cart-hover');
    });
    // Scroll function
    $(function(){
        var shrinkHeader = 450;
        $(window).scroll(function() {
            var scroll = getCurrentScroll();
            if (scroll > shrinkHeader){
                $('.scroll').addClass('fixed');
                $('.scroll2').addClass('fixed2');
                $('.scroll3').addClass('fixed3');
                $('.scroll4').addClass('fixed4');
            } else if (scroll < shrinkHeader){
                $('.scroll').removeClass('fixed');
                $('.scroll2').removeClass('fixed2');
                $('.scroll3').removeClass('fixed3');
                $('.scroll4').removeClass('fixed4');
            }
        });
    });
    function getCurrentScroll() {
        return window.pageYOffset ||
        document.documentElement.scrollTop;
    }
});