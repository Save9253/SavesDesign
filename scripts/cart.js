const qtys = document.querySelectorAll('input[type="number"]');
const subTtls = document.querySelectorAll('.subTtl');
const itPrices = document.querySelectorAll('.itPrice');
const total = document.querySelector('#ttl');
const trs = document.querySelectorAll('tbody tr');

const remAddBtn = document.querySelectorAll('.remAdd');
const remAddicon = document.querySelectorAll('.remAdd svg path');
const remAddAllBtn = document.querySelector('.remAddAll');
const remAddAllicon = document.querySelector('.remAddAll svg path');

const itemQtys = document.querySelector('input[name="qtys"]');

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

    let ttlQty = 0;
    qtys.forEach(qty=> {ttlQty = ttlQty + Number(qty.value)});
    cartText.innerHTML = ttlQty;

    let newItemQty = '';
    qtys.forEach(qty=>{
        if(newItemQty  == ''){newItemQty = qty.value;}else{newItemQty  = newItemQty + ',' + qty.value;}
    })
    itemQtys.value = newItemQty;
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
            remAddicon[i].attributes.stroke.value = 'var(--ac)';
            qtys[i].value = 1;
        }
        qtyChange(i);
    })
};

remAddAllBtn.addEventListener('click',()=>{
    for(let i=0;i<qtys.length;i++){
        qtys[i].value = 0;
        remAddicon[i].attributes.transform.value = 'rotate(45)';
        remAddicon[i].attributes.stroke.value = 'var(--dr)'
        qtyChange(i);
    }

})

// Submit Cart Update
const save = document.querySelector('#btnSave');
const shop = document.querySelector('#btnShop');
const request = document.querySelector('#btnRequest');
const cartUdate = document.querySelector('#cartUpdate');

save.addEventListener('click',()=>{
    cartUdate.attributes.action.value="cart.php";
    cartUdate.submit();
})
shop.addEventListener('click',()=>{
    cartUdate.attributes.action.value="shop.php";
    cartUdate.submit();
})
request.addEventListener('click',()=>{
    cartUdate.attributes.action.value="login.php";
    cartUdate.submit();
})
