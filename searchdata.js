function fetchmusic(str){
    const flag='search';
    if(str==""){
        document.getElementById('searchresult').innerHTML="search";
    }
    else{
        fetch('fetchmusic.php?q='+str+'&flag='+flag)
    .then(res=>res.json())
    .then(data=>{document.getElementById('searchresult').innerHTML='<li style="display:flex;width:75%;" class="list-data" data-url="'+data.musicurl+'"><img styldata="border:1px solid;border-radius:10px;width:fit-content;" src="'+data.artwork+'" height="50px" width="50px"></img>'+'<div style="width:100%;margin-left:10px;"><div>'+data.songname+'</div>'+'<div style="font-weight:lighter;font-size:medium">'+data.artist+'<span style="float:right;">'+data.duration+'</span></div></div>'+'</li>'})
    .catch(error=>{console.log(error)})
    }
}

//PLAYLIST DATA FETCH
setTimeout(() => {
    const flag='none'
console.log('searchdata called.');
fetch('fetchmusic.php?q='+''+'&flag='+flag)
.then(res=>res.json())
.then(data=>{data.forEach(e => {
    
    $('#playlistdata').append('<li class="list-data" data-url="'+e.musicurl+'"><img style="border:1px solid;border-radius:10px;width:fit-content;" src="'+e.artwork+'" height="50px" width="50px"></img>'+'<div style="width:100%;margin-left:10px;"><div>'+e.songname+'</div>'+'<div style="font-weight:lighter;font-size:medium">'+e.artist+'<span style="float:right;">'+e.duration+'</span></div></div>'+'</li>');
});})
.catch(error=>console.log(error));

}, 100);
//document.getElementById('playlistsearch').addEventListener('onchange',fetchplaylist);

//filter data fetch

function fetchplaylist(e,f){
    const flag='filter';
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload=function(){
        document.getElementById('playlistdata').innerHTML=this.responseText;
    }
    xmlhttp.open('GET','fetchmusic.php?q='+e+'&f='+f+'&flag='+flag,true);
    xmlhttp.send();
    
}


$('#searchresult').on('click','li',()=>{
    console.log($(this).attr('data-url'))
})