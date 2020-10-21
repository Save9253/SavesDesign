
const hamB = document.querySelector('#hamburger');
const hamBpath = document.querySelector('#hamburger svg path');
const body = document.querySelector('body');
const sideNav = document.querySelector('#sideNav');
const content = document.querySelector('#content');
const hamBD = 'M0 1.5L20 1.5 M0 8.5L20 8.5 M0 15.5L20 15.5';
const arrowD = 'M10 1.5L20 8.5 M0 8.5L20 8.5 M10 15.5L20 8.5';

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

//Cart animation
const cartL1 = document.querySelector('#cartL1');
const cartL2 = document.querySelector('#cartL2');
const cartL3 = document.querySelector('#cartL3');
const cartText = document.querySelector('#cartText');

if(cartText.innerHTML!="0"){
    setTimeout(()=>{cartL1.setAttribute('d','M85 25H85')},500);
    setTimeout(()=>{cartL2.setAttribute('d','M82 35H82')},750);
    setTimeout(()=>{cartL3.setAttribute('d','M79 45H79')},1000);
    if(cartText.innerHTML.length == 1){
        setTimeout(()=>{cartText.style['font-size'] = '60px'},1250);
    }else if(cartText.innerHTML.length == 2){
        cartText.setAttribute('x','28');
        setTimeout(()=>{cartText.style['font-size'] = '50px'},1250);
    }
    setTimeout(()=>{
        cartL1.setAttribute('opacity','0');
        cartL2.setAttribute('opacity','0');
        cartL3.setAttribute('opacity','0');
    },1250);
}
//Firebase
const log = document.querySelector('#log')
const loginPath = document.querySelector('#loginPath')
const loginSVG = document.querySelector('#loginSVG')
const loginA = document.querySelector('#loginA')
firebase.auth().onAuthStateChanged(function(u) {
    if (u) {
        log.innerHTML = 'Profile'
        loginPath.attributes.fill.value = 'var(--dr)'
        loginA.attributes['aria-label'].value = 'Profile'
        loginSVG.attributes['aria-label'].value = 'Profile'
    }
})

