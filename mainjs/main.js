$(document).ready(function(){

        var cnt=0; //이미지의 순서
        var info = 0;
        var total = $('.main li').size();
        $('.main li:eq(0)').fadeIn(1000);
        function change(){
            cnt++;
            if(cnt==total){
                cnt=0;
            }
            $('.main li').hide();
            $('.main li:eq('+cnt+')').fadeIn(400);
            // $('.main span').text(cnt+1+'/4');
        }

        setInterval(change,5000);
        /*
        $('#btn').toggle(function(e){
            e.preventDefault();
            clearInterval(info);
            $(this).text('play');
        },
        function(e){
            e.preventDefault();
            info = setInterval(change,3000)
            $(this).text('stop');
        }
        ) */
})