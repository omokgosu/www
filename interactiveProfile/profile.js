window.onload = function(){
    // 전체 가로스크롤
    const maple = document.querySelector('.maple')
    const page = document.querySelector('.page')
    var width = maple.offsetWidth
    page.style.height = `${width}px`;
    
    const cloud = document.querySelector('.cloud')
    const mountain = document.querySelector('.mountain')
    const bird = document.querySelector('.bird')
    let tree = document.querySelectorAll('.about li img')
    window.addEventListener('scroll',function(){
        maple.style.left = '-'+window.scrollY+'px';
        cloud.style.left = '-'+window.scrollY*0.2+'px';
        mountain.style.left = '-'+window.scrollY*0.4+'px';
        bird.style.left = '-'+window.scrollY*3+'px';
        if(window.scrollY>1400){
            for(let i=0; i<tree.length; i++){
                tree[i].classList.add('on');
            }
        }
    })
    // 캐릭터 워크 모션
    const jinsung = document.querySelector('.jinsung')
    let left = 0;
    var motion = true;
    window.addEventListener('wheel',(delta) =>{
        delta.deltaY>0 ? jinsung.style.top = 0 : jinsung.style.top = '-183px';
        const back = () => {
            left == 252 ? left = 0  : left = left+126;
            jinsung.style.left= `-${left}px`;
            if(left==0){
                clearInterval(charctor);
                motion = true;
            }
        }
        if(motion==true){
            motion = false;
            var charctor = setInterval(back,200);
        }
    })
}