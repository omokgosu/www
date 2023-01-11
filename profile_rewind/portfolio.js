window.onload = function(){
    // p 태그 애니메이션
    const mainP = document.querySelector('.main p')
    mainP.classList.add('load');

    // project json
    var project = new XMLHttpRequest();
    var p_json = '';
    let modal = document.querySelector('.modal')
    var modal_cnt = 0;
    var p_list = document.querySelectorAll('.project .img_box');
    project.onload = function(){
        if(project.status===200){
            p_json = JSON.parse(project.responseText);
        };
         function modal_open(a){
            let text= '';

            text=`
                <h4>${p_json[a].h4}</h4>
                <p>${p_json[a].p}</p>
                <ul>
                <li>
                    <dl>
                    <dt>${p_json[a].li[0].dt}</dt>
                    <dd>${p_json[a].li[0].dd1}</dd>
                    <dd>${p_json[a].li[0].dd2}</dd>
                    <dd>${p_json[a].li[0].dd3}</dd>
                    </dl>
                </li>
                <li>
                    <dl>
                    <dt>${p_json[a].li[1].dt}</dt>
                    <dd>${p_json[a].li[1].dd}</dd>
                    </dl>
                </li>
                </ul>
                <button class="closebtn">닫기</button>
            `
            let inner = document.querySelector('.modal .inner');
            inner.innerHTML = text;
            let close = document.querySelector('.modal button');
            close.addEventListener('click',function(){
                modal.classList.remove('open');
            })
         }
         for(let i=0; i<p_list.length; i++){
            p_list[i].addEventListener('click',function(){
                modal.classList.add('open');
                modal_open(i);
            })
        }
     };
     project.open('GET','./portfolio.json',true);
     project.send(null);
}