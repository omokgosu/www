$(document).ready(function(){
    var liWidth = $('.back li').width();

    $('.back li').height(liWidth);
    $(window).resize(function(){
        liWidth = $('.back li').width();

        $('.back li').height(liWidth);
    })
});