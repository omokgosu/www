$(document).ready(function(){
    var map_cnt= $('.contentArea > ul > li').size();
    $('.contentArea .map1').show(); 
    $('.contentArea ul li:eq(0)').addClass('current')

    $('.contentArea > ul li a').click(function(e){
        e.preventDefault();
        var ind=$(this).index('.contentArea > ul li a');
        $('section').hide();
        $('section.map'+(ind+1)).fadeIn(100);
        $('.contentArea > ul li').removeClass('current');
        $(this).parent().addClass('current')
    })
});