$(document).ready(function(){
    $('#content ul li a').click(function(e){
        e.preventDefault();
        var click_target = $(this);

        if(click_target.hasClass('hide')){
            $('#content ul li a').next().slideUp(100);
            $('#content ul li a').removeClass('show').addClass('hide');

            click_target.removeClass('hide').addClass('show');
            click_target.next().slideDown(100);
        }else{
            click_target.removeClass('show').addClass('hide');
            click_target.next().slideUp(100);
        }
    })

    $('.all').toggle(
        function(e){
            e.preventDefault();
            $(this).text('모두 닫기');
            $('#content ul li p').slideDown(100);
            $('#content ul li a').removeClass('hide').addClass('show');
        },
        function(e){
            e.preventDefault();
            $(this).text('모두 보기');
            $('#content ul li p').slideUp(100);
            $('#content ul li a').removeClass('show').addClass('hide');
        })    
});