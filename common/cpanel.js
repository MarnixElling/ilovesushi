$(document).ready(function() {
    // Account hover //
    $('.account').mouseenter(function() {
        $('.account').addClass('grow');
        $('.product').addClass('next');
        $('.delivery').addClass('shrink');
        $('.staff').addClass('shrink');
    });
    $('.account').mouseleave(function() {
        $('.account').removeClass('grow');
        $('.product').removeClass('next');
        $('.delivery').removeClass('shrink');
        $('.staff').removeClass('shrink');
    });
    // Product hover //
    $('.product').mouseenter(function() {
        $('.account').addClass('next');
        $('.product').addClass('grow');
        $('.delivery').addClass('shrink');
        $('.staff').addClass('shrink');
    });
    $('.product').mouseleave(function() {
        $('.account').removeClass('next');
        $('.product').removeClass('grow');
        $('.delivery').removeClass('shrink');
        $('.staff').removeClass('shrink');
    });
    // Delivery hover //
    $('.delivery').mouseenter(function() {
        $('.account').addClass('shrink');
        $('.product').addClass('shrink');
        $('.delivery').addClass('grow');
        $('.staff').addClass('next');
    });
    $('.delivery').mouseleave(function() {
        $('.account').removeClass('shrink');
        $('.product').removeClass('shrink');
        $('.delivery').removeClass('grow');
        $('.staff').removeClass('next');
    });
    // Staff hover //
    $('.staff').mouseenter(function() {
        $('.account').addClass('shrink');
        $('.product').addClass('shrink');
        $('.delivery').addClass('next');
        $('.staff').addClass('grow');
    });
    $('.staff').mouseleave(function() {
        $('.account').removeClass('shrink');
        $('.product').removeClass('shrink');
        $('.delivery').removeClass('next');
        $('.staff').removeClass('grow');
    });
    // Back hover //
    $('.back-cpanel').mouseenter(function() {
        $('.back-cpanel').addClass('grow');
        $('.roster').addClass('next');
        $('.staff2').addClass('shrink');
    });
    $('.back-cpanel').mouseleave(function() {
        $('.back-cpanel').removeClass('grow');
        $('.roster').removeClass('next');
        $('.staff2').removeClass('shrink');
    });
    // Alt Staff hover //
    $('.staff2').mouseenter(function() {
        $('.back-cpanel').addClass('shrink');
        $('.roster').addClass('shrink');
        $('.staff2').addClass('grow');
    });
    $('.staff2').mouseleave(function() {
        $('.back-cpanel').removeClass('shrink');
        $('.roster').removeClass('shrink');
        $('.staff2').removeClass('grow');
    });
    // Roster hover //
    $('.roster').mouseenter(function() {
        $('.back-cpanel').addClass('next');
        $('.roster').addClass('grow');
        $('.staff2').addClass('shrink');
    });
    $('.roster').mouseleave(function() {
        $('.back-cpanel').removeClass('next');
        $('.roster').removeClass('grow');
        $('.staff2').removeClass('shrink');
    });
    // Logout hover //
    $('.signout').mouseenter(function() {
        $('.signout').addClass('grow');
        $('.roster2').addClass('next');
    });
    $('.signout').mouseleave(function() {
        $('.signout').removeClass('grow');
        $('.roster2').removeClass('next');
    });
    // Roster 2 hover //
    $('.roster2').mouseenter(function() {
        $('.signout').addClass('next');
        $('.roster2').addClass('grow');
    });
    $('.roster2').mouseleave(function() {
        $('.signout').removeClass('next');
        $('.roster2').removeClass('grow');
    });

    // URL's //
    $('.account').click(function(){
        window.location = 'signup.php';
    });
    $('.product').click(function(){
        window.location = 'product_control.php';
    });
    $('.delivery').click(function(){
        window.location = 'delivery.php';
    });
    $('.staff2').click(function(){
        window.location = 'staff.php';
    });
    $('.roster').click(function(){
        window.location = 'https://calendar.google.com/calendar/b/4/r?cid=zeist.ilovesushi@gmail.com';
    });
    $('.roster2').click(function(){
        window.location = 'roster.php';
    });
    // Alt managers //
    $('.staff').click(function(){
        $('.main-managers').toggle();
        $('.alt-managers').toggle();
    });
    $('.back-cpanel').click(function(){
        $('.main-managers').toggle();
        $('.alt-managers').toggle();
    });
});