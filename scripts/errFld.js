const errFlds = document.querySelectorAll('.errFld');
errFlds.forEach((errFld) => {errFld.addEventListener('keyup',()=>{errFld.classList.remove('errFld')})});
