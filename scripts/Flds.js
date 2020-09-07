const errFlds = document.querySelectorAll('.errFld');
errFlds.forEach((errFld) => {errFld.addEventListener('keyup',()=>{errFld.classList.remove('errFld')})});

const eyePwds = document.querySelectorAll('.eyePwd');
const eyePwdPaths = document.querySelectorAll('.eyePwd path');
const pwdInps = document.querySelectorAll('.pwdDiv input');
const eyePwdDOpen = "M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z";
const eyePwdDClosed = "M0 13.8L2.7 16.3L8.5 17.5L9.3 17.6L15 18L20.7 17.6L21.5 17.5L27.3 16.3L30 13.8L27 14.8L21 15.6L15 15.8L9 15.6L3 14.8Z";
const pwdTTs = document.querySelectorAll('.tooltipPwd');
function eyeSetup (b){
    eyePwds[b].addEventListener('click',()=>{
        if(eyePwdPaths[b].attributes.d.value == eyePwdDOpen){
            for(c=0;c<eyePwds.length;c++){
                eyePwdPaths[c].attributes.d.value = eyePwdDClosed;
                pwdInps[c].type = "password";
                pwdTTs[c].innerHTML = "Show";
            }
        }else{
            for(c=0;c<eyePwds.length;c++){
                eyePwdPaths[c].attributes.d.value = eyePwdDOpen;
                pwdInps[c].type = "text";
                pwdTTs[c].innerHTML = "Hide";
            }
        };
    });
    eyePwds[b].addEventListener('mouseenter',()=>{pwdTTs[b].style.opacity = 1;});
    eyePwds[b].addEventListener('mouseleave',()=>{pwdTTs[b].style.opacity = 0;});

    eyePwds[b].addEventListener('focus',()=>{pwdTTs[b].style.opacity = 1;});
    eyePwds[b].addEventListener('blur',()=>{pwdTTs[b].style.opacity = 0;});

    setTimeout(()=>{
        eyePwdPaths[b].attributes.d.value = eyePwdDClosed;
    },1000);
};
for(a=0;a<eyePwds.length;a++){eyeSetup(a)};
