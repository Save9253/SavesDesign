const errFlds = document.querySelectorAll('.errFld');
errFlds.forEach((errFld) => {errFld.addEventListener('keyup',()=>{errFld.classList.remove('errFld')})});

const eyePwd = document.querySelector('.eyePwd');
const eyePwdPath = document.querySelector('.eyePwd path');
const pwdInp = document.querySelector('.pwdDiv input');
const eyePwdDOpen = "M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z";
const eyePwdDClosed = "M0 13.8L2.7 16.3L8.5 17.5L9.3 17.6L15 18L20.7 17.6L21.5 17.5L27.3 16.3L30 13.8L27 14.8L21 15.6L15 15.8L9 15.6L3 14.8Z";
const pwdTT = document.querySelector('.tooltipPwd');
eyePwd.addEventListener('click',()=>{
    if(eyePwdPath.attributes.d.value == eyePwdDOpen){
        eyePwdPath.attributes.d.value = eyePwdDClosed;
        pwdInp.type = "password";
        pwdTT.innerHTML = "Show";
    }else{
        eyePwdPath.attributes.d.value = eyePwdDOpen;
        pwdInp.type = "text";
        pwdTT.innerHTML = "Hide";
    };
})
setTimeout(()=>{eyePwdPath.attributes.d.value = eyePwdDClosed;},1000);


eyePwd.addEventListener('mouseenter',()=>{
    pwdTT.style.opacity = 1;
})
eyePwd.addEventListener('mouseleave',()=>{
    pwdTT.style.opacity = 0;
})
