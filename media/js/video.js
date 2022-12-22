$(document).ready(function() {
  var screenSize1, screenHeight1;
  var current=false;

  function screen_size(){
      screenSize1 = $(window).width(); //스크린의 너비
      screenHeight1 = $(window).height();  //스크린의 높이

      $("#content").css('margin-top',screenHeight1);
      
      if( screenSize1 > 768 && current==false){
          $("#videoBG").show();
          $("#videoBG").attr('src','./images/Arcane_main_video.mp4');
          $("#imgBG").hide();
          current=true;
        }
      if(screenSize1 <= 768){
          $("#videoBG").hide();
          $("#videoBG").attr('src','');
          $("#imgBG").show();
          current=false;
      }
  }

  screen_size();  //최초 실행시 호출

  $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    screen_size();
}); 
});