$(document).ready(function(){
    $(window).on('scroll',function(){
        var scrollTop = $(window).scrollTop();
        var content = $('#content').offset().top-200;
        if(scrollTop>content){
            $('#navbar').addClass('on');
        }else{
            $('#navbar').removeClass('on');
        }
    })
})