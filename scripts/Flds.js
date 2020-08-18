const errFlds = document.querySelectorAll('.errFld');
errFlds.forEach((errFld) => {errFld.addEventListener('keyup',()=>{errFld.classList.remove('errFld')})});

const eyePwd = document.querySelector('.eyePwd');
const eyePwdPath = document.querySelector('.eyePwd path');
const pwdInp = document.querySelector('.pwdDiv input');
const eyeDOpen = "M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z";
const eyeDClosed = "M0 13.8L2.7 16.3L8.5 17.5L9.3 17.6L15 18L20.7 17.6L21.5 17.5L27.3 16.3L30 13.8L27 14.8L21 15.6L15 15.8L9 15.6L3 14.8Z";
eyePwd.addEventListener('click',()=>{
    if(eyePwdPath.attributes.d.value == eyeDOpen){
        eyePwdPath.attributes.d.value = eyeDClosed;
        pwdInp.type = "password";
    }else{
        eyePwdPath.attributes.d.value = eyeDOpen;
        pwdInp.type = "text";
    };
})
