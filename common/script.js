$(document).ready(function() {
    // Hover function
//                                  //
//             U R L ' S            //
//                                  //
    $('.home').click(function(){
        window.location = 'index.php';
    });
    $('.order').click(function(){
        window.location = 'order.php';
    });
    $('.about').click(function(){
        window.location = 'about.php';
    });
    $('.contact').click(function(){
        window.location = 'contact.php';
    });
    $('.menu').click(function(){
        window.location = 'order.php';
    });
//                                  //
//        A N I M A T I O N S       //
//                                  //

    $('.product').mouseover(function() {
        $(this).find('.add-to-cart').addClass('cart-hover');
    });
    $('.product').mouseout(function() {
        $(this).find('.add-to-cart').removeClass('cart-hover');
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