$(document).ready(function() {
    //트레일러 영상 모달 팝업
    $('.popup-youtube').magnificPopup({
        disableOn: 320,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,

        fixedContentPos: false
    });
    //유튜브 li 높이 width 값으로 만들기
    let circle = $('.move li').width();
    let reheight = () => {
        $('.move li').height(circle);
    }
    reheight();
    $(window).resize(()=>{
        circle = $('.move li').width();
        reheight();
    })
    //뮤직 json 연결
    let music = new XMLHttpRequest();
    let musicJson;
    let musicIndex = 0;
   music.onload = function(){
            if(music.status===200){
                musicJson= JSON.parse(music.responseText);
            };

            function musicClick(i){
            let iframeText = '';
            iframeText += `
            <div class="youtubeInner">
                <iframe src="${musicJson.iframe[i].src}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <dl>
                <dt>${musicJson.iframe[i].dt}</dt>
                <dd>${musicJson.iframe[i].dd}</dd>
            </dl>`;

            document.querySelector('.youtube').innerHTML = iframeText;
            };
            $('.move ul li').on('click',function(){
                musicIndex = $(this).index();
                musicClick(musicIndex);
            });
        };
    music.open('GET','./js/trailer.json',true);
    music.send(null);
});