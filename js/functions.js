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

function reloadCr(){
    $(document).ready(function(){
        $('.load-container').css('opacity', '0');
        
        setTimeout(()=>{
            $('.load-container').css('display', 'none');
        }, 500);
        
    });
}

reloadCr();

/* ** */

/* * * Atributos Gerais * * */
function geraisAttr(){
    $('.value-amount').mask('#.##0,00', {reverse: true});
    $('textarea').on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
}
geraisAttr();


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

/* * * Object Generator * * */

const objectGenerator = arraySeparada => {
    let arrayTable = [];
    let arrayTableName = [];
    let objTable = {};
    let j = 0;
    for(let i = 1; i <= arraySeparada.length; i += 6){
        if(arraySeparada[i] !== undefined){
            arrayTableName[j] = arraySeparada[i];
            j++;
        }
    }
    for(let i = 3; i <= arraySeparada.length; i += 6){
        if(arraySeparada[i] !== undefined){
            arrayTable[j] = arraySeparada[i];
            j++;
        }
    }
    for(let i = 0; i <= arrayTable.length; i++){
        if(arrayTableName[i] !== undefined){
            objTable[arrayTableName[i]] = arrayTable[i+11];
        }
    }

    return objTable;
}

/* ** */

/* * * Gerador de Id Unico * * */

const geradorUniqId = () => {return new Date().getTime()+'-_-'+(new Date().getTime()*3)}

/* ** */

/* * * Verificar Número * * */

function verifNumber(number){
    if(number == 0){
        return '000';
    }else if(number.length == 1){
        return '00'+number;
    }else if(number.length == 2){
        return '0'+number;
    }else{
        return number;
    }
}

/* ** */











/* 

Chegar tema do sistema

const prefersColorScheme = window.matchMedia('(prefers-color-scheme: dark)');

function changeTheme(e){
    if(e.matches){
        console.log('So sistema é modo dark');
    }else{
        console.log('No sistema é modo light');
    }
};

*/