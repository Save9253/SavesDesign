const qtys = document.querySelectorAll('input[type="number"]');
const subTtls = document.querySelectorAll('.subTtl');
const itPrices = document.querySelectorAll('.itPrice');
const total = document.querySelector('#ttl');
const trs = document.querySelectorAll('tbody tr');
const remAddBtn = document.querySelectorAll('.remAdd');
const remAddicon = document.querySelectorAll('.remAdd svg path');

function qtyChange(n){
    subTtls[n].innerHTML = Number(itPrices[n].innerHTML)*qtys[n].value;
    let sum = 0;
    subTtls.forEach(subTtl=> {sum = sum + Number(subTtl.innerHTML)});
    total.innerHTML = sum;
    if(qtys[n].value == 0){
        trs[n].classList.add('removedTR')
    }else{
        trs[n].classList.remove('removedTR')
    }
}

for(let i=0;i<qtys.length;i++){
    qtys[i].addEventListener('change',()=>{qtyChange(i)});
    remAddBtn[i].addEventListener('click',()=>{
        if(qtys[i].value != 0){
            remAddicon[i].attributes.transform.value = 'rotate(45)';
            remAddicon[i].attributes.stroke.value = 'var(--dr)'
            qtys[i].value = 0;
        }else{
            remAddicon[i].attributes.transform.value = 'rotate(0)';
            remAddicon[i].attributes.stroke.value = 'var(--ac)'
            qtys[i].value = 1;
        }
        qtyChange(i);
    })
};
