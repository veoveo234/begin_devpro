$(document).ready(function() {
    var aboveHeight = $('header').outerHeight();
    $(window).scroll(function(){
        if ($(window).scrollTop() > aboveHeight){
        $('.all-content').addClass('fixed');
        $('.list-sub ').hide();
        } else {
       $('.all-content').removeClass('fixed');
       $('.list-sub ').hide();
        }
    });
});