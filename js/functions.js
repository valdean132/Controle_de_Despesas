
/* Const */
var include_path = $('base').attr('base');

/* LocalStorage */

const updateLocalStorage = (key, value) => {
    localStorage.setItem(key, JSON.stringify(value));
}

/* ** */

/* Criptografia */

function Encripta(dados){
    var mensx="";
    var l;
    var i;
    var j=0;
    var ch;
    ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";	
    for (i=0;i<dados.length; i++){
        j++;
        l=(Asc(dados.substr(i,1))+(Asc(ch.substr(j,1))));
        if (j==50){
            j=1;
        }
        if (l>255){
            l-=256;
        }
        mensx+=(Chr(l));
    }
    return mensx;
}
function Descripta(dados){
    var mensx="";
    var l;
    var i;
    var j=0;
    var ch;
    ch = "assbdFbdpdPdpfPdAAdpeoseslsQQEcDDldiVVkadiedkdkLLnm";	
    for (i=0; i<dados.length;i++){
        j++;
        l=(Asc(dados.substr(i,1))-(Asc(ch.substr(j,1))));
        if (j==50){
            j=1;
        }
        if (l<0){
            l+=256;
        }
        mensx+=(Chr(l));
    }	
    return mensx;
}
function Asc(String){
    return String.charCodeAt(0);
}
 
function Chr(AsciiNum){
    return String.fromCharCode(AsciiNum)
}

/* ** */

/* * * Efect Relogio * * */

function load(oc){
    if(oc == 1){
        const mElement = document.querySelector('.encaixe_m');
        const hElement = document.querySelector('.encaixe_p');

        const updateClock = () =>{
            let now = new Date();
            let hour = now.getSeconds();
            let minute = now.getSeconds();

            let mDeg = ((360/12) * minute) * 5;
            let hDeg = ((360/60) * hour) * 5;

            mElement.style.transform = `rotate(${mDeg}deg)`;
            hElement.style.transform = `rotate(${hDeg}deg)`;
            
        }

        setInterval(updateClock, 500);
        updateClock();
    }
}

load(1);
/* ** ** */


$(document).ready(function(){
    $('.load-container').css('opacity', '0');
    
    setTimeout(()=>{
        $('.load-container').css('display', 'none');
        load(0);
    }, 500);

});