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


// /* * * Transactions Dinâmico * * */

// dynamicLoadingTransactions();

// function dynamicLoadingTransactions(){
//     const containerTransactions = $('#popup-transactions-mostrar')
//     $('[realtimetrasactions]').click(function(){
//         var pagina = $(this).attr('realtimetrasactions');

//         paginaSep = pagina.split('?');
        
//         let url = include_path+'pages/'+paginaSep[0]+'.php?'+paginaSep[1];
//         console.log(url);
//         containerTransactions.css('display', 'block');
    
//         setTimeout(()=>{
//             containerTransactions.css('opacity', '1');
//         }, 500);
        
//         containerTransactions.load(url);
        

//         window.history.pushState('', '', pagina);

//         // boxMenu.removeClass('active');
//         // containerTransactions.fadeIn(200);

//         return false;
//     });
// }

/* ** ** */

/* * * Transactions Dinâmico * * */



dynamicLoadingTransactions();

function dynamicLoadingTransactions(){
    $('[realtimetrasactions]').click(function(){
        const containerTransactions = $('#popup-transactions-mostrar');
        var pagina = $(this).attr('realtimetrasactions');

        paginaSep = pagina.split('?');
        
        let url = include_path+'pages/'+paginaSep[0]+'.php?'+paginaSep[1];
        console.log(url);
        containerTransactions.css('display', 'block');
    
        setTimeout(()=>{
            containerTransactions.css('opacity', '1');
        }, 500);
        
        $.get(include_path+paginaSep[0]+'.php', {pagina: '?'+paginaSep[1]}, function(data){
            containerTransactions.html(data);
        });
        // containerTransactions.load(url);
        

        // window.history.pushState('', '', pagina);

        // boxMenu.removeClass('active');
        // containerTransactions.fadeIn(200);

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
const popupAdicionar = $('#popup-transactions-adcionar');
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
            divEntrada.find(':input').prop('required', true);
        }else{
            divValor.css('width', '100%');
            divEntrada.css('width', '0');
            divEntrada.find(':input').prop('required', false);
        }
    }, 1000);
    
    divValor.find(':input').maskMoney({thousands:'.', decimal:',', symbolStay: true});

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

/* ** ** */



