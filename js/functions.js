
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

/* * * Efect Relogio Reload * * */

$(document).ready(function(){
    $('.load-container').css('opacity', '0');
    
    setTimeout(()=>{
        $('.load-container').css('display', 'none');
    }, 500);
    
});

/* ** */

/* * * Atributos Gerais * * */

$('.value-amount').mask('#.##0,00', {reverse: true});
$('textarea').on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});


/* ** */

/* * * Ocultar Box de Alerta * * */

function boxAlertOcult(){
    $('.box-alert-container').css('opacity', '0').css('top', '-50px');
    setTimeout(()=>{
        $('.box-alert-container').css('diplay', 'none');
    }, 1000);
}
setTimeout(()=>{

    boxAlertOcult();
}, 3000);

/* ** */

/* * * Inpedindo Envio de Formúlario * * */

window.onload = function() {
    history.replaceState("", "", window.location.href);
}

/* ** */