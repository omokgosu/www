$(document).ready(()=>{
    //캐릭터 ul li 그레이스케일 변경

    $('.character ul li').on('mouseover',function(){
        $(this).addClass('on');
    });
    $('.character ul li').on('mouseleave',function(){
        $(this).removeClass('on');
    })
});