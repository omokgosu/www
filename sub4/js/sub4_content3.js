$(document).ready(function(){

    /* 제이쿼리로 만든 팝업
    var pop_txt = [
        '<dl><dt>지유진<span>생년월일 : 1979.11.05</span></dt><dd><span>이력</span>2010년~2011년 KLPGA 선수분과위원장</dd><dd>2012년~2014년 하이마트 골프단 코치</dd><dd>2012년~2016년 KLPGA 이사</dd><dd>2015년~2017년 롯데골프단 코치</dd></dl>',
        '<dl><dt>권기택<span>생년월일 : 1982.07.07</span></dt><dd><span>이력</span>2013년 일본 2부 투어 상금왕</dd><dd>2001년~2003년 국가대표</dd><dd>2002년 부산 아시안게임 은메달</dd><dd>2004년 일본 대학선수권 우승</dd><dd>2014년 일본 세가삼미컵 3위</dd><dd>2015년 일본 라이쟌KBC 오거스타 5위</dd><dd>2018년 일본 타이헤요클럽 4위</dd><dd>2019년 일본 TI컵 6위</dd></dl>',
        '<dl><dt>박여진<span>생년월일 : 1991.05.11</span></dt> <dd><span>이력</span>2014년~2015년 스포츠마케팅 기획팀</dd><dd>2015년~2015년 Academy Instructor</dd><dd>2015년~2019년 AJ 스포츠운영팀</dd><dd>2019년~ LPGA Class A Member</dd></dl>',
        '<dl><dt>홍란<span>생년월일 : 1986.06.23</span></dt><dd><span>우승</span>KLPGA 정규투어 4승</dd><dd>2018년 브루나이 레이디스 오픈</dd><dd>2010년 S-Oil 챔피언스 인비테이셔널</dd><dd>2008년 레이크사이드 여자 오픈</dd><dd>2008년 KB국민은행 스타투어 2차전</dd></dl>',
        '<dl><dt>김해림<span>생년월일 : 1989.09.08</span></dt><dd><span>우승</span>KLPGA 정규투어 7승</dd><dd>2021년 맥콜·모나파크 오픈</dd><dd>2018년 교촌 허니 레이디스 오픈</dd><dd>2017년 KB금융 스타챔피언십</dd><dd>2017년 SGF67 월드 레이디스 챔피언십</dd><dd>2016년 KB금융 스타챔피언십</dd><dd>2016년 교촌 허니 레이디스 오픈</dd></dl>',
        '<dl><dt>최가빈<span>생년월일 : 2003.01.15</span></dt><dd><span>우승</span>2022년 드림투어 11차전 우승</dd><dd>2022년 드림투어 9차전 우승</dd><dd>2022년 드림투어 6차전 우승</dd><dd>2021년 솔라고 점프투어 11차전 2위</dd><dd>2021년 솔라고 점프투어 9차전 2위</dd></dl>',
        '<dl><dt>이재윤<span>생년월일 : 2000.08.19</span></dt><dd><span>우승</span>KLPGA 정규투어 4승</dd><dd>2018년 브루나이 레이디스 오픈</dd><dd>2010년 S-Oil 챔피언스 인비테이셔널</dd><dd>2008년 레이크사이드 여자 오픈</dd><dd>2008년 KB국민은행 스타투어 2차전</dd></dl>'
    ];
    var ind=0;

    $('.contentArea li ul li').click(function(e){
        e.preventDefault();

        ind = $(this).index('.contentArea li ul li');

        $('.modal_box').fadeIn('fast');
        $('.popup').fadeIn('slow');
        $('.pop_btn').fadeIn('slow');
        $('.popup img').attr('src','./images/content3/people_modal_'+(ind+1)+'.png');
        $('.popup .txt').html(pop_txt[ind]);
    });

    $('.close_btn, .modal_box').click(function(e){
        e.preventDefault();
        $('.modal_box').hide();
        $('.popup').hide();
        $('.pop_btn').fadeOut('fast');
    });

    $('.pop_btn a').click(function(e){
        e.preventDefault();
 
        $('.popup').hide().fadeIn('slow'); 
       
       if($(this).hasClass('pre')){
           if(ind==0)ind=pop_txt.length;
           ind--;
           $('.popup img').attr('src','./images/content3/people_modal_'+(ind+1)+'.png');
            $('.popup .txt').html(pop_txt[ind]);
       }else if($(this).hasClass('next')){
           if(ind==pop_txt.length-1)ind=-1;
           ind++;
           $('.popup img').attr('src','./images/content3/people_modal_'+(ind+1)+'.png');
            $('.popup .txt').html(pop_txt[ind]);
       }
 
   });*/
   //바닐라로 ajax 로 연결해서 만드는 팝업
   var popUp = new XMLHttpRequest();
   var popJson;
   var popSelect = document.querySelectorAll('ul.off a');
   var modal_box = document.querySelector('.modal_box2');
   var pre = document.querySelector('.pre');
   var next = document.querySelector('.next');
   var pop_btn = document.querySelector('.pop_btn2')
   var popup = document.querySelector('.popup2');
   var popCount = 0;
   popUp.onload = function(){
       if(popUp.status===200){
           popJson = JSON.parse(popUp.responseText);
        };

        function popClick(popCnt){
            var popText = '';
            popText += '<img src="./images/content3/people_modal_'+popJson.people[popCnt].img+'.png"" alt="">';
            popText +='<div class="txt">';
            popText +='<dl>';
            popText +='<dt>'+popJson.people[popCnt].dt+'</dt>'
            for(var i=0; i<popJson.people[popCnt].dd.length; i++){
                popText +='<dd>'+popJson.people[popCnt].dd[i]+'</dd>'
            }
            popText +='</dl></div><a href="#" class="close_btn2">닫기</a>'; 
    
            popup.innerHTML = popText;
            var close_btn = document.querySelector('.close_btn2');
            
            close_btn.addEventListener('click', (e)=>{
                e.preventDefault();
                modalClose();
            })
        };
        function modalOpen(){
            modal_box.style.display="block";
            pop_btn.style.display="block";
            popup.style.display= "block";
        };
        function modalClose(){
            modal_box.style.display="none";
            pop_btn.style.display="none";
            popup.style.display= "none";
        };
        modal_box.addEventListener('click', (e)=>{
            e.preventDefault();
            modalClose();
        });
        popSelect.forEach((i) => {
            i.addEventListener("click", (e)=>{
                e.preventDefault();
                modalOpen();
            })
        })
        popSelect[0].addEventListener("click", (e)=>{
            popCount = 0;
            popClick(0);
        });
        popSelect[1].addEventListener("click", (e)=>{
            popCount = 1;
            popClick(1);
        });
        popSelect[2].addEventListener("click", (e)=>{
            popCount = 2;
            popClick(2);
        });
        popSelect[3].addEventListener("click", (e)=>{
            popCount = 3;
            popClick(3);
        });
        popSelect[4].addEventListener("click", (e)=>{
            popCount = 4;
            popClick(4);
        });
        popSelect[5].addEventListener("click", (e)=>{
            popCount = 5;
            popClick(5);
        });
        popSelect[6].addEventListener("click", (e)=>{
            popCount = 6;
            popClick(6);
        });

        pre.addEventListener('click',function(e){
            e.preventDefault();
            popCount--;
            if(popCount==-1){
                popCount=popSelect.length-1;
            }
            popClick(popCount);
        })
        next.addEventListener('click',function(e){
            e.preventDefault();
            popCount++;
            if(popCount==popSelect.length){
                popCount=0;
            }
            popClick(popCount);
        })
    };

    popUp.open('GET','./data/sub4_content3.json',true);
    popUp.send(null);


        // for문으론 작동이안댐 ㅠㅠ 답모르겠음
        // for(i=0; i<popJson.people.length; i++){
        //     popSelect[i].addEventListener('click',function(e){
        //         e.preventDefault();
        //         modal_box.style.display="block";
        //         pop_btn.style.display="block";
        //         popup.style.display= "block";
        //         popClick();
        //     })
        // };
});