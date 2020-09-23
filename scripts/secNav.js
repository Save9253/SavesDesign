const nav = document.querySelector('.secNav');
const h2s = document.querySelectorAll('.secWNav h2');
const header = document.querySelector('header');
const headerEls = document.querySelectorAll('header > *');
const navM = '<svg class="crcl" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg"><circle cx="5" cy="5" r="5"/></svg>';

h2s.forEach(h2 => {
    const anch = h2.textContent.replaceAll(' ','-');
    const newA = document.createElement('a');
    h2.setAttribute('id', anch);
    newA.setAttribute('href','#' + anch);
    newA.innerHTML = '<span>' + h2.textContent + '</span>' + navM;
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
