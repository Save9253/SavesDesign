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

for(i=0;i<checkboxes.length;i++){checkMark(i)}
/*
<label class="checkboxLabl">
<input class="checkbox" name="remeber" type="checkbox">
<span>
    <svg class="checkboxSVG" aria-label="Check Mark" role="img" overflow="visible" width="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
        <path d="M6 8L6 8L6 8L6 8Z" fill="white"></path>
    </svg>
</span>Remeber me
</label>;
*/