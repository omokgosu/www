$(document).ready(function(){
    var filt = $(window).innerWidth();
    if(filt<1006){
        $('#content li div').css('opacity',1);
        $('#content li span').on('mouseleave',function(){
            $(this).prev('div').css('opacity',1);
            $(this).parents().parent('[class*=Inner]').css('background-color','rgba(0,0,0,.3)');
        })
    }else{
        $('#content li span').on('mouseover',function(){
            $(this).prev('div').css('opacity',1);
            $(this).parents().parent('[class*=Inner]').css('background-color','rgba(0,0,0,.8)');
        })
        $('#content li span').on('mouseleave',function(){
            $(this).prev('div').css('opacity',.2);
            $(this).parents().parent('[class*=Inner]').css('background-color','rgba(0,0,0,.3)');
        })
        $('#content li div').css('opacity',.2);
    }
    $(window).resize(function(){
        filt = $(window).innerWidth();
        if(filt<1006){
            $('#content li div').css('opacity',1);
            $('#content li span').on('mouseleave',function(){
                $(this).prev('div').css('opacity',1);
            })
            $('#content li span').on('mouseover',function(){
                $(this).parents().parent('[class*=Inner]').css('background-color','rgba(0,0,0,.3)');
            })
        }else{
            $('#content li span').on('mouseover',function(){
                $(this).prev('div').css('opacity',1);
                $(this).parents().parent('[class*=Inner]').css('background-color','rgba(0,0,0,.8)');
            })
            $('#content li span').on('mouseleave',function(){
                $(this).prev('div').css('opacity',.2);
                $(this).parents().parent('[class*=Inner]').css('background-color','rgba(0,0,0,.3)');
            })
            $('#content li div').css('opacity',.2);
        }
    })
})