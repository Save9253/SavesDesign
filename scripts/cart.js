
const cartTitleP = document.querySelector('#cartP');
const fillItUpBtn = document.querySelector('#fillItUpBtn')
const tbody = document.querySelector('tbody')
const total = document.querySelector('#ttl');

function Cart(){
    if(localCart){
        cartTitleP.innerHTML = "Here's what you've got!"
        fillItUpBtn.classList.add('hid')
        let ttl = 0 
        localCart.forEach(item => {
            const tr = document.createElement('tr')
            const TDSVG = document.createElement('td')
            const TDTitle = document.createElement('td')
            const TDPrice = document.createElement('td')
            const TDQty = document.createElement('td')
            TDQty.setAttribute('class','num')
            const TDSub = document.createElement('td')
            TDSub.setAttribute('class','num')
            const TDRem = document.createElement('td')
            TDRem.setAttribute('style','opacity:1 !important')
            db.collection('services').doc(item.id).get().then(res=>{
                const data = res.data()
                let itemPrice = data.price
                if(data.discount){itemPrice = (data.price - (data.discount/100*data.price))}
                if(data.svg){TDSVG.innerHTML = data.svg}
                TDTitle.innerHTML = '<a href="service.php?id='+item.id+'">'+data.title+'</a>'
                if(data.discount){
                    TDPrice.innerHTML = '<div class="num price"><del aria-label="Old Price" class="oldPrice">$'+data.price+'</del><span aria-label="Discount" class="discount">-'+data.discount+'%</span><span aria-label="New Price" class="newPrice">$<span class="itPrice">'+itemPrice+'</span></span></div>'
                }else{
                    TDPrice.innerHTML = '<div class="num price"><span aria-label="New Price" class="newPrice">$<span class="itPrice">'+data.price+'</span></span></div>'
                }
                TDQty.innerHTML = 'x<input aria-label="Quantity" class="qty" name="qty" min="0" type="number" value="'+item.qty+'">'
                TDSub.innerHTML = '$<span class="subTtl">'+itemPrice*item.qty+'</span>'
                TDRem.innerHTML = '<button type="button" aria-label="Remove the '+data.title+'from the cart" aria-pressed="false" class="remAdd icon"><svg overflow="visible" role="img" width="10" stroke-width="2" stroke-linecap="round"  viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path transform="rotate(0)" stroke="var(--acdr)" d="M0 0L10 10 M0 10L10 0"></svg></button>'
                tr.appendChild(TDSVG)
                tr.appendChild(TDTitle)
                tr.appendChild(TDPrice)
                tr.appendChild(TDQty)
                tr.appendChild(TDSub)
                tr.appendChild(TDRem)
                tbody.appendChild(tr)
                
                ttl = ttl + (itemPrice*item.qty)
                total.innerHTML = ttl
            })
        });
    }else{
        cartTitleP.innerHTML = "Your cart is empty!"
        fillItUpBtn.classList.remove('hid')
    }
}
/*
const qtys = document.querySelectorAll('input[type="number"]');
const subTtls = document.querySelectorAll('.subTtl');
const itPrices = document.querySelectorAll('.itPrice');
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
            remAddBtn[i].attributes['aria-pressed'].value=true;
        }else{
            remAddicon[i].attributes.transform.value = 'rotate(0)';
            remAddicon[i].attributes.stroke.value = 'var(--acdr)';
            qtys[i].value = 1;
            remAddBtn[i].attributes['aria-pressed'].value=false;
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
    cartUdate.attributes.action.value='cart.php';
    cartUdate.submit();
})
shop.addEventListener('click',()=>{
    cartUdate.attributes.action.value="shop.php";
    cartUdate.submit();
})
request.addEventListener('click',()=>{
    cartUdate.attributes.action.value="./functions/profile.php?requested=true";
    cartUdate.submit();
})

foreach(array_keys($_SESSION['cart']) as $key){
    while($row = mysqli_fetch_assoc($result)) {
$qty = $_SESSION['cart'][$key];
if($cartItems == ''){$cartItems = $row['id'];}else{$cartItems = $cartItems.','.$row['id'];}
if($qtys == ''){$qtys = $qty;}else{$qtys = $qtys.','.$qty;}


<?php
};
echo '<p role="alert">Something whent wrong</p>'
*/