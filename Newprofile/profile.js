window.onload = function(){
    // 전체 가로스크롤
    const maple = document.querySelector('.maple')
    const page = document.querySelector('.page')
    var width = maple.offsetWidth
    page.style.height = `${width}px`;
    
    const cloud = document.querySelector('.cloud')
    window.addEventListener('scroll',function(){
        maple.style.left = '-'+window.scrollY+'px';
        cloud.style.left = '-'+window.scrollY*0.2+'px';
    })
    // 캐릭터 워크 모션
    const jinsung = document.querySelector('.jinsung')
    window.addEventListener('wheel',(delta) =>{
        let left = 0;
        let top = 0;
        delta.deltaY>0 ? jinsung.style.top = 0 : jinsung.style.top = '-185px';
        const back = () => {
            left == 214 ? left = 0  : left = left+107;
            jinsung.style.left= `-${left}px`;
            if(left==0){
                clearInterval(charctor)
            }
        }
        const charctor = setInterval(back,200);
    })
}