$(document).ready(function(){
    $(window).on('scroll',function(){
        var scrollTop = $(window).scrollTop();
        var content = $('#content').offset().top-200;
        var top_move = document.querySelector('.top');
        if(scrollTop>content){
            $('#navbar').addClass('on');
            top_move.style.display = 'block';
            top_move.style.opacity = 1;
        }else{
            $('#navbar').removeClass('on');
            top_move.style.opacity = 0;
        }
    })

    var modal_btn = document.querySelectorAll('.gallery li');
    var modal_img = document.querySelector('.modal img');
    for(let i=0; i<modal_btn.length; i++){
        modal_btn[i].addEventListener('click',(e)=>{
            modal_img.setAttribute('src',`./images/modal_${i+1}.jpg`)
        })
    }

    let price_btn = document.querySelectorAll('.price h4');
    for(let i=0; i<price_btn.length; i++){
        price_btn[i].addEventListener('click',()=>{
            if(price_btn[i].getAttribute('class')=='price_open'){
                price_btn[i].classList.remove('price_open');
                price_btn[i].classList.add('price_close');
            }else{
                price_btn[i].classList.remove('price_close');
                price_btn[i].classList.add('price_open');
            }
        })
    }

})