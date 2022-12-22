$(document).ready(function(){
    
    var smh = $('.main').height();
    var on_off=false;
    //헤더에 마우스 over 됐을 때 효과 코드
    $('#headerArea').mouseenter(
        function(){
            $(this).addClass('on')
            on_off=true;
        })
    $('#headerArea').mouseleave(
        function(){
            var scroll = $(window).scrollTop();
            if(scroll>=0 && scroll<smh-100){
                $(this).removeClass('on');
            }else if(scroll>smh-100){
                $(this).addClass('on');
            }
            on_off=false;
        })
    //스크롤이 main 넘어갔을때 생기는 코드    
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop(); 

        if(scroll>smh-100){
            $('#headerArea').addClass('on');
        }else{
            if(on_off==false){
            $('#headerArea').removeClass('on');
            }
        };
    });

    //2depth 여는 코드
    $('#gnb>ul').hover(
        function() { 
            $('#gnb ul li ul').fadeIn('normal',function(){$(this).stop();});
            $('#headerArea').animate({height:360},'fast').clearQueue();
        },function() {
            $('#gnb ul li ul').hide();
            $('#headerArea').animate({height:100},'fast').clearQueue();
        });


    //2depth 에 포커스 가는 코드
    $('#gnb li h3 a').on('focus',
        function () {        
        $('#gnb ul li ul').slideDown('normal');
        $('#headerArea').animate({height:360},'fast').clearQueue();
        $('#headerArea').addClass('on');
        });
    $('#gnb li:last-child li:last-child').find('a').on('blur',
        function () {        
        $('#gnb ul li ul').slideUp('fast');
        $('#headerArea').animate({height:100},'normal').clearQueue();
        $('#headerArea').removeClass('on');
    });

    $(window).on('scroll',function(){
        var topMove_scroll = $(window).scrollTop(); 
        var content = $('#content').offset().top;

        if(topMove_scroll>content-200){
            $('.topMove').show();
        }else{
            $('.topMove').hide();
        }
    });

    // 맨위로 스크롤 하는 코드
    $('.topMove').click(function(e){
        e.preventDefault();
        $("html,body").stop().animate({"scrollTop":0},1000);
     });

     // 푸터 패밀리 사이트 야무지게 올리기
     var upDown = false;
     $('.family > a').on('click',
        function(e){
            e.preventDefault();
            if(upDown==false){
            $('.family ul').slideDown(100);
            upDown=true;
            }else if(upDown==true){
                $('.family ul').slideUp(100);
                upDown= false;
            }
        })
     $('body').click(function(e){
        if( !$('.family').has(e.target).length ){
            $('.family ul').slideUp(100);
            upDown=false;
        };
    });

     $('.family > a').on('focus',function(){
        $('.family ul').slideDown(100);
     });
     $('.family ul li:last a').on('blur',function(){
        $('.family ul').slideUp(100);
     });

     
});