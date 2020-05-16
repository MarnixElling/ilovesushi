$(document).ready(function() {
    // Hover function
//                                  //
//             U R L ' S            //
//                                  //
    $('.home').click(function(){
        window.location = 'index.php';
    });
//                                  //
//   P A G E  I N D I C A T O R S   //
//                                  //
    $('.order').click(function() {
        $('.order').addClass('active-page');
        $('.home, .about, .contact').removeClass('active-page');
        $('.order-page').slideDown({
            start: function () {
              $(this).css({
                display: "flex"
              })
            }
        });
        $('.order-page').removeClass('inactive-page');
        $('.about-page, .contact-page').addClass('inactive-page');
    });
    $('.about').click(function() {
        $('.about').addClass('active-page');
        $('.home, .order, .contact').removeClass('active-page');
        $('.about-page').slideDown({
            start: function () {
              $(this).css({
                display: "flex"
              })
            }
        });
        $('.about-page').removeClass('inactive-page');
        $('.order-page, .contact-page').addClass('inactive-page');
    });
    $('.contact').click(function() {
        $('.contact').addClass('active-page');
        $('.home, .order, .about').removeClass('active-page');
        $('.contact-page').slideDown({
            start: function () {
              $(this).css({
                display: "flex"
              })
            }
        });
        $('.contact-page').removeClass('inactive-page');
        $('.order-page, .about-page').addClass('inactive-page');
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