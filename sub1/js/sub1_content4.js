$(document).ready(function(){

    $('.click1').addClass('current');

    $('.tabMenu li a').click(function(e){
        e.preventDefault();
        
        if($(this).hasClass('click1')){
            $('.click1').addClass('current');
            $('.click2').removeClass('current');
            $('#grid').animate({left: 0}).clearQueue();
            $('#symbolColor').animate({left: 1200}).clearQueue();
        }else if($(this).hasClass('click2')){
            $('.click1').removeClass('current');
            $('.click2').addClass('current');
            $('#grid').animate({left: -1200}).clearQueue();
            $('#symbolColor').animate({left: 0}).clearQueue();
        }
    })
})