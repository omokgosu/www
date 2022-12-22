$(document).ready(function(){

    //스크롤 시 연혁 스티키 메뉴
    
    var year1 = $('.contentArea > ul li:eq(0)').offset().top;
    var year2 = $('.contentArea > ul li:eq(1)').offset().top;
    var year3 = $('.contentArea > ul li:eq(2)').offset().top;
    var year4 = $('.contentArea > ul li:eq(3)').offset().top;
    
    $(window).on('scroll',function(){
        $('.text').text(sticky_scroll);
        var sticky_scroll = $(window).scrollTop();
    var scroll_move = $('.titleArea p:eq(0)').offset().top+135;
    var year_cnt = 0;
        if(sticky_scroll>scroll_move){
            $('.contentArea > div').addClass('topFix');
            $('#headerArea').hide();
        }else{
            $('.contentArea > div').removeClass('topFix');
            $('#headerArea').show();
        }

        $('.moveMenu a').removeClass('chkd');

        if(sticky_scroll>=year1 && sticky_scroll<year2){
            year_cnt = 0;
        }else if(sticky_scroll>=year2 && sticky_scroll<year3){
            year_cnt = 1;
        }else if(sticky_scroll>=year3 && sticky_scroll<year4){
            year_cnt = 2;
        }else if(sticky_scroll>=year4){
            year_cnt = 3;
        }
        $('.moveMenu li:eq('+year_cnt+')').children('a').addClass('chkd')
    })
    
    //클릭 시 스르륵 해당 연도로 이동
    $('.moveMenu a').click(function(e){
        e.preventDefault();
        
        var value=0;

        if($(this).hasClass('link1')){
            value = year1
        }else if($(this).hasClass('link2')){
            value = year2
        }else if($(this).hasClass('link3')){
            value = year3
        }else if($(this).hasClass('link4')){
            value = year4
        }

        $('html , body').stop().animate({"scrollTop":value},1000);
    })
})