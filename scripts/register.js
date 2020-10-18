//Cheking the fields
const mailIn = document.querySelector('#mailIn');
const pwdIn = document.querySelector('#pwdIn');
const pwdRptIn = document.querySelector('#pwdRptIn');

const pwdFld = document.querySelector('#pwdFld');
const pwdRptFld = document.querySelector('#pwdRptFld');

const regBtn = document.querySelector('#register');

const msgValMl = document.querySelector('#msgValMl')
const msgPwdMtch = document.querySelector('#msgPwdMtch')
const msgPwdLength = document.querySelector('#msgPwdLength')
const msgEmptyFlds = document.querySelector('#msgEmptyFlds')
const msgFBErr = document.querySelector('#msgFBErr')

let chkMail = 1;
let chkPwd = 1;
let PwdLength = 1;
let emptyFields = false;

mailIn.addEventListener('keyup',()=>{
    mailIn.classList.remove('errFld')
    msgEmptyFlds.classList.add('hid');
    if(mailIn.value && /.+@.+\..+/.test(mailIn.value)){
        chkMail = 2;
        mailIn.classList.add('corFld');
        msgValMl.classList.add('hid');
        mailIn.attributes['aria-invalid'].value = 'false'
    }else{
        chkMail = 1;
        mailIn.classList.remove('corFld');
        mailIn.attributes['aria-invalid'].value = 'false'
    };
})
mailIn.addEventListener('blur',()=>{
    if(mailIn.value && /.+@.+\..+/.test(mailIn.value)){chkMail = 2;}else{chkMail = 0}; 
    if(chkMail == 0){
        msgValMl.classList.remove('hid');
        mailIn.classList.remove('corFld');
        mailIn.classList.add('errFld');
        mailIn.attributes['aria-invalid'].value = 'true'
    }else{
        msgValMl.classList.add('hid');
        mailIn.attributes['aria-invalid'].value = 'false'
    }
})

pwdIn.addEventListener('keyup',()=>{
    if(pwdIn.value.length>5){
        PwdLength = 2;
        msgPwdMtch.classList.add('hid');
        msgPwdLength.classList.add('hid');
    }else{
        chkPwd = 1
        PwdLength = 1
    } 
    pwdFld.classList.remove('errFld')
    pwdRptFld.classList.remove('errFld')
    msgPwdMtch.classList.add('hid');
    msgPwdLength.classList.add('hid');
    pwdIn.attributes['aria-invalid'].value = 'false'
    pwdRptIn.attributes['aria-invalid'].value = 'false'
    msgEmptyFlds.classList.add('hid');
})
pwdRptIn.addEventListener('keyup',()=>{
    if(pwdIn.value != '' && pwdRptIn.value != '' && pwdIn.value == pwdRptIn.value){
        chkPwd = 2;
        pwdFld.classList.add('corFld');
        pwdRptFld.classList.add('corFld');
        msgPwdMtch.classList.add('hid');
    }else{
        chkPwd = 1
        pwdFld.classList.remove('corFld');
        pwdRptFld.classList.remove('corFld');
    };
    pwdFld.classList.remove('errFld')
    pwdRptFld.classList.remove('errFld')
    pwdIn.attributes['aria-invalid'].value = 'false'
    pwdRptIn.attributes['aria-invalid'].value = 'false'
    msgEmptyFlds.classList.add('hid');
})
pwdIn.addEventListener('blur',()=>{
    if(pwdIn.value.length>5){PwdLength = 2}else if(pwdIn.value.length==0){PwdLength = 1}else{PwdLength = 0}
    if(PwdLength == 0){
        pwdFld.classList.add('errFld')
        msgPwdLength.classList.remove('hid');
        pwdIn.attributes['aria-invalid'].value = 'true'
    }else{
        msgPwdLength.classList.add('hid');
    }
})
pwdRptIn.addEventListener('blur',()=>{
    if(pwdIn.value == pwdRptIn.value){chkPwd = 2;}else{chkPwd = 0}; 
    if(chkPwd == 0){
        msgPwdMtch.classList.remove('hid');
        pwdFld.classList.remove('corFld');
        pwdFld.classList.add('errFld');
        pwdRptFld.classList.remove('corFld');
        pwdRptFld.classList.add('errFld');
        pwdIn.attributes['aria-invalid'].value = 'true'
        pwdRptIn.attributes['aria-invalid'].value = 'true'
    }else{
        msgPwdMtch.classList.add('hid');
    }
})

//Firebase submit
regBtn.addEventListener('click',()=>{
    msgFBErr.classList.add('hid');
    if(mailIn.value == '' || pwdIn.value == '' || pwdRptIn.value == ''){
        emptyFields == true;
        msgEmptyFlds.classList.remove('hid');
    } 
    if(chkMail == 2 && chkPwd == 2 && PwdLength == 2 && emptyFields == false){
        let FBerr = null;
        firebase.auth().createUserWithEmailAndPassword(mailIn.value, pwdIn.value).catch(function(error) {
            FBerr = error.message
            msgFBErr.innerHTML = FBerr;
            msgFBErr.classList.remove('hid');
        }).then(()=>{
            if(!FBerr){
                window.location.href = "login.php?msg=scs"
            }
        })
    }
})