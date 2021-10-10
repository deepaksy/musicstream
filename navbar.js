var searchboxbutton=document.querySelector('.inputbox');
var searchboxwrapper=document.querySelector('.searchwrap');
var searchinput = document.getElementById('searchsong');
searchboxbutton.addEventListener('focus',()=>{
    searchboxwrapper.style.display='block';
    //searchinput.focus();
})


searchboxwrapper.addEventListener('focusout',()=>{
    searchboxwrapper.style.display='none';
});

