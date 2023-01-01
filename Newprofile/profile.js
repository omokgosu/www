window.onload = function(){
    const maple = document.querySelector('.maple')
    const page = document.querySelector('.page')
    var width = maple.offsetWidth
    page.style.height = `${width}px`;

    window.addEventListener('scroll',function(){
        maple.style.left = '-'+window.scrollY+'px';
    })

    const jinsung = document.querySelector('.jinsung')
    window.addEventListener('wheel',(delta) =>{
        let left = 0;
        const back = () => {
            left == 214 ? left = 0  : left = left+107;
            jinsung.style.left= `-${left}px`;
            console.log(left);
            if(left==0){
                clearInterval(charctor)
            }
        }
        const charctor = setInterval(back,400);
    })
}