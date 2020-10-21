//Cheking the fields
const mailIn = document.querySelector('#mailIn');
const pwdIn = document.querySelector('#pwdIn');

const pwdFld = document.querySelector('#pwdFld');

const loginBtn = document.querySelector('#loginBtn');
const logoutBtn = document.querySelector('#logoutBtn');

const msgEmptyFlds = document.querySelector('#msgEmptyFlds')
const msgFBErr = document.querySelector('#msgFBErr')
const msgSignedIn = document.querySelector('#msgSignedIn')
const loginDiv = document.querySelector('#loginDiv')

let emptyFields = false;

//Userchekc
firebase.auth().onAuthStateChanged(function(u) {
    if (u) {
        loginDiv.classList.add('hid');
        msgSignedIn.classList.remove('hid')
    } else {
        loginDiv.classList.remove('hid');
        msgSignedIn.classList.add('hid')
    }
})


//Firebase submit
loginBtn.addEventListener('click',()=>{
    msgFBErr.classList.add('hid');
    if(mailIn.value == '' || pwdIn.value == ''){
        emptyFields == true;
        msgEmptyFlds.classList.remove('hid');
    } 
    if(emptyFields == false){
        let FBerr = null;
        firebase.auth().signInWithEmailAndPassword(mailIn.value, pwdIn.value).then(()=>{
            window.location.href = "profile.php"
        }).catch(function(error) {
            FBerr = error.message
            msgFBErr.innerHTML = FBerr;
            msgFBErr.classList.remove('hid');
        });
    }
})
logoutBtn.addEventListener('click',()=>{
    let FBerr = null;
    firebase.auth().signOut().then(function() {
        window.location.href = "index.php"
    }).catch(function(error) {
        FBerr = error.message
        msgFBErr.innerHTML = FBerr;
        msgFBErr.classList.remove('hid');
    });
})