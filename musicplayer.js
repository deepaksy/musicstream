/*import  "./navbar.js";
var dates;
console.log("Music player.js included!");
fetch('fetchmusic.php?')
.then(Response=>Response.json())
.then((data)=>{dates=data;},console.log(globalThis.dates));
document.getElementById('test').click();

document.getElementById('test').addEventListener('click',()=>{
    document.getElementById('audio').play();
})
console.log(dates)*/
//Click play function

var data =[{"name":'ColdHeart',"artist":'Elton John, Dua Lipa'},{"name":'Bon Appetit',"artist":'Kary perry'},{"name":'Shayad',"artist":'Arijit singh'}]
console.log(data[0].name);
$(document).ready(function(){  
    $('.playlistdata','div').on('click','li',function(){
      var li = $(this).next('li');
      var musicurl=$(this).attr('data-url');
      var index=$(this).index();
      localStorage.setItem('currentsongindex',index)
      //autoplay trigger
      document.getElementById('audio').addEventListener('ended',()=>{
        if($(this).index()<($('.playlistdata li').length)-1){
          $(this).next(li).click();
        }
        else{
          document.getElementById('audio').pause();
        }
      })
      //test code)
      //console.log($(this));
      //console.log($(this)[0].lastChild.lastChild.childNodes[0].data)

      //console.log(li[0].dataset.url);
        
        fetch('fetchmusic.php?flag='+'')
        .then(res=>res.json())
        .then(data=>{//Updating songinfo data
          document.getElementById('songname').innerHTML=$(this)[0].lastChild.firstElementChild.innerHTML//data[index].songname;
          document.getElementById('artist').innerHTML=$(this)[0].lastChild.lastChild.childNodes[0].data;
          document.getElementById('author').innerHTML=data[index].author;
          document.getElementById('artwork').src=$(this)[0].firstElementChild.src;
        })
        /*document.getElementById('songname').innerHTML=data[index].name;
        document.getElementById('artist').innerHTML=data[index].artist;*/
        //console.log(index);
        document.getElementById('audio').src=musicurl;
        document.getElementById('audio').play();
        $('.aside_player').css('display','flex');
        $('#songstatus').html('<i id="pause"  class="fas fa-pause"></i>')
        //$(this).fadeOut(500);
    })
    $('#btnAdd').on('click',function(){                
        $('ul').append('<li>New list Item.</li>');
    });
});


//Musicplayer configurations
var duration="0:00";
audio.addEventListener('timeupdate',(e)=>{
    const currentTime  = e.target.currentTime;
     duration = e.target.duration;
     if(isNaN(duration)){
       duration="0:00";
     }
    document.getElementById("duration").innerHTML=audio.duration=="NaN"?"0:00":timeformat(duration);
    document.getElementById("current_time").innerHTML=timeformat(currentTime);
    var progressWidth = (currentTime/duration)*100;
    //console.log(progressWidth);
    document.getElementById("progress").style.width= `${progressWidth}%`;
});

function timeformat(e){
    let mainDuration = e;
    let totalMin  = Math.floor(mainDuration /60);
    let totalSec = Math.floor(mainDuration%60);
    if( totalSec<10){
      totalSec = `0${totalSec}`;
    }
    if(totalSec==NaN){
      totalMin=0;
      totalSec=0;
    }
    var musicDuration = `${totalMin}:${totalSec}`;
    return musicDuration;
  }


//Seek with the progress area 

var progressArea = document.querySelector('#progress_div');

progressArea.addEventListener("click",(e)=>{
  let progressWidth = progressArea.clientWidth;
  let clickedOffsetX=e.offsetX;
  let songDuration = audio.duration;

  audio.currentTime = (clickedOffsetX/progressWidth)*songDuration;
  if(!audio.paused){
    audio.play();
  }
});



//Media session to interact with the notification bar controls
let mediaSession = navigator.mediaSession;

setInterval(navigation,200);

function navigation(){
  var songname=document.getElementById('songname').innerHTML;
var artist=document.getElementById('artist').innerHTML;
var author=document.getElementById('author').innerHTML;
var artwork=document.getElementById('artwork').src;
const mediametadata ={
  title:songname,
  artist:artist,
  album:author,
  artwork: [{src: artwork}]
}
  if(document.getElementById('audio').currentSrc!=""){
    if("mediaSession" in navigator){
      navigator.mediaSession.metadata = new MediaMetadata(mediametadata)
    }
    
    if(audio.paused){
      document.getElementById('songstatus').innerHTML='<i id="play"  class="fas fa-play"></i>';
    }
    navigator.mediaSession.setActionHandler('play',()=>{
      audio.play();
      document.getElementById('songstatus').innerHTML='<i id="pause"  class="fas fa-pause"></i>';
      localStorage.setItem('songstatus','playing');
    });
    navigator.mediaSession.setActionHandler('pause',()=>{
      audio.pause();
      document.getElementById('songstatus').innerHTML='<i id="play"  class="fas fa-play"></i>';
      localStorage.setItem('songstatus','plaused');
    });
    navigator.mediaSession.setActionHandler('seekforward',()=>{
      audio.currentTime+=20;
    });
    navigator.mediaSession.setActionHandler('seekbackward',()=>{
      audio.currentTime-=20;
    })

    navigator.mediaSession.setActionHandler('nexttrack',next);
    navigator.mediaSession.setActionHandler('previoustrack',previous);
  
  }
}


//playbutton events

function playsong(){
  if(audio.paused){
    audio.play();
    document.getElementById('songstatus').innerHTML='<i id="pause"  class="fas fa-pause"></i>';
  }
  else{
    audio.pause();
    document.getElementById('songstatus').innerHTML='<i id="play"  class="fas fa-play"></i>';
  }
}

document.getElementById('songstatus').addEventListener('click',playsong);
document.getElementById('next').addEventListener('click',next);
document.getElementById('previous').addEventListener('click',previous);
function next(){
  $('#playlistdata li').ready(()=>{
    var songIndex =localStorage.getItem('currentsongindex');
    console.log(songIndex);
    $('#playlistdata li')[++songIndex].click();
  })
}

function previous(){
  $('#playlistdata li').ready(()=>{
    var songIndex =localStorage.getItem('currentsongindex');
    console.log(songIndex);
    $('#playlistdata li')[--songIndex].click();
  })
}
