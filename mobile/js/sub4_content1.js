$(document).ready(function(){
  var navTabBtn = document.querySelector('.nav_Tab');
  var header = document.querySelector('#headerArea');
  var gnb = document.querySelector('#gnb');
  var tabCnt = 0;
  navTabBtn.addEventListener('click',function(){
      tabCnt++;
      if(tabCnt%2==0){
          header.classList.remove('tab');
          gnb.style.left = '100%'
      }else{
          header.classList.add('tab');
          gnb.style.left = 0;
      }
  });
  //nav Tab 3depth
  $('#gnb .nav_link h3').on('click',function(){
      if($(this).hasClass('close')){
          $('#gnb .nav_link h3').next().stop().slideUp(200);
          $('#gnb .nav_link h3').addClass('close');
          $(this).removeClass('close').addClass('open');
          $(this).next().stop().slideDown(200);
      }else{
          $(this).next().stop().slideUp(200);
          $(this).addClass('close').removeClass('open');
      }
  });

   // 푸터 패밀리 사이트
var upDown = false;
$('.family > a').on('click',function(e){
  e.preventDefault();
  if(upDown==false){
      $(this).next().slideDown('fast');
      upDown=true;
      $(this).addClass('up');
  }else{
      $(this).next().slideUp('fast');
      upDown=false;
      $(this).removeClass('up');
  }
});

// 맨위로 자동스크롤
$('.topMove').click(function(e){
  e.preventDefault();
  $("html,body").stop().animate({"scrollTop":0},1000);
});
//안보였다가 생기기
$(window).on('scroll',function(){
  var topMove_scroll = $(window).scrollTop(); 
  var content = $('#content').offset().top;

  if(topMove_scroll>content){
      $('.topMove').show();
  }else{
      $('.topMove').hide();
  }
});
});