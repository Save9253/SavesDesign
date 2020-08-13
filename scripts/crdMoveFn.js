function crdMove (path,cord,UpDwn,RL){
    let cs = path.attributes.d.value.split(/([A-Z])/);
    let crds = [];
    for(i=1;(cs.length-1)>=i;i++){crds.push(cs[i]+cs[i+1]);i++;}

    console.log(crds.length+" points to choose from");

    let crd = crds[cord].split(/([A-Z])/);
    let xy = crd[2].split(/\s/);

    let x = Number(xy[0])+RL;
    let y = Number(xy[1])+(UpDwn*-1);

    let newcrd = crd[1]+x+" "+y;
    let newd ='';

    for(i=0;i<cord;i++){newd = newd.concat('',crds[i])};
    newd = newd.concat('',newcrd);
    for(i=cord+1;i<crds.length;i++){newd = newd.concat('',crds[i])};

    path.attributes.d.value = newd;
}
