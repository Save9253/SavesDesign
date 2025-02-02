const svgIn = document.querySelector('#svgIn')
const btn = document.querySelector('#RoundUpBtn')
const before = document.querySelector('#before')
const after = document.querySelector('#after')

const tos = document.querySelectorAll('input[name="roundTo"]')
const fors = document.querySelectorAll('input[name="roundFor"]')

let prec = '1';
let For = 'HTML';
tos.forEach(to=>{
    to.addEventListener('click',()=>{
        prec = to.value
    })}
)
fors.forEach(foR=>{
    foR.addEventListener('click',()=>{
        For = foR.value
    })}
)

function roundUp(num, precision) {
    let res = "wrong entry";
    num = Number(num)
    precision = Number(precision)
    if(precision != NaN){
        num = num / precision
        res = Math.round(num)
        res = res * precision
        if(res.toString().match(/0[0]+[1-9]/)){
            res = res.toString().replace(/0[0]+[1-9]/,'')
        }
    }
    return res;
}

btn.addEventListener('click',()=>{
    let string = svgIn.innerHTML
    string = string.replaceAll('xmlns="http://www.w3.org/2000/svg"','sss')
    string = string.replaceAll('&nbsp;',' ')
    string = string.replaceAll('<br>',' ')
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

    if(For == 'JS'){
        string = string.replaceAll('-line','Line')
        string = string.replaceAll('-width','Width')
        string = string.replaceAll('-dash','Dash')
        string = string.replaceAll('-opacity','Opacity')
        string = string.replaceAll('svg','Svg')
        string = string.replaceAll('path','Path')
        string = string.replaceAll('sss','')
    }else{
        string = string.replaceAll('sss','xmlns="http://www.w3.org/2000/svg"')
    }
    svgIn.innerHTML = string
})