$(document).ready(function(){
    var screenSize = $(window).width(); //스크린의 너비
    var screenHeight = $(window).height();  //스크린의 높이
    
    $('.down').click(function(){
        screenHeight = $(window).height();
        $('html,body').animate({'scrollTop':screenHeight}, 1000);
    });
    
    //네비 클릭 이벤트
    let backonoff = false;
    var scrollTrue = false;
     $(".tab_nav").click(function() {
      if($(this).hasClass('on')){
        $("#gnb").animate({right:'-100vw',opacity:0,display:'none'}, 'fast').clearQueue();
        $(this).removeClass('on');
        scrollTrue = false;
        $('#headerArea').css('background','rgba(0,0,0,0)');
        if(backonoff==true)$('#headerArea').css('background','rgba(0,0,0,.6)');
      }else{
        $("#gnb").animate({right:0,opacity:1}, 'fast').clearQueue();
        $(this).addClass('on');
        $('#headerArea').css('background','rgba(0,0,0,.6)');
        scrollTrue = true;
      }
    });
     
     
     var navCurrent=0;
     $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
        var screenSize = $(window).width(); 
        if( screenSize > 1280){
          navCurrent=1;
          $("#gnb").css({right:0,opacity:1});
          $('.tab_nav').removeClass('on');
          $('#headerArea').css('background','rgba(0,0,0,0)');
          if(backonoff==true)$('#headerArea').css('background','rgba(0,0,0,.6)');
          scrollTrue= false;
        }else if(navCurrent==1 && screenSize < 1280){
          $("#gnb").css({right:'-100vw',opacity:0});
          navCurrent=0;
        }
      });
    
      //콘텐츠 영역갔을때 헤더 색 바꾸기
      $(window).on('scroll',function(){
        var topScroll = $(window).scrollTop();
        if(screenHeight<topScroll){
          $('#headerArea').css('background','rgba(0,0,0,.6)');
          backonoff=true;
        }else{
          backonoff=false;
         if(scrollTrue==false){
          $('#headerArea').css('background','none');
         }
        }
      });
    
      // 탑 무브
      $('.topMove').click(function(e){
        e.preventDefault();
        $("html,body").stop().animate({"scrollTop":0},1000);
     })
})