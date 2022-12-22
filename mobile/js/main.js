$(document).ready(function(){

    //main visual 슬라이드
        var startX, endX;
        var visualCount;   //이미지 개수
        var visualSize;   //이미지 너비
        var visualIndex=0;  //이미지 순서

        visualCount = $('.main li').size();
        visualSize = window.innerWidth;
        $('.main li').width(visualSize);
        $('.main ul').width(visualSize*visualCount);
        $('.main ul').on('touchstart mousedown',function(e){
            if(e.pageX==undefined){ //모바일
                startX=e.originalEvent.touches[0].pageX;
            }else{ //pc
                e.preventDefault();
                startX=e.pageX
            } 
        });
        $('.main ul').on('touchend mouseup',function(e){
            if(e.pageX==undefined){
                endX= e.originalEvent.changedTouches[0].pageX;  
            }else{
                endX= e.pageX
            }

            if(startX<endX){
                visualIndex--;
                if(visualIndex<0)visualIndex=0;
                $('.main ul').animate({left: -visualSize*visualIndex},'slow');
            }else{
                visualIndex++;
                if(visualIndex>=visualCount)visualIndex=visualCount-1
                $('.main ul').animate({left: -visualSize*visualIndex},'slow');
            }
        });
        $(window).resize(function(){
            visualSize=$(window).width();
            $('.main li').width(visualSize);
            $('.main ul').css('left',-visualSize*visualIndex).width(visualSize*visualCount);
        });

    //esg ajax 바닐라 스크립트
    // innerHTML 은 엘리먼트를 새로 쓰는거라 버튼까지 바꾸면 안먹음
    // 버튼은 빼고 HTML을 바꾸거나 엘리먼트가 바뀌고 이벤트를 재적용 해줘야됨
    var esgInner = document.querySelector('.ajax_box');
    var xhr = new XMLHttpRequest();
    var esgJson;
    var cnt=0;
    xhr.onload =function(){
        if(xhr.status==200){
            esgJson = JSON.parse(xhr.responseText);      
        }
        function esgClick(cnt){
            var esgText = '';

            
            esgText += '<img src="./images/esg'+esgJson.esg[cnt].img+'x2.png" alt="'+esgJson.esg[cnt].alt+'">';
            esgText += '<div class="esg_inner">';
            esgText += '<span>'+esgJson.esg[cnt].span+'</span>';
            esgText += '<h4>'+esgJson.esg[cnt].h3+'</h4>';
            esgText += '<p>'+esgJson.esg[cnt].p+'</p>';
            esgText += '<a href="./sub2_4.html"><i class="fa-solid fa-arrow-right"></i></a>'
            esgText += "</div>"

            esgInner.innerHTML = esgText;
        }
        esgClick(cnt);
        var prev = document.querySelector('.prev');
        prev.addEventListener("click", function(e){
            e.preventDefault();
            cnt++;
            if(cnt==2){
                cnt=0;
            }
            esgClick(cnt);
        });
    };
    xhr.open('GET' , './js/esg.json' , true);
    xhr.send(null);

    // NEWS 가로스크롤 야물딱지게 만들기  12시간걸림
    var newsul = document.querySelector('.news ul') //스크롤 이벤트 부르기
    var newsScroll = document.querySelector('.scroll_bar')//스크롤바 css 부르기
    var liCnt = document.querySelectorAll('.news ul li').length; // li 갯수
    var li = document.querySelector('.news ul li:first-child').offsetWidth; // li width
    var ulWidth = newsul.offsetWidth; // ul width
    var maxWidth = liCnt*li+liCnt*25; // 전체크기
    var maxScroll = maxWidth-ulWidth; // 스크롤 끝 값
    var scrollArea = document.querySelector('.scroll_area').offsetWidth; // 스크롤 에어리어 width
    var scrollBar = scrollArea/10; //  스크롤 바의 크기

        // 윈도우 크기 변할때마다 새로 값 바꿔주기
    window.addEventListener('resize',function(){
        ulWidth = newsul.offsetWidth; 
        maxWidth = liCnt*li+(liCnt-1)*25;
        maxScroll = maxWidth-ulWidth; 
        scrollArea = document.querySelector('.scroll_area').offsetWidth;
        scrollBar = scrollArea/10;
        newsScroll.style.width = scrollBar+'px'; // 응 스크롤 바 크기~
    });
    newsul.addEventListener('scroll',function(){
        scrollleft = ((this.scrollLeft/maxScroll)*90);// 백분율 구하는 식 *100 해주면 left 100%라 튀어나감
        scrollleft = scrollleft.toFixed(2); // 위에서 나온거 소수점 둘째자리까지만 구해주기
        newsScroll.style.left = scrollleft+'%'; // 응 스크롤 레프트 퍼센트~ 
    });
});