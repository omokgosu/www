$(document).ready(function(){
    scrollon = false;
    $(window).on('scroll',function(){
        var CricleScroll = $(window).scrollTop();
        var circleScroll = $('.circle').offset().top-600;
    if(CricleScroll > circleScroll && scrollon==false){
    $('.circle').circleProgress({
        value: 0.16,
        size: 300.0, //캔버스 사이즈
        fill: {
        gradient: ['rgb(10,72,155'] //그라디언트 색상
        },
        emptyFill: 'rgba(0, 0, 0, .1)',
        getThickness: function() {
            return $.isNumeric(this.thickness) ? this.thickness : this.size / 30;    //14값을 크게주면 두께가 얇아진다
        },  
        }).on('circle-animation-progress', function(event, progress) {
            $(this).find('span').html(parseInt(16 * progress) + '<i>%</i>');
        });
        scrollon=true;
    }
});
});