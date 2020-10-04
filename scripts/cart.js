const qtys = document.querySelectorAll('input[type="number"]');
const subTtls = document.querySelectorAll('.subTtl');
const itPrices = document.querySelectorAll('.itPrice');
const total = document.querySelector('#ttl');

for(let i=0;i<qtys.length;i++){
    qtys[i].addEventListener('change',()=>{
        subTtls[i].innerHTML = Number(itPrices[i].innerHTML)*qtys[i].value;
        let sum = 0;
        subTtls.forEach(subTtl=> {sum = sum + Number(subTtl.innerHTML)});
        total.innerHTML = sum;
    })
};
