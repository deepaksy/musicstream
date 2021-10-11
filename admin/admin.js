//validate uploaded file
function validate(){
    let x=document.forms['myforms']['upload'].value;
    let valext=/(\.mp3)$/i;
    if(!valext.exec(x)){
        document.getElementById('validate').innerHTML="File must be of type mp3!.";
        document.getElementById('submit').disabled='true';
    }
    else{
        document.getElementById('validate').innerHTML='File compatible';
        document.getElementById('submit').disabled=false;
    }
}

function validateImage(){
    let x=document.forms['myforms']['upload'].value;
    let valext=/(\.jpg)$/i;
    if(!valext.exec(x)){
        document.getElementById('validate').innerHTML="Not compatible.";
        document.getElementById('submit').disabled='true';
    }
    else{
        document.getElementById('validate').innerHTML='File compatible';
        document.getElementById('submit').disabled=false;
    }
}
//Upload configs


