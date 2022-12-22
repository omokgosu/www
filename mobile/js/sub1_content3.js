$(document).ready(function(){
    // 열고 닫는 메뉴
    var moveSlide = false;
    $('.moveMenu p').on('click',function(){
        if(moveSlide==false){
            $('.moveMenu ul').slideDown('fast');
            moveSlide=true;
        }else{
            $('.moveMenu ul').slideUp('fast');
            moveSlide=false;
        }
    });

    // 탭 메뉴
    $('#content > ul li:eq(0)').show();
    $('.moveMenu ul li a').on('click',function(e){
        e.preventDefault();
        var moveInd = $(this).index('.moveMenu ul li a');
        $('#content > ul li').hide();
        $('#content > ul li:eq('+moveInd+')').show();
        $('.moveMenu ul').slideUp('fast');
        moveSlide=false;
    });

    //
    $('.moveMenu ul li a:eq(0)').on('click',function(){
        $('.moveMenu p').text('2020 ~ 2022')
    });
    $('.moveMenu ul li a:eq(1)').on('click',function(){
        $('.moveMenu p').text('2010 ~ 2020')
    })
    $('.moveMenu ul li a:eq(2)').on('click',function(){
        $('.moveMenu p').text('2000 ~ 2010')
    })
    $('.moveMenu ul li a:eq(3)').on('click',function(){
        $('.moveMenu p').text('1950 ~ 2000')
    })
});