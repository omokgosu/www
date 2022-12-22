$(document).ready(function() {

  var timeonoff;   //타이머 처리
  var imageCount=$('.gallery li').size();  //이미지 총개수
  var cnt=1;   //이미지 순서
  var onoff=true; // true=>타이머 동작중 , false=>동작하지 않을때
  
  $('.btn1').addClass('point')
  $('.gallery .link1').fadeIn('slow'); //첫번째 이미지 보인다..
  $('.gallery .link1 p').delay(500).animate({top: 360, opacity: 1},'slow');

  function moveg(){
    if(cnt==imageCount+1)cnt=1;
    if(cnt==imageCount)cnt=0;  //카운트 초기화

    cnt++;  //카운트 1씩 증가.. 5가되면 다시 초기화 0  1 2 3 4 5 1 2 3 4 5..
  
   $('.gallery li').hide(); //모든 이미지를 보이지 않게.
   $('.gallery .link'+cnt).fadeIn('slow'); //자신만 이미지가 보인다..
    $('.mbutton').removeClass('point');
    $('.btn'+cnt).addClass('point');
    
    $('.gallery li p').css('top', 420).css('opacity', 0);
    $('.gallery .link'+cnt).find('p').delay(800).animate({top: 360, opacity: 1},'slow');

     if(cnt==imageCount)cnt=0;  //카운트의 초기화 0
   }
   
  timeonoff= setInterval( moveg , 5000);// 타이머를 동작 1~5이미지를 순서대로 자동 처리
    //var 변수 = setInterval( function(){처리코드} , 4000);  //홍길동의 정보를 담아놓는다
    //clearInterval(변수); -> 살인마/사이코패스/살인청부업자


 $('.mbutton').click(function(event){  //각각의 버튼 클릭시
     var $target=$(event.target); //클릭한 버튼 $target == $(this)
     clearInterval(timeonoff); //타이머 중지     
 
    $('.gallery li').hide(); //모든 이미지 안보인다.

    if($target.is('.btn1')){  //첫번째 버튼 클릭??
       cnt=1;  //클릭한 해당 카운트를 담아놓는다
    }else if($target.is('.btn2')){  //두번째 버튼 클릭??
       cnt=2;
    }else if($target.is('.btn3')){ 
       cnt=3; 
    }
    $('.gallery .link'+cnt).fadeIn('slow');  //자기 자신만 이미지가 보인다
    
    $('.mbutton').removeClass('point')
    $('.btn'+cnt).addClass('point')

    $('.gallery li p').css('top', 420).css('opacity', 0);
    $('.gallery .link'+cnt).find('p').delay(800).animate({top: 360, opacity: 1},'slow');
    
    if(cnt==imageCount)cnt=0;  //카운트 초기화
   
    timeonoff= setInterval( moveg , 5000); //타이머의 부활!!!
   
    if(onoff==false){ //중지상태냐??
          onoff=true; //동작~~
          $('.ps').css('background','url(images/stop.png)');
    }
    
  });



 //stop/play 버튼 클릭시 타이머 동작/중지
$('.ps').click(function(){ 
   if(onoff==true){ // 타이머가 동작 중이냐??
       clearInterval(timeonoff);   //살인마 고용 stop버튼 클릭시
       $(this).html('<i class="fa-solid fa-play"></i><span class="hidden">play</span>'); //js파일에서는 경로의 기준이 html파일이 기준!!
       onoff=false;   
   }else{  // false 타이머가 중지 상태냐??
     timeonoff= setInterval( moveg , 5000); //play버튼 클릭시  부활
     $(this).html('<i class="fa-solid fa-pause"></i><span class="hidden">stop</span>');
     onoff=true; 
   }
  });	

  //왼쪽/오른쪽 버튼 처리
  $('.main .btn').click(function(){

    clearInterval(timeonoff); //살인마

    if($(this).is('.btnRight')){ // 오른쪽 버튼 클릭
        if(cnt==imageCount)cnt=0;  //카운트가 마지막 번호(5)라면 초기화 0
        //if(cnt==imageCount+1)cnt=1;  
        cnt++; //카운트 1씩증가
    }else if($(this).is('.btnLeft')){  //왼쪽 버튼 클릭
        if(cnt==1)cnt=imageCount+1; // 시작하자마 왼쪽누를수있슴 그래서 조건하나더붙임
        if(cnt==0)cnt=imageCount;
        cnt--; //카운트 감소
    }

  $('.gallery li').hide(); //모든 이미지를 보이지 않게.
  $('.gallery .link'+cnt).fadeIn('slow'); //자신만 이미지가 보인다..
                      
  $('.mbutton').removeClass('point')
  $('.btn'+cnt).addClass('point')
  
  $('.gallery li p').css('top', 420).css('opacity', 0);
  $('.gallery .link'+cnt).find('p').delay(800).animate({top: 360, opacity: 1},'slow');
  
  timeonoff= setInterval( moveg , 5000); //부활

  if(onoff==false){
    onoff=true;
    $('.ps').css('background','url(images/stop.png)');
  }
  });


  //business 백그라운드 이미지 변경

  $('.business ul li').mouseenter(function(){
      
      var back_cnt = $(this).index('.business ul li');
      
      if(back_cnt==0){
        $('.business').css({'background':'url(./images/business_back_01.jpg) no-repeat center center'})
      }else if(back_cnt==1){
        $('.business').css({'background':'url(./images/business_back_02.jpg) no-repeat center center'})
      }else if(back_cnt==2){
        $('.business').css({'background':'url(./images/business_back_03.jpg) no-repeat center center'})
      }
  })

  // esg 탭 메뉴
  /*$('.esg ul li:eq(0)').show();

  var esg_cnt = 0;
  $('.prev').click(function(e){
      e.preventDefault();
      esg_cnt--;
      if(esg_cnt==-1)esg_cnt=1;
      $('.esg li').hide();
      $('.esg li:eq('+esg_cnt+')').show();
  })
  $('.next').click(function(e){
    e.preventDefault();
    esg_cnt++
    if(esg_cnt==2)esg_cnt=0;
    $('.esg li').hide()
      $('.esg li:eq('+esg_cnt+')').show();
  })*/
  // esg 탭 메뉴 ajax 버전
  var esgCnt = 0;
  var esgTab=[];
  function esgTabajax(){
    $.ajax({
      method: 'get',
      url: './maindata/main.json',
      dataType: 'json',
      success: function(data){
        esgTab=data.textArea;

        var text ='<div class="textArea">';
        text +='<span>'+esgTab[esgCnt].span+"</span>";
        text += '<h4>'+esgTab[esgCnt].h4+'</h4>';
        text += '<p>'+esgTab[esgCnt].p+'</p>';
        text += '<a href="./sub2/sub2_4.html">view more</a>';
        text +='</div>';
        text += '<img src="'+esgTab[esgCnt].img+'" alt="'+esgTab[esgCnt].alt+'">';

        $('.esg ul li').html(text).hide().show();
      }
    });
  }
  esgTabajax();

  $('.prev').click(function(e){
    e.preventDefault();
    esgCnt--;
    if(esgCnt==-1)esgCnt=1;
    esgTabajax();
})
$('.next').click(function(e){
  e.preventDefault();
  esgCnt++
  if(esgCnt==2)esgCnt=0;
  esgTabajax();
  })


  //news 왼쪽오른쪽 슬라이드 야무지게 만들기

  var newsPosition =-450;
  var movesize =$('.news ul li').width()+60;

  $('.news ul').after($('.news ul').clone());
  $('.newsBtn a:eq(0),.newsBtn a:eq(1)').click(function(e){
    e.preventDefault();
    var newsInd = $(this).index('.newsBtn a');

    if(newsInd==0){
      if(newsPosition==-5070){
        $('.sliedBox').css('left',-1710);
        newsPosition=-1710;
      }
      newsPosition-=movesize;
      $('.sliedBox').stop().animate({left: newsPosition},'fast').clearQueue();
    }else if(newsInd==1){
      if(newsPosition==-450){
        $('.sliedBox').css('left',-3810);
        newsPosition=-3810;
      }
      newsPosition+=movesize;
      $('.sliedBox').stop().animate({left:newsPosition}, 'fast').clearQueue();
    }
    })

    // 각종 스크롤 애니메이션 --> 전체 common 의 sub_scroll 로 업그레이드
    // var service = $('.service').offset().top-600;
    // var business = $('.business').offset().top-600;
    // var esg = $('.esg').offset().top-600;
    // var news = $('.news').offset().top-600;
    // var withoffset = $('.with').offset().top-600;
    // $(window).on('scroll',function(){
    //     var scroll_animation = $(window).scrollTop();

    //     if(scroll_animation>service){
    //       $('.service').addClass('onslide');
    //     }else{
    //       $('.service').removeClass('onslide');
    //     }
    //     if(scroll_animation>business){
    //       $('.business').addClass('onslide');
    //     }else{
    //       $('.business').removeClass('onslide');
    //     }
    //     if(scroll_animation>esg){
    //       $('.esg').addClass('onslide');
    //     }else{
    //       $('.esg').removeClass('onslide');
    //     }
    //     if(scroll_animation>news){
    //       $('.news').addClass('onslide');
    //     }else{
    //       $('.news').removeClass('onslide');
    //     }
    //     if(scroll_animation>withoffset){
    //       $('.with').addClass('onslide');
    //     }else{
    //       $('.with').removeClass('onslide');
    //     }
    // })

    //푸터 개인정보,이용약관,메일주소 ajax 모달팝업
    var footerPop = new XMLHttpRequest();
    var footInd = 0;
    var footLength = $(".info li a").size();
    var footerJson;
    footerPop.onload = function(){
       if(footerPop.status===200){
           footerJson = JSON.parse(footerPop.responseText);
        };

        function footerClick(footInd){
           var footerText= '';

           footerText += '<h3>'+footerJson.rule[footInd].h3+'</h3>'
           footerText += '<dl>'
           for(var i=0; i<footerJson.rule[footInd].info.length; i++){
           footerText += '<dt>'+footerJson.rule[footInd].info[i].dt+'</dt>'
           for(var j=0; j<footerJson.rule[footInd].info[i].dd.length; j++){
               footerText +='<dd>'+footerJson.rule[footInd].info[i].dd[j]+'</dd>'
           }
           }
           footerText += '</dl>'
           footerText += '<a href="#" class="close_btn">닫기</a>'
           $('.popup').html(footerText);
           
           $('.modal_box,.close_btn').click(function(e){
               e.preventDefault();
               $('.modal_box').css('display','none');
               $('.pop_btn').css('display','none');
               $('.popup').css('display','none');
           })
       }

       $('.info li a').click(function(e){
           e.preventDefault();
           footInd = $(this).index('.info li a');
           $('.modal_box').css('display','block');
           $('.pop_btn').css('display','block');
           $('.popup').css('display','block');
           footerClick(footInd);
       })
       $('.pop_btn a').click(function(e){
           e.preventDefault();
       
           if($(this).hasClass('pre')){
              footInd--;
              if(footInd==-1)footInd=2;
              footerClick(footInd);
           }else if($(this).hasClass('nexto')){
              footInd++;
              if(footInd==footLength)footInd=0;;
              footerClick(footInd);
           }
           
       });
   };
    footerPop.open('GET','./common/data/info.json',true);
    footerPop.send(null);
});









