
const hamB = document.querySelector('#hamburger');
const body = document.querySelector('body');
const sideNav = document.querySelector('#sideNav');
const content = document.querySelector('#content');

hamB.addEventListener('click',()=>{
    body.classList.toggle('bodyMoved');
    sideNav.classList.toggle('navMoved');
});
content.addEventListener('click',()=>{
    if(body.classList.contains('bodyMoved')){body.classList.remove('bodyMoved')}
    if(sideNav.classList.contains('navMoved')){sideNav.classList.remove('navMoved')}
});
