$(document).ready(function(){
    scrollon = false;
    $(window).on('scroll',function(){
        var CricleScroll = $(window).scrollTop();
        var circleScroll = $('ol div').offset().top-600;
    if(CricleScroll > circleScroll && scrollon==false){
    $('.circle1').circleProgress({
        value: 1,
        size: 170.0, //캔버스 사이즈
        fill: {
        gradient: ['rgba(129,169,221,1)'] //그라디언트 색상
        },
        emptyFill: 'rgba(0, 0, 0, 0)',
        getThickness: function() {
            return $.isNumeric(this.thickness) ? this.thickness : this.size / 12;    //14값을 크게주면 두께가 얇아진다
        },  
        });
    $('.circle2').circleProgress({
        value: 1,
        size: 170.0, //캔버스 사이즈
        fill: {
        gradient: ['rgba(108,154,216,1)'] //그라디언트 색상
        },
        emptyFill: 'rgba(0, 0, 0, 0)',
        getThickness: function() {
            return $.isNumeric(this.thickness) ? this.thickness : this.size / 12;    //14값을 크게주면 두께가 얇아진다
        },  
        });
    $('.circle3').circleProgress({
        value: 1,
        size: 170.0, //캔버스 사이즈
        fill: {
        gradient: ['rgba(87,140,210,1)'] //그라디언트 색상
        },
        emptyFill: 'rgba(0, 0, 0, 0)',
        getThickness: function() {
            return $.isNumeric(this.thickness) ? this.thickness : this.size / 12;    //14값을 크게주면 두께가 얇아진다
        },  
    });
    $('.circle4').circleProgress({
        value: 1,
        size: 170.0, //캔버스 사이즈
        fill: {
        gradient: ['rgba(66,125,204,1)'] //그라디언트 색상
        },
        emptyFill: 'rgba(0, 0, 0, 0)',
        getThickness: function() {
            return $.isNumeric(this.thickness) ? this.thickness : this.size / 12;    //14값을 크게주면 두께가 얇아진다
        },  
    });
    $('.circle5').circleProgress({
        value: 1,
        size: 170.0, //캔버스 사이즈
        fill: {
        gradient: ['rgba(45,111,199,1)'] //그라디언트 색상
        },
        emptyFill: 'rgba(0, 0, 0, 0)',
        getThickness: function() {
            return $.isNumeric(this.thickness) ? this.thickness : this.size / 12;    //14값을 크게주면 두께가 얇아진다
        },  
    });
        scrollon=true;
        
    }
});
});