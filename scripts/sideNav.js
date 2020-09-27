
const hamB = document.querySelector('#hamburger');
const hamBpath = document.querySelector('#hamburger svg path');
const body = document.querySelector('body');
const sideNav = document.querySelector('#sideNav');
const content = document.querySelector('#content');
const hamBD = 'M0 0L20 0L20 3L0 3Z M0 7L20 7L20 10L0 10Z M0 14L20 14L20 17L0 17Z';
const arrowD = 'M10 0L20 7L20 10L10 3Z M0 7L20 7L20 10L0 10Z M10 14L20 7L20 10L10 17Z';

hamB.addEventListener('click',()=>{
    body.classList.toggle('bodyMoved');
    if(hamBpath.attributes.d.value == hamBD){
        hamBpath.attributes.d.value = arrowD;
        sideNav.classList.remove('contHid');
        sideNav.style.right = "0";
        hamB.attributes[0].value = 'true';
    }else{
        hamBpath.attributes.d.value = hamBD;
        setTimeout(()=>{sideNav.classList.add('contHid')},1000);
        sideNav.style.right = "-250px";
        hamB.attributes[0].value = 'false';
    }
});
content.addEventListener('click',()=>{
    if(body.classList.contains('bodyMoved')){body.classList.remove('bodyMoved')};
    if(sideNav.classList.contains('navMoved')){sideNav.classList.remove('navMoved')};
    if(hamBpath.attributes.d.value == arrowD){hamBpath.attributes.d.value = hamBD}
});

// Width with no scroll bar
function winWidth(){document.documentElement.style.setProperty('--vw', document.documentElement.clientWidth + "px")}
winWidth();
window.addEventListener('resize', ()=>{winWidth();});

// Header Folder
const header = document.querySelector('header');
const headerEls = document.querySelectorAll('header > *');
const unfoldBtn = document.querySelector('#headerUnfold');
unfoldBtn.addEventListener('click',()=>{
    header.style.top = '0px';
    unfoldBtn.attributes[0].value = 'true';
})
document.addEventListener('scroll',()=>{
    if(scrollY == 0){
        header.style.top = '0px';
        unfoldBtn.attributes[0].value = 'true';
    }else{
        header.style.top = '-70px';
        unfoldBtn.attributes[0].value = 'false';
    }
})
headerEls.forEach(e => {
    e.addEventListener('focus',()=>{
        header.style.top = '0px'
        unfoldBtn.attributes[0].value = 'true';
    })
})
