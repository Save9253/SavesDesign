
const hamB = document.querySelector('#hamburger');
const hamBpath = document.querySelector('#hamburger svg path');
const body = document.querySelector('body');
const sideNav = document.querySelector('#sideNav');
const content = document.querySelector('#content');
const hamBD = 'M0 0L20 0L20 3L0 3Z M0 7L20 7L20 10L0 10Z M0 14L20 14L20 17L0 17Z';
const arrowD = 'M10 0L20 7L20 10L10 3Z M0 7L20 7L20 10L0 10Z M10 14L20 7L20 10L10 17Z';

hamB.addEventListener('click',()=>{
    body.classList.toggle('bodyMoved');
    sideNav.classList.toggle('navMoved');
    if(hamBpath.attributes.d.value == hamBD){
        hamBpath.attributes.d.value = arrowD;
    }else{
        hamBpath.attributes.d.value = hamBD;
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
    unfoldBtn.classList.add('hid');
})
document.addEventListener('scroll',()=>{
    if(scrollY == 0){
        header.style.top = '0px';
        unfoldBtn.classList.add('hid');
    }else{
        header.style.top = '-70px';
        unfoldBtn.classList.remove('hid');
    }
})
headerEls.forEach(e => {
    e.addEventListener('focus',()=>{
        header.style.top = '0px'
        unfoldBtn.classList.add('hid');
    })
})
