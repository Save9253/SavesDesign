const quEx = {
    LeyeSh:"M47.8 91.5L61.7 99.7L66.1 105.2L72.6 111.1L73.3 103.5L71.5 93.3L65.2 91.7L47.8 91.5Z",
    nose:"M88.6 97.3L98.2 96L116 95.3L94.5 100.3L89.4 107.7L90 122.3L96.5 129L93.9 138.8L81.8 140.4L76 140.4L62.9 137.8L60.4 128.7L63.8 134.5L73.1 132.3L80.6 134.7L87.3 132.3L89.4 126.8L85.2 119.5L85.1 106.7L88.6 97.3Z",
    TLip:"M66 159.7L67.2 157.4L76.7 152.4L79.2 152.7L82.1 151.4L96.7 151.7L98.1 154.2L96 153L83.5 154L80.1 154.9L76.8 155.2L68.7 158.3L66 159.7Z",
    BLip:"M72.6 165.1L77.7 170.2L87.8 169L92.2 162.5L88.5 160.7L77.7 162.5L72.6 165.1Z",
    Rnosed:"M83.8 137.7L87.6 135.7L92.3 136.6L88 138.3L83.8 137.7Z",
    Reye:"M104.6 97.5L112.5 98.3L118.6 102.4L111.9 100.6L108.8 100.4L108 103.5L104.4 105L100.6 103.4L100 100.4L95.4 101.3L92.8 102.9L94.5 100.3L104.6 97.5Z",
    Leye:"M54.1 97.3L61.7 99.7L63.9 102.4L61.1 100.6L58.4 100.3L57.9 102.9L53.8 104.4L49.4 102.8L48.9 99.9L45.6 99.8L40.8 101.6L45.2 98.6L54.1 97.3Z",
    mustch:"M57.4 156.6L58.9 151.2L73.7 146.2L79.5 146.2L83.8 144.7L103.5 146.1L104 151.5L101 149.1L84.9 147.8L79.6 149.5L74.3 150L60.3 154.6L57.4 156.6Z",
    ReyeB:"M88.6 97.3L92.4 90.3L115.7 90.7L122 96.1L116 95.3L98.2 96L88.6 97.3Z",
    LeyeB:"M35 93.4L46.3 87L67 84.4L71.5 93.3L65.2 91.7L47.8 91.5L35 93.4Z",
}
const yesEx = {
    LeyeSh:"M40.1 93.3L60.9 99.8L65.4 105.3L72.9 113.4L73.6 105.8L71.6 99.3L63.4 96.5L40.1 93.3Z",
    nose:"M85.8 103L92.6 100.1L113.4 96L93.8 100.5L89.9 104.9L89.3 120.9L94.6 128.1L93.6 136.8L81 139.1L75.2 139.5L62.1 138L59.6 128.8L62.8 134.3L72.3 132.4L79.8 133.4L87.7 130.9L87.9 126.9L84.5 119.6L84.7 106.1L85.8 103Z",
    TLip:"M54.3 154.6L56.8 153.6L73.4 150L77.6 150.8L81.6 149.3L97.8 148.8L100.6 150.5L99.7 151.5L84.1 157.5L78.3 158.4L73.1 158.4L56.3 156.5L54.3 154.6Z",
    BLip:"M64.6 165.7L72.8 171.4L85.2 169.5L91.4 162.9L86.3 164.6L71.1 166.6L64.6 165.7Z",
    Rnosed:"M81.9 135.8L85.7 133.7L90.4 134.5L86.1 136.3L81.9 135.8Z",
    Reye:"M103.3 100.3L114.3 101.8L117.9 103L114.4 103L108 102.7L107.2 102.7L103.6 102.4L100.2 102.9L99.6 103L94.4 103.7L92 104.1L94.7 102.7L103.3 100.3Z",
    Leye:"M53.4 97.5L60.9 99.8L63.1 102.6L60.4 100.7L57.6 100.4L57.2 103L53 104.5L48.6 103L48.1 100L44.8 99.9L40.1 101.7L44.4 98.7L53.4 97.5Z",
    mustch:"M49.9 155L51.4 149.6L71 143.7L77.1 144.1L82.8 142.3L102.3 142.6L104.2 148.7L101.2 146.4L82.4 145.6L76.3 147.5L71.7 147.5L52.8 153L49.9 155Z",
    ReyeB:"M85.8 103L89.9 95.4L114.9 89L123.9 98.8L113.4 96L92.6 100.1L85.8 103Z",
    LeyeB:"M30 98.1L39.2 86L64.9 91.4L71.6 99.3L63.4 96.5L40.1 93.3L30 98.1Z",
}
const noEx = {
    LeyeSh:"M40.4 93.1L61.2 99.6L65.7 105.1L73.2 113.2L73.9 105.6L71.9 99.1L63.7 96.3L40.4 93.1Z",
    nose:"M86.1 100.3L92.9 97.4L117.3 93.6L94.1 100.3L88.9 107.6L89.5 122.2L96 129L93.4 138.8L81.3 140.4L75.4 140.3L62.4 137.8L59.9 128.6L63.3 134.4L72.6 132.2L80.1 134.6L86.8 132.2L88.9 126.7L84.8 119.4L84.6 106.6L86.1 100.3Z",
    TLip:"M61.8 155L64 154L72.5 152.8L76.6 153.1L80.2 152.8L87.1 153.9L90.2 155.1L89.5 157.3L84.9 155.6L76.7 156.4L65.5 155.8L62.6 156.7L61.8 155Z",
    BLip:"M68.3 170.8L71.9 174.4L80.7 173.4L83.6 168.8L79.6 165.8L72.6 166L68.3 170.8Z",
    Rnosed:"M83.3 137.7L87.1 135.7L91.8 136.5L87.5 138.2L83.3 137.7Z",
    Reye:"M104.1 97.4L112 98.3L118.1 102.3L111.4 100.5L108.3 100.4L107.6 103.4L103.9 104.9L100.1 103.3L99.5 100.4L94.9 101.2L92.3 102.8L94.1 100.3L104.1 97.4Z",
    Leye:"M53.7 97.3L61.2 99.6L63.4 102.4L60.6 100.5L57.9 100.2L57.5 102.8L53.3 104.3L48.9 102.7L48.4 99.8L45.1 99.7L40.3 101.5L44.7 98.5L53.7 97.3Z",
    mustch:"M56.2 154.3L57.9 148L70.2 144.1L77.3 146.2L83.5 144.6L95 150.4L95.8 155.7L92.7 153.5L82.2 149.2L76.7 149.6L71.4 149.1L60.4 152.3L56.2 154.3Z",
    ReyeB:"M86.1 100.3L90.2 92.7L119.2 86.6L126.1 99.4L117.3 93.6L92.9 97.4L86.1 100.3Z",
    LeyeB:"M30.3 97.9L39.4 85.7L65.2 91.2L71.9 99.1L63.7 96.3L40.4 93.1L30.3 97.9Z",
}
const blinkClosed = {
    Reye:"M104.4 103.7L112.4 102.3L118.5 102.3L111.7 103.6L108.6 104.2L107.9 104.4L104.2 105L100.4 104.2L99.8 104L95.2 103.4L92.6 102.8L94.4 102.6L104.4 103.7Z",
    Leye:"M54 102.6L61.5 102.0L63.8 102.4L61 102.9L58.2 103.2L57.8 103.3L53.6 103.6L49.2 103L48.7 102.9L45.5 102.4L40.7 101.5L45 101.3L54 102.6Z",
}
const blinkOpen = {
    Reye:"M104.6 97.5L112.5 98.3L118.6 102.4L111.9 100.6L108.8 100.4L108 103.5L104.4 105L100.6 103.4L100 100.4L95.4 101.3L92.8 102.9L94.5 100.3L104.6 97.5Z",
    Leye:"M54.1 97.3L61.7 99.7L63.9 102.4L61.1 100.6L58.4 100.3L57.9 102.9L53.8 104.4L49.4 102.8L48.9 99.9L45.6 99.8L40.8 101.6L45.2 98.6L54.1 97.3Z",
}

const LeyeSh = document.querySelector('#LeyeSh');
const nose = document.querySelector('#nose');
const TLip = document.querySelector('#TLip');
const BLip = document.querySelector('#BLip');
const Rnosed = document.querySelector('#Rnosed');
const Reye = document.querySelector('#Reye');
const Leye = document.querySelector('#Leye');
const mustch = document.querySelector('#mustch');
const ReyeB = document.querySelector('#ReyeB');
const LeyeB = document.querySelector('#LeyeB');

const yes = document.querySelector('#yes');
const no = document.querySelector('#no');

let ReyeOp = true;

yes.addEventListener('mouseenter',()=>{expr(yesEx);ReyeOp = false});
yes.addEventListener('mouseleave',()=>{expr(quEx);ReyeOp = true});

no.addEventListener('mouseenter',()=>{expr(noEx)});
no.addEventListener('mouseleave',()=>{expr(quEx)});

yes.addEventListener('focus',()=>{expr(yesEx);ReyeOp = false});
yes.addEventListener('blur',()=>{expr(quEx);ReyeOp = true});

no.addEventListener('focus',()=>{expr(noEx)});
no.addEventListener('blur',()=>{expr(quEx)});

function blink() {
    if(ReyeOp){Reye.attributes.d.value = blinkClosed.Reye;}
    Leye.attributes.d.value = blinkClosed.Leye;
    setTimeout(()=>{
        if(ReyeOp){Reye.attributes.d.value = blinkOpen.Reye;}
        Leye.attributes.d.value = blinkOpen.Leye;
    },300);
}
setInterval(() => {blink()}, 4000);

function expr(expression){
    LeyeSh.attributes.d.value = expression.LeyeSh;
    nose.attributes.d.value = expression.nose;
    TLip.attributes.d.value = expression.TLip;
    Rnosed.attributes.d.value = expression.Rnosed;
    BLip.attributes.d.value = expression.BLip;
    Reye.attributes.d.value = expression.Reye;
    Leye.attributes.d.value = expression.Leye;
    mustch.attributes.d.value = expression.mustch;
    ReyeB.attributes.d.value = expression.ReyeB;
    LeyeB.attributes.d.value = expression.LeyeB;
}
