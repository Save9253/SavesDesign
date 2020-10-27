const db = firebase.firestore();
const PackgsDiv = document.querySelector('#packages')

db.collection("services").orderBy('price').get().then((res) => {
    res.forEach((doc) => {
        const dt = doc.data()
        if(dt.category == 'Packages'){
            const PackDiv = document.createElement('div')
            PackDiv.setAttribute('aria-label',dt.title)
            PackDiv.setAttribute('class','service')

            const PackLink = document.createElement('a')
            PackLink.setAttribute('href','service.php?id='+doc.id)
            PackLink.innerHTML = dt.title

            const PackH3 = document.createElement('h3')
            PackH3.appendChild(PackLink)
            PackDiv.appendChild(PackH3)
            
            if(dt.svg){
                const SVGDiv = document.createElement('div')
                SVGDiv.innerHTML = dt.svg
                PackDiv.appendChild(SVGDiv)
            }

            const HR = document.createElement('hr')
            PackDiv.appendChild(HR)
            
            const P = document.createElement('p')
            P.innerHTML = dt.description
            const DesDiv = document.createElement('div')
            DesDiv.setAttribute('aria-label','Description')
            DesDiv.setAttribute('class','description')
            DesDiv.appendChild(P)
            PackDiv.appendChild(DesDiv)

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
            PackDiv.appendChild(HR2)

            const priceDiv = document.createElement('div')
            priceDiv.setAttribute('class','price')
            priceDiv.setAttribute('aria-label','Price')
            if(dt.discount){
                const oldPrice = document.createElement('del')
                oldPrice.setAttribute('class','oldPrice')
                oldPrice.setAttribute('aria-label','Old Price')
                oldPrice.innerHTML = '$'+ dt.price
                priceDiv.appendChild(oldPrice)

                const disc = document.createElement('span')
                disc.setAttribute('class','discount')
                disc.setAttribute('aria-label','Discount')
                disc.innerHTML = '-' + dt.discount + '%'
                priceDiv.appendChild(disc)

                const newPrice = document.createElement('span')
                newPrice.setAttribute('class','newPrice')
                newPrice.setAttribute('aria-label','New Price')
                newPrice.innerHTML = '$' + (dt.price - (dt.discount/100*dt.price))
                priceDiv.appendChild(newPrice)
            }else{
                const newPrice = document.createElement('span')
                newPrice.setAttribute('class','newPrice')
                newPrice.setAttribute('aria-label','New Price')
                newPrice.innerHTML = '$' + dt.price
                priceDiv.appendChild(newPrice)
            }
            PackDiv.appendChild(priceDiv)

            const btn = document.createElement('button')
            btn.setAttribute('aria-label','Add to cart '+ doc.id)
            btn.setAttribute('class','addTCart')
            btn.setAttribute('type','button ')
            btn.setAttribute('data-id',doc.id)
            btn.innerHTML = 'Add to Cart'
            PackDiv.appendChild(btn)
            btn.addEventListener('click',()=>{
                console.log(doc.id)
            })

            PackgsDiv.appendChild(PackDiv)
        }
    });
}).catch((error)=>{console.log(error)})

