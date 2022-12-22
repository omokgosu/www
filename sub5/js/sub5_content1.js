$(document).ready(function(){

    /*
    $('.contentArea ul li:eq(0)').show();
    $('.contentArea ol a').click(function(e){
        e.preventDefault();

        var olCnt= $(this).index('.contentArea ol a');
        
        $('.contentArea ul li').hide();
        if(olCnt==0){
            $('.contentArea ul li:eq('+olCnt+')').fadeIn();
        }else if(olCnt==1){
            $('.contentArea ul li:eq('+olCnt+')').fadeIn();
        }else if(olCnt==2){
            $('.contentArea ul li:eq('+olCnt+')').fadeIn();
        }else if(olCnt==3){
            $('.contentArea ul li:eq('+olCnt+')').fadeIn();
        }else if(olCnt==4){
            $('.contentArea ul li:eq('+olCnt+')').fadeIn();
        }else if(olCnt==5){
            $('.contentArea ul li:eq('+olCnt+')').fadeIn();
        }else if(olCnt==6){
            $('.contentArea ul li:eq('+olCnt+')').fadeIn();
        }
    });*/
    
    //tab ajax 버전
    var i=0;
    var promiss=[];
    function dataPrint(){
    $.ajax({
        method: 'get',
        url: './data/sub5_content1.json',
        dataType: 'json',
        success: function(data){
            promiss=data.li;

            var txt='<li><dl>';
            txt += '<dt>'+promiss[i].dt+'</dt>'
            for(var j=0; j<promiss[i].dd.length; j++){
                txt+='<dd>'+promiss[i].dd[j]+'</dd>';
            };
            txt +='</dl></li>';

            $('#change').html(txt);
            $('#change li').hide().stop().fadeIn();
        }
    });
    };

    dataPrint();

    $('ol li a').click(function(e){
        e.preventDefault();
        i = $(this).index('ol li a');
        dataPrint();
    })
});