$(document).ready(function(){
    $(window).on('scroll',function(){
        var sub_scroll = $(window).scrollTop();
        var off = [];
        var half= window.innerHeight;
        var off_cnt = Number($('#content').find('.off').length) - 1; // 0부터 index값 뽑기
        for (var i=0; i<=off_cnt; i++){
            off[i] = $('.off:eq('+i+')').offset().top;
            if(sub_scroll > off[i]-(half/2+250)){
                $('.off:eq('+i+')').addClass('onslide');
            } else if(sub_scroll < off[i]-half){
                $('.off:eq('+i+')').removeClass('onslide');
            }
        }
    });
})