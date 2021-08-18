/* * * Btn DarkMode * * */

const btnDark = document.querySelector('.btn-dark');
const body    = document.querySelector('body');

let classDarkMode     = localStorage.getItem('classDark');
let classDarkModeNome = JSON.parse(classDarkMode);

if(classDarkModeNome !== null){
    if(classDarkModeNome.nome === 'black'){
        body.classList.add(classDarkModeNome.nome);
    }
}


btnDark.addEventListener("click", () => {
    if(body.classList == 'black'){
        localSttorageName = {nome: ''};
        updateLocalStorage('classDark', localSttorageName);
        body.classList.remove('black');
    }else{
        localSttorageName = {nome: 'black'};
        updateLocalStorage('classDark', localSttorageName);
        body.classList.add('black');
    }
});

/* ** ** */

/* * * Menu Show * * */

const boxMenu = $('.menu-container');
const amberMenu = $('.barrinhas-menu');

amberMenu.click(()=>{
    if(boxMenu.hasClass('active')){
        boxMenu.removeClass('active');
    }else{
        boxMenu.addClass('active');
    }
});



/* ** ** */


/* * * Menu Show * * */



// dynamicLoading();

function dynamicLoading(){
    const containerCenter = $('.container-center');
    $('[realtime]').click(function(){
        var pagina = $(this).attr('realtime');

        let url = include_path+'pages/'+pagina+'.php';
        containerCenter.hide();
        
        containerCenter.load(url);
        

        if(pagina !== 'home'){
            window.history.pushState('', '', pagina);
        }else{
            window.history.pushState('', '', include_path);
        }
        boxMenu.removeClass('active');
        containerCenter.fadeIn(200);

        return false;
    });
}

/* ** ** */




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


changeTheme(prefersColorScheme);


*/

/* * * Btn Delet * * */

// deleteControlDep();

// function deleteControlDep(){
//     const btnDelet      = document.querySelector('.delete-control');
//     const boxConfDelete = document.querySelector('.box-delete');
//     const boxConfNao    = document.querySelector('.conf-nao');
//     const boxConfSim    = document.querySelector('.conf-sim');
//     const boxMgsConf    = document.querySelector('.box-msg-conf');

//     btnDelet.addEventListener("click", () => {
//         boxConfDelete.style.display = 'flex';
//         setTimeout(()=>{
//             boxConfDelete.style.opacity = '1';
//         }, 500);
//     });

//     boxConfDelete.addEventListener("click", e =>{
//         e.preventDefault();

//         const box_delete = e.target.classList == 'box-delete';
//         const conf_nao   = e.target.classList == 'cont-btn-wraper conf-nao';
//         const conf_sim   = e.target.classList == 'cont-btn-wraper conf-sim';

//         if(box_delete || conf_nao || conf_sim){
//             boxConfDelete.style.opacity = '0';

//             setTimeout(()=>{
//                 boxConfDelete.style.display = 'none';
//             }, 500);
//         }
//     });

//     boxConfSim.addEventListener("click", () => {
//         boxMgsConf.style.display = 'flex';
//         setTimeout(()=>{
//             boxMgsConf.style.opacity = '1';
//         }, 500);
//     });
// }

/* ** ** */

/* * * Popup Trasations * * */

const btnTransations = $('.abrir-transations');
const popupAdicionar = $('.pupup-adcionar');
const fecharPopup = $('.fechar-popup');
const inputData = $('input[name="data-trans"]');
const inputTipoTransacao = $('input[name="tipo-transacao"]');
const divValor = $('#valor-type');
const divEntrada = $('#entrada-type');

// Abrir
btnTransations.click(()=>{
    
    popupAdicionar.css('display', 'block');
    
    setTimeout(()=>{
        popupAdicionar.css('opacity', '1');
    }, 500);

    setInterval(()=>{
        if(inputTipoTransacao.val().toLowerCase() === 'entrada'){
            divValor.css('width', '49%');
            divEntrada.css('width', '49%');
            divEntrada.find(':input').prop('disabled', false);
        }else{
            divValor.css('width', '100%');
            divEntrada.css('width', '0');
            divEntrada.find(':input').prop('disabled', true);
        }
    }, 1000);
    
    divValor.find(':input').maskMoney({thousands:'.', decimal:',', symbolStay: true});

    setInterval(updateClock, 1000);
    updateClock();

    return false;
});

// Fechar 

popupAdicionar.click(e => {
    if(e.target.className === 'pupup-adcionar' || e.target.className === 'fechar-popup'){
        
        
        popupAdicionar.css('opacity', '0');
        setTimeout(()=>{
            popupAdicionar.css('display', 'none');
        }, 500);
        
    }
});


$('.value-amount').mask('#.##0,00', {reverse: true});
/* ** ** */



const updateClock = () =>{
    dataHora = $('input[name="data-hora"]');
    let now = new Date();
    let hour = now.getHours();
    let minute = now.getMinutes();
    let day = now.getDate();
    let month = now.getMonth() + 1;
    let year = now.getFullYear();
    
    if(dataHora.val() == ''){
        dataHora.val(`${year}-${fixZero(month)}-${fixZero(day)}T${fixZero(hour)}:${fixZero(minute)}`);
    }
}

const fixZero = time => {
        return time < 10 ? `0${time}` : time;
}

setInterval(updateClock, 1000);
updateClock();


/* ** ** */