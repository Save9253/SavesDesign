const PackgsDiv = document.querySelector('#packages')
const AllServicesDiv = document.querySelector('#services') 

function add2cart (itemId,qty){
    let indx = localCart.findIndex(item => item.id == itemId)
    if(indx == -1){
        localCart.push({id:itemId,qty:qty})
    }else{
        localCart[indx].qty++
    }
    const uid = firebase.auth().currentUser.uid
    const docRef = db.collection('users').doc(uid)
    docRef.set({cart: localCart})
}

function servicesLoop (orderby,category,parent,quant) {
    db.collection("services").orderBy(orderby).get().then((res) => {
        res.forEach((doc) => {
            const dt = doc.data()
            if(dt.category == category){
                const ServsDiv = document.createElement('div')
                ServsDiv.setAttribute('aria-label',dt.title)
                ServsDiv.setAttribute('class','service')
    
                const ServsH3 = document.createElement('h3')
                ServsH3.innerHTML = '<a href="service.php?id='+doc.id+'">'+dt.title+'</a>'
                ServsDiv.appendChild(ServsH3)
                
                if(dt.svg){
                    const SVGDiv = document.createElement('div')
                    SVGDiv.innerHTML = dt.svg
                    ServsDiv.appendChild(SVGDiv)
                }
    
                const HR = document.createElement('hr')
                ServsDiv.appendChild(HR)
                
                const P = document.createElement('p')
                P.innerHTML = dt.description
                const DesDiv = document.createElement('div')
                DesDiv.setAttribute('aria-label','Description')
                DesDiv.setAttribute('class','description')
                DesDiv.appendChild(P)
                ServsDiv.appendChild(DesDiv)
    
                if(dt.includes){
                    const incs = dt.includes
                    const H4 = document.createElement('h4')
                    H4.setAttribute('class','includes')
                    H4.innerHTML = 'Includes:'
                    DesDiv.appendChild(H4)
                    const Ul = document.createElement('ul')
                    Ul.setAttribute('class','includes')
                    incs.forEach(inc => {
                        const A = document.createElement('a')
                        A.setAttribute('href','service.php?id='+inc)
                        A.innerHTML = inc.replace(/-/g,' ')
                        Ul.appendChild(A)
                    })
                    DesDiv.appendChild(Ul)
                }
    
                if(dt.requires){
                    const reqs = dt.requires
                    const H4 = document.createElement('h4')
                    H4.setAttribute('class','requires')
                    H4.innerHTML = 'Requires:'
                    DesDiv.appendChild(H4)
                    const Ul = document.createElement('ul')
                    Ul.setAttribute('class','requires')
                    reqs.forEach(req => {
                        const A = document.createElement('a')
                        A.setAttribute('href','service.php?id='+req)
                        A.innerHTML = req.replace(/-/g,' ')
                        Ul.appendChild(A)
                    })
                    DesDiv.appendChild(Ul)
                }
                
                const HR2 = document.createElement('hr')
                ServsDiv.appendChild(HR2)
    
                const priceDiv = document.createElement('div')
                priceDiv.setAttribute('class','price')
                priceDiv.setAttribute('aria-label','Price')
                if(dt.discount){
                    priceDiv.innerHTML = '<del class="oldPrice" aria-label="Old Price">$'+dt.price+'</del><span class="discount" aria-label="Discount">-'+dt.discount+'%</span><span class="newPrice" aria-label="New Price">$'+(dt.price - (dt.discount/100*dt.price))+'</span>'
                }else{
                    priceDiv.innerHTML = '<span class="newPrice" aria-label="New Price">$'+dt.price+'</span>'
                }
                ServsDiv.appendChild(priceDiv)
                
                if(quant == true){
                    const addWqtyDiv = document.createElement('div')
                    addWqtyDiv.setAttribute('aria-label','Add to Cart '+dt.title)
                    addWqtyDiv.setAttribute('class',"addTCartWqty")

                    const qtyIn = document.createElement('input')
                    qtyIn.setAttribute('aria-label','Quantity of the item ' + dt.title)
                    qtyIn.setAttribute('class','qty')
                    qtyIn.setAttribute('name','qty')
                    qtyIn.setAttribute('type','number')
                    qtyIn.setAttribute('min','1')
                    qtyIn.setAttribute('value','1')
                    addWqtyDiv.appendChild(qtyIn)

                    const btn = document.createElement('button')
                    btn.setAttribute('aria-label','Add to Cart ' + dt.title)
                    btn.setAttribute('type','button')
                    btn.innerHTML = 'Add to Cart'
                    addWqtyDiv.appendChild(btn)

                    ServsDiv.appendChild(addWqtyDiv)
                    btn.addEventListener('click',()=>{
                        if(!firebase.auth().currentUser){
                            window.location.href = 'login.php?msg=login'
                        }else{
                            add2cart(doc.id,Number(qtyIn.value))
                        }
                    }) 

                }else{
                    const btn = document.createElement('button')
                    btn.setAttribute('aria-label','Add to cart '+ doc.id)
                    btn.setAttribute('class','addTCart')
                    btn.setAttribute('type','button ')
                    btn.setAttribute('data-id',doc.id)
                    btn.innerHTML = 'Add to Cart'
                    ServsDiv.appendChild(btn)
                    btn.addEventListener('click',()=>{
                        if(!firebase.auth().currentUser){
                            window.location.href = 'login.php?msg=login'
                        }else{
                            add2cart(doc.id,1)
                        }
                    }) 
                }
           
                parent.appendChild(ServsDiv)
            }
        });
    }).catch((error)=>{console.log(error)})
}

servicesLoop('price','Packages',PackgsDiv,false)

servicesLoop('price','Web',AllServicesDiv,true)
