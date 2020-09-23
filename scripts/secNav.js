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
    newA.setAttribute('class','secNavA');
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

// High light the focus section
const sec = document.querySelectorAll('.secWNav section');
const navAs = document.querySelectorAll('.secNavA');
let focusSec;

document.addEventListener('scroll',()=>{
    let MidScroll = scrollY + (innerHeight/2);
    for(i = 0;i<sec.length;i++){
        let SecTop = sec[i].offsetTop;
        let SecBott = sec[i].offsetTop + sec[i].clientHeight;
        if(focusSec ==  i){
            navAs[i].classList.add('focusSecA')
        }else{
            navAs[i].classList.remove('focusSecA')
        }
        if(MidScroll > SecTop && MidScroll < SecBott){
            if(focusSec != i){focusSec = i;}
        }
    }
})

//Open the nav
const secNavD = document.querySelector('.secNavDiv');
const Nbtn = document.querySelector('#secNavBtn');
const Nicon = document.querySelector('#secNavBtn svg path');
const NiconDR = 'M0 0H3L10 20L3 40H0L7 20Z';
const NiconDL = 'M7 0H10L3 20L10 40H7L0 20Z';
const NiconD = 'M0 0H3L3 20L3 40H0L0 20Z';


Nbtn.addEventListener('click',()=>{
    secNavD.classList.toggle('secNavDMoved');
    Nicon.attributes.d.value = NiconD;
})

navAs.forEach(navA =>{
    navA.addEventListener('click',()=>{
        if(secNavD.classList.contains('secNavDMoved')){
            secNavD.classList.remove('secNavDMoved');
        }
        Nicon.attributes.d.value = NiconD;
    })
})

Nbtn.addEventListener('mouseenter', ()=>{
    if(secNavD.classList.contains('secNavDMoved')){
        Nicon.attributes.d.value = NiconDL;
    }else{
        Nicon.attributes.d.value = NiconDR;
    }
})
Nbtn.addEventListener('mouseleave', ()=>{
    Nicon.attributes.d.value = NiconD;
})
Nbtn.addEventListener('focus', ()=>{
    if(secNavD.classList.contains('secNavDMoved')){
        Nicon.attributes.d.value = NiconDL;
    }else{
        Nicon.attributes.d.value = NiconDR;
    }
})
Nbtn.addEventListener('blur', ()=>{
    Nicon.attributes.d.value = NiconD;
})
