const navUl = document.querySelector('#secNav ul');
const h2s = document.querySelectorAll('.secWNav h2');
const navM = '<svg class="crcl" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg"><circle cx="5" cy="5" r="5"/></svg>';

h2s.forEach(h2 => {
    const anch = h2.textContent.replaceAll(' ','-');
    const newLi = document.createElement('li');
    const newA = document.createElement('a');
    h2.setAttribute('id', anch);
    newA.setAttribute('href','#' + anch);
    newA.setAttribute('class','secNavA');
    newA.innerHTML = '<span>' + h2.textContent + '</span>' + navM;
    newLi.appendChild(newA);
    navUl.appendChild(newLi);
});

const endLi = document.createElement('li');
const endA = document.createElement('a');
endA.setAttribute('href','#end');
endA.setAttribute('id','linkToEnd');
endA.innerHTML = '<span>To the end</span><svg viewBox="0 0 10 5" xmlns="http://www.w3.org/2000/svg"><path d="M0 0L5 5L10 0Z"/></svg>';
endLi.appendChild(endA);
navUl.appendChild(endLi);

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
const secNav = document.querySelector('#secNav');
const Nbtn = document.querySelector('#secNavBtn');
const Nicon = document.querySelector('#secNavBtn svg path');
const NiconDR = 'M0 0H3L10 20L3 40H0L7 20Z';
const NiconDL = 'M7 0H10L3 20L10 40H7L0 20Z';
const NiconD = 'M4 0H7L7 20L7 40H4L4 20Z';


Nbtn.addEventListener('click',()=>{
    secNav.classList.toggle('secNavMoved');
    Nicon.attributes.d.value = NiconD;
    if(Nbtn.attributes[0].value == 'true'){
        Nbtn.attributes[0].value = 'false';
    }else{Nbtn.attributes[0].value = 'true';}
})

navAs.forEach(navA =>{
    navA.addEventListener('click',()=>{
        if(secNav.classList.contains('secNavMoved')){
            secNav.classList.remove('secNavMoved');
            Nbtn.attributes[0].value = 'false';
        }
        Nicon.attributes.d.value = NiconD;
    })
})

Nbtn.addEventListener('mouseenter', ()=>{
    if(secNav.classList.contains('secNavMoved')){
        Nicon.attributes.d.value = NiconDL;
    }else{
        Nicon.attributes.d.value = NiconDR;
    }
})
Nbtn.addEventListener('mouseleave', ()=>{
    Nicon.attributes.d.value = NiconD;
})
Nbtn.addEventListener('focus', ()=>{
    if(secNav.classList.contains('secNavMoved')){
        Nicon.attributes.d.value = NiconDL;
    }else{
        Nicon.attributes.d.value = NiconDR;
    }
})
Nbtn.addEventListener('blur', ()=>{
    Nicon.attributes.d.value = NiconD;
})
