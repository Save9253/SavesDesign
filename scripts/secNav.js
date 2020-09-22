const nav = document.querySelector('.secNav');
const h2s = document.querySelectorAll('.secWNav h2');
const header = document.querySelector('header');
const headerEls = document.querySelectorAll('header > *');

h2s.forEach(h2 => {
    const anch = h2.textContent.replaceAll(' ','-');
    const newA = document.createElement('a');
    h2.setAttribute('id', anch);
    newA.setAttribute('href','#' + anch);
    newA.innerHTML = h2.textContent;
    nav.appendChild(newA);
    newA.addEventListener('click', ()=>{
        header.style.top = '-55px';
    })
});
header.addEventListener('click',()=>{
    header.style.top = '0px';
})
document.addEventListener('scroll',()=>{
    if(scrollY == 0){header.style.top = '0px';}
})
headerEls.forEach(e => {
    e.addEventListener('focus',()=>{header.style.top = '0px'})
})
