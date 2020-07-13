$(document).ready(function() {
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
});