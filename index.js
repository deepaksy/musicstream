
const theme = document.querySelector('#themeswitch');//theme switch selector
//Code to get windows theme color


if(localStorage.getItem('theme')){
    document.documentElement.setAttribute('data-theme',localStorage.getItem('theme'));
    if(localStorage.getItem('theme')=="dark"){
        theme.innerHTML='<i class="fas fa-sun"></i>';
    }
    else{
        theme.innerHTML='<i class="fas fa-moon"></i>';
    }
}
else{//sets theme according to user device theme
    setTimeout(() => {
        if(window.matchMedia && window.matchMedia('(prefers-color-scheme:dark)').matches){
            document.documentElement.setAttribute('data-theme','dark');
            localStorage.setItem('theme','dark');
            theme.innerHTML='<i class="fas fa-sun"></i>';
        }
        else{
            document.documentElement.setAttribute('data-theme','light');
            localStorage.setItem('theme','light');
            theme.innerHTML='<i class="fas fa-moon"></i>';
        }
    }, 3);
}



theme.addEventListener('click',settheme);//Click event

function settheme(){
    if(localStorage.getItem('theme')=='light'){
        document.documentElement.setAttribute('data-theme','dark');
        localStorage.setItem('theme','dark');
        theme.innerHTML='<i class="fas fa-sun"></i>';
    }
    else{
        document.documentElement.setAttribute('data-theme','light');
        localStorage.setItem('theme','light');
        theme.innerHTML='<i class="fas fa-moon"></i>';
    }
}


var aboutUs = document.getElementById('aboutUs');

aboutUs.addEventListener('click',()=>{
    var xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText)
    }
  };
  xmlhttp.open("GET", "aboutUs/index.php", true);
  xmlhttp.send();
})
//Program to test user device


var info = window.navigator.appVersion;
var os;
if(info.includes('Win64')){
    os="Windows";
}
else if(info.includes('Android')){
    os="android";
}
else{
    os='Iphone';
}
console.log(os);



