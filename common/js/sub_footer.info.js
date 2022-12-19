 //푸터 서브용 개인정보,이용약관,메일주소 ajax 모달팝업
 $(document).ready(function(){
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
 footerPop.open('GET','../common/data/info.json',true);
 footerPop.send(null);
});