const errFlds = document.querySelectorAll('.errFld');
errFlds.forEach((errFld) => {errFld.addEventListener('keyup',()=>{
    errFld.classList.remove('errFld');
})});

const eyePwds = document.querySelectorAll('.eyePwd');
const eyePwdPaths = document.querySelectorAll('.eyePwd path');
const eyeSVG = document.querySelectorAll('.eyePwd svg');
const pwdInps = document.querySelectorAll('.pwdDiv input');
const eyePwdDOpen = "M0 13.8L4.5 11.8L8.5 11.2L9.4 15.6L15 18L20.6 15.6L21.5 11.2L25.5 11.8L30 13.8L27 10.3L20.9 8.2L15 7.5L9.1 8.2L3 10.3Z";
const eyePwdDClosed = "M0 13.8L2.7 16.3L8.5 17.5L9.3 17.6L15 18L20.7 17.6L21.5 17.5L27.3 16.3L30 13.8L27 14.8L21 15.6L15 15.8L9 15.6L3 14.8Z";
const pwdTTs = document.querySelectorAll('.tooltipPwd');
function eyeSetup (b){
    eyePwds[b].addEventListener('click',()=>{
        if(eyePwdPaths[b].attributes.d.value == eyePwdDOpen){
            for(c=0;c<eyePwds.length;c++){
                eyePwdPaths[c].attributes.d.value = eyePwdDClosed;
                eyePwds[c].attributes['aria-pressed'].value = 'false';
                eyePwds[c].attributes['aria-label'].value = 'Show Pasword';
                pwdInps[c].type = "password";
                pwdTTs[c].innerHTML = "Show";
                pwdTTs[c].attributes['aria-label'].value = 'Show Password Label';
                eyeSVG[c].attributes['aria-label'].value = 'Closed eye';
            }
        }else{
            for(c=0;c<eyePwds.length;c++){
                eyePwdPaths[c].attributes.d.value = eyePwdDOpen;
                eyePwds[c].attributes['aria-pressed'].value = 'true';
                pwdInps[c].type = "text";
                pwdTTs[c].innerHTML = "Hide";
                eyePwds[c].attributes['aria-label'].value = 'Hide Password';
                pwdTTs[c].attributes['aria-label'].value ='Hide Password Label';
                eyeSVG[c].attributes['aria-label'].value = 'Open eye';
            }
        };
    });
    eyePwds[b].addEventListener('mouseenter',()=>{pwdTTs[b].style.opacity = 1;});
    eyePwds[b].addEventListener('mouseleave',()=>{pwdTTs[b].style.opacity = 0;});

    eyePwds[b].addEventListener('focus',()=>{pwdTTs[b].style.opacity = 1;});
    eyePwds[b].addEventListener('blur',()=>{pwdTTs[b].style.opacity = 0;});

    setTimeout(()=>{
        eyePwdPaths[b].attributes.d.value = eyePwdDClosed;
    },1000);
};
for(a=0;a<eyePwds.length;a++){eyeSetup(a)};

//Checkbox animation
const checkboxes = document.querySelectorAll(".checkbox");
const checkMarks = document.querySelectorAll('.checkboxSVG path');
const checked = 'M2 5L6 8L13 2L6 13Z';
const notchecked = 'M6 8L6 8L6 8L6 8Z';

function checkMark(ch){
    checkboxes[ch].addEventListener('change',()=>{
        if(checkboxes[ch].checked){
            checkMarks[ch].attributes.d.value = checked;
        }else{
            checkMarks[ch].attributes.d.value = notchecked;
        }
    });
};

for(i=0;i<checkboxes.length;i++){checkMark(i)};

//Wink Logo
const norm = {
    nose:"M151 176L162 171L205 164L165 176L156 189L157 214L168 226L163 243L142 246L132 246L109 241L105 225L111 236L127 232L140 236L152 232L156 222L148 209L148 187L151 176Z",
    TLip:"M95 271L100 269L129 265L134 267L140 266L167 273L172 275L171 277L145 273L134 274L123 272L99 274L95 271Z",
    BLip:"M113 290L126 301L143 302L153 291L144 294L123 292L113 290Z",
    RnoseD:"M146 241L152 238L161 239L153 242L146 241Z",
    Reye:"M182 171L196 172L207 179L195 176L189 176L188 181L182 184L175 181L174 176L166 177L161 180L165 176L182 171Z",
    mustch:"M88 271L90 262L125 251L135 255L145 254L180 265L180 275L175 271L145 260L134 261L126 258L93 268L88 271Z",
    ReyeB:"M151 176L158 163L208 152L221 174L205 164L162 171L151 176Z",
}
const wink = {
    nose:"M150 179L162 174L198 167L164 175L157 182L156 210L165 223L163 238L141 242L131 243L108 240L104 224L110 234L126 230L139 232L153 228L154 221L148 208L148 184L150 179Z",
    TLip:"M95 269L99 268L128 261L135 263L142 260L171 259L176 262L174 264L147 274L137 276L128 276L98 273L95 269Z",
    BLip:"M113 289L127 299L149 295L160 284L151 287L124 290L113 289Z",
    RnoseD:"M143 236L150 233L158 234L150 237L143 236Z",
    Reye:"M180 174L196 177L206 179L200 179L189 179L187 178L181 178L175 179L174 179L165 180L161 181L165 178L180 174Z",
    mustch:"M87 270L90 260L124 250L135 251L145 248L179 248L182 259L177 255L144 254L133 257L125 257L92 266L87 270Z",
    ReyeB:"M150 179L157 166L201 154L216 172L198 167L162 174L150 179Z",
}

const noseLg = document.querySelector('#LgFace #noseLg');
const TLipLg = document.querySelector('#LgFace #TLipLg');
const BLipLg = document.querySelector('#LgFace #BLipLg');
const RnoseDLg = document.querySelector('#LgFace #RnoseDLg');
const ReyeLg = document.querySelector('#LgFace #ReyeLg');
const mustchLg = document.querySelector('#LgFace #mustchLg');
const ReyeBLg = document.querySelector('#LgFace #ReyeBLg');

const logoLink = document.querySelector('#logoLink');

logoLink.addEventListener('mouseenter',()=>{expr(wink);ReyeOp = false});
logoLink.addEventListener('mouseleave',()=>{expr(norm);ReyeOp = true});

logoLink.addEventListener('focus',()=>{expr(wink);ReyeOp = false});
logoLink.addEventListener('blur',()=>{expr(norm);ReyeOp = true});

function expr(expression){
    noseLg.attributes.d.value = expression.nose;
    TLipLg.attributes.d.value = expression.TLip;
    RnoseDLg.attributes.d.value = expression.RnoseD;
    BLipLg.attributes.d.value = expression.BLip;
    ReyeLg.attributes.d.value = expression.Reye;
    mustchLg.attributes.d.value = expression.mustch;
    ReyeBLg.attributes.d.value = expression.ReyeB;
}