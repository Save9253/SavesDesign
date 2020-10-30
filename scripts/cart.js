
const cartTitleP = document.querySelector('#cartP');
const fillItUpBtn = document.querySelector('#fillItUpBtn')
const tbody = document.querySelector('tbody')
const total = document.querySelector('#ttl');
const theDiv = document.querySelector('#theDiv')

const subTtls = [];
const qtys = [];
const icons = [];
const prices = [];
const trs = [];

function TotalRecount() {
    let newSum = 0
    subTtls.forEach(sbttl=>{
        newSum = newSum + Number(sbttl.innerHTML)
    })
    total.innerHTML =newSum
}

function Cart(){
    if(localCart){
        cartTitleP.innerHTML = "Here's what you've got!"
        fillItUpBtn.classList.add('hid')
        let ttl = 0 
        let timeout = 0;
        if(theDiv.style.opacity == '1'){
            theDiv.style.opacity = 0
            timeout = 1000
        }
        setTimeout(()=>{
            tbody.innerHTML=null
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
                prices.push(itemPrice)
                if(data.discount){itemPrice = (data.price - (data.discount/100*data.price))}
                if(data.svg){TDSVG.innerHTML = data.svg}
                TDTitle.innerHTML = '<a href="service.php?id='+item.id+'">'+data.title+'</a>'
                if(data.discount){
                    TDPrice.innerHTML = '<div class="num price"><del aria-label="Old Price" class="oldPrice">$'+data.price+'</del><span aria-label="Discount" class="discount">-'+data.discount+'%</span><span aria-label="New Price" class="newPrice">$<span class="itPrice">'+itemPrice+'</span></span></div>'
                }else{
                    TDPrice.innerHTML = '<div class="num price"><span aria-label="New Price" class="newPrice">$<span class="itPrice">'+data.price+'</span></span></div>'
                }
                const inpt = document.createElement('input')
                inpt.setAttribute('aria-label','Quantity')
                inpt.setAttribute('class','qty')
                inpt.setAttribute('min','0')
                inpt.setAttribute('type','number')
                inpt.setAttribute('value',item.qty)
                inpt.addEventListener('change',()=>{
                    item.qty = Number(inpt.value)
                    subTtl.innerHTML = inpt.value * itemPrice
                    if(inpt.value == 0){
                        tr.classList.add('removedTR')
                    }else{
                        tr.classList.remove('removedTR')
                    }
                    TotalRecount()
                })
                qtys.push(inpt);
                TDQty.innerHTML = 'x'
                TDQty.appendChild(inpt)

                const subTtl = document.createElement('span')
                subTtls.push(subTtl)
                subTtl.classList.add('subTtl')
                subTtl.innerHTML = itemPrice*item.qty
                TDSub.innerHTML = '$'
                TDSub.appendChild(subTtl);

                const btn = document.createElement('button')
                btn.setAttribute('type','button')
                btn.setAttribute('aria-label','Remove the '+data.title+' from the cart')
                btn.setAttribute('aria-pressed','false')
                btn.setAttribute('class','remAdd icon')
                btn.addEventListener('click',()=>{
                    if(inpt.value != 0){
                        inpt.value = 0
                        icon.attributes.transform.value = 'rotate(45)';
                        icon.attributes.stroke.value = 'var(--dr)'
                        btn.attributes['aria-pressed'].value=true;
                    }else{
                        inpt.value = 1
                        icon.attributes.transform.value = 'rotate(0)';
                        icon.attributes.stroke.value = 'var(--acdr)';
                        btn.attributes['aria-pressed'].value=false;
                    }
                    item.qty = Number(inpt.value)
                    subTtl.innerHTML = inpt.value * itemPrice
                    if(inpt.value == 0){
                        tr.classList.add('removedTR')
                    }else{
                        tr.classList.remove('removedTR')
                    }
                    TotalRecount()
                })
                btn.innerHTML ='<svg overflow="visible" role="img" width="10" stroke-width="2" stroke-linecap="round"  viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path transform="rotate(0)" stroke="var(--acdr)" d="M0 0L10 10 M0 10L10 0"></svg>' 
                TDRem.appendChild(btn)
                tr.appendChild(TDSVG)
                tr.appendChild(TDTitle)
                tr.appendChild(TDPrice)
                tr.appendChild(TDQty)
                tr.appendChild(TDSub)
                tr.appendChild(TDRem)
                trs.push(tr)
                tbody.appendChild(tr)
                const icon = btn.children[0].children[0];
                icons.push(icon)
                
                ttl = ttl + (itemPrice*item.qty)
                total.innerHTML = ttl

                theDiv.style.opacity = 1
            })
        });   
        },timeout)
    }else{
        cartTitleP.innerHTML = "Your cart is empty!"
        fillItUpBtn.classList.remove('hid')
    }
}

const remAddAllBtn = document.querySelector('.remAddAll');
const remAddAllicon = document.querySelector('.remAddAll svg path');

remAddAllBtn.addEventListener('click',()=>{
    for(let i=0;i<qtys.length;i++){
        qtys[i].value = 0;
        icons[i].attributes.transform.value = 'rotate(45)';
        icons[i].attributes.stroke.value = 'var(--dr)'
        localCart[i].qty = Number(qtys[i].value)
        subTtls[i].innerHTML = qtys[i].value * prices[i]
        if(qtys[i].value == 0){
            trs[i].classList.add('removedTR')
        }else{
            trs[i].classList.remove('removedTR')
        }
        TotalRecount()
    }
})

// Submit Cart Update
const save = document.querySelector('#btnSave');
const shop = document.querySelector('#btnShop');
const request = document.querySelector('#btnRequest');

save.addEventListener('click',()=>{
    const uid = firebase.auth().currentUser.uid
    const docRef = db.collection('users').doc(uid)
    docRef.set({cart: localCart})
})
shop.addEventListener('click',()=>{
    const uid = firebase.auth().currentUser.uid
    const docRef = db.collection('users').doc(uid)
    docRef.set({cart: localCart}).then(window.location.href = 'shop.php')
})
request.addEventListener('click',()=>{
    const uid = firebase.auth().currentUser.uid
    const docRef = db.collection('users').doc(uid)
    docRef.set({cart: localCart}).then(window.location.href = 'profile.php?requested=true')
})