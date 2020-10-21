const profDiv = document.querySelector('#profDiv')
const login = document.querySelector('#login')
const greeting = document.querySelector('#greeting')

const logoutBtn = document.querySelector('#logoutBtn')

firebase.auth().onAuthStateChanged(function(u) {
    if(u){
        greeting.innerHTML = 'Hello '+u.displayName+'!';
        profDiv.classList.remove('hid');
        login.classList.add('hid');
    }else{
        login.classList.remove('hid');
        profDiv.classList.add('hid');
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