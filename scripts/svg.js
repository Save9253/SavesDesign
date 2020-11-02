const svgIn = document.querySelector('#svgIn')
const btn = document.querySelector('#RoundUpBtn')
const before = document.querySelector('#before')
const after = document.querySelector('#after')

function roundUp(num, precision) {
    let res = "wrong entry";
    num = Number(num)
    precision = Number(precision)
    if(precision != NaN){
        num = num / precision
        res = Math.round(num)
        res = res * precision
        if(res.toString().match(/[0]+[1-9]/)){
            res = res.toString().replace(/[0]+[1-9]/,'')
        }
    }
    return res;
}

let prec = '0.1'

btn.addEventListener('click',()=>{
    let string = svgIn.innerHTML
    string = string.replaceAll('&nbsp;',' ')
    string = string.replaceAll('&lt;','<')
    string = string.replaceAll('&gt;','>')
    string = string.replaceAll(/<div([^>]*)>/g,' ')
    string = string.replaceAll('</div>',' ')
    string = string.replaceAll(/<span([^>]*)>/g,' ')
    string = string.replaceAll('</span>',' ')
    string = string.replaceAll('strokeLinecap','stroke-linecap')
    string = string.replaceAll('strokeWidth','stroke-width')
    string = string.replaceAll('strokeLinejoin','stroke-linejoin')
    string = string.replaceAll('strokeDasharray','stroke-dasharray')
    string = string.replaceAll('fillOpacity','fill-opacity')
    string = string.replaceAll('strokeOpacity','stroke-opacity')

    before.innerHTML = string
    
    const matches = string.match(/\d*\.\d*/g)
    
    matches.forEach(match=>{
        let rounded = roundUp(match,prec)
        string = string.replace(match,rounded)
    })
    
    after.innerHTML = string

    string = string.replaceAll('<','&lt;')
    string = string.replaceAll('>','&gt;<br>')
    svgIn.innerHTML = string
})