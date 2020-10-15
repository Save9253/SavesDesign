const errFlds = document.querySelectorAll('.errFld');
errFlds.forEach((errFld) => {errFld.addEventListener('keyup',()=>{
    errFld.classList.remove('errFld');
})});

const eyePwds = document.querySelectorAll('.eyePwd');
const eyePwdPaths = document.querySelectorAll('.eyePwd path');
const eyeSVG = document.querySelectorAll('.eyePwd svg');
const pwdInps = document.querySelectorAll('.pwdDiv input');
const eyePwdDOpen = "M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z";
const eyePwdDClosed = "M0 13.8L2.7 16.3L8.5 17.5L9.3 17.6L15 18L20.7 17.6L21.5 17.5L27.3 16.3L30 13.8L27 14.8L21 15.6L15 15.8L9 15.6L3 14.8Z";
const pwdTTs = document.querySelectorAll('.tooltipPwd');
function eyeSetup (b){
    eyePwds[b].addEventListener('click',()=>{
        if(eyePwdPaths[b].attributes.d.value == eyePwdDOpen){
            for(c=0;c<eyePwds.length;c++){
                eyePwdPaths[c].attributes.d.value = eyePwdDClosed;
                eyePwds[c].attributes['aria-pressed'].value = 'false';
                eyePwds[c].attributes['aria-label'].value = 'Show Pasword';
                pwdInps[c].type = "password";
                pwdTTs[c].innerHTML = "Show";
                pwdTTs[c].attributes['aria-label'].value = 'Show Password Label';
                eyeSVG[c].attributes['aria-label'].value = 'Closed eye';
            }
        }else{
            for(c=0;c<eyePwds.length;c++){
                eyePwdPaths[c].attributes.d.value = eyePwdDOpen;
                eyePwds[c].attributes['aria-pressed'].value = 'true';
                pwdInps[c].type = "text";
                pwdTTs[c].innerHTML = "Hide";
                eyePwds[c].attributes['aria-label'].value = 'Hide Password';
                pwdTTs[c].attributes['aria-label'].value ='Hide Password Label';
                eyeSVG[c].attributes['aria-label'].value = 'Open eye';
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

//Checkbox animation
const checkboxes = document.querySelectorAll(".checkbox");
const checkMarks = document.querySelectorAll('.checkboxSVG path');
const checked = 'M2 5L6 8L13 2L6 13Z';
const notchecked = 'M6 8L6 8L6 8L6 8Z';

function checkMark(ch){
    checkboxes[ch].addEventListener('change',()=>{
        if(checkboxes[ch].checked){
            checkMarks[ch].attributes.d.value = checked;
        }else{
            checkMarks[ch].attributes.d.value = notchecked;
        }
    });
};

for(i=0;i<checkboxes.length;i++){checkMark(i)};
//Cheking the fields
const mailIn = document.querySelector('#mailIn');
const unameIn = document.querySelector('#unameIn');
const pwdIn = document.querySelector('#pwdIn');
const pwdRptIn = document.querySelector('#pwdRptIn');
const regBtn = document.querySelector('#register');

const msgValMl = document.querySelector('#msgValMl')

let chkMail = 1;
let chkPwd = 1;
let emptyFields = false;

mailIn.addEventListener('keyup',()=>{
    if(mailIn.value && /.+@.+\..+/.test(mailIn.value)){chkMail = 2;}else{chkMail = 1};
})
mailIn.addEventListener('blur',()=>{
    if(mailIn.value && /.+@.+\..+/.test(mailIn.value)){chkMail = 2;}else{chkMail = 0};
    if(chkMail == 0){msgValMl.classList.remove('hid')}else{msgValMl.classList.add('hid')}
})