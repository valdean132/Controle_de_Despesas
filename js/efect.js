/* * * Transactions Dinâmico * * */
dynamicLoadingTransactions();

function dynamicLoadingTransactions(){
    const containerTransactions = $('#popup-transactions-mostrar');
    $('[realtimetrasactions]').click(function(){
        var pagina = $(this).attr('realtimetrasactions');
        
        containerTransactions.css('display', 'block');
        setTimeout(()=>{
            containerTransactions.css('opacity', '1');
        }, 500);
        
        $.ajax({
            url: include_path+'pullAjax/transactions-view.php',
            type: 'GET',
            data: pagina,
            success: function(data){
                // containerTransactions.html(data);
                // var teste = <?=data?>
                separada = data.split('"');
                arrayTable = [];
                for(var i = 3; i <= separada.length; i += 4){
                    arrayTable[i-3] = separada[i]
                }
                novaTabela = []
                for(var i = 0; i <= arrayTable.length; i++){
                    j = 0
                    if(arrayTable[i] !== undefined){
                        novaTabela[j] = arrayTable[i];
                        j += 2;
                    }else{
                        j -= 1;
                    }
                }
                console.log(novaTabela);
                // console.log(data[1])
                // geraisAttr();
                // $('.valor-type').find(':input').maskMoney({thousands:'.', decimal:',', symbolStay: true});
            }
        });
        // reloadCr();
        
        window.history.pushState('', '', '?'+pagina);
        
        
        
        return false;
    });
}

/* ** ** */

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
    
function verificacaoDeEntrada(){
    
}

/* * * Popup Trasations * * */

const btnTransations = $('.abrir-transations');
const popupAdicionar = $('#popup-transactions-adcionar');

// Abrir
btnTransations.click(()=>{
    
    popupAdicionar.css('display', 'block');
    
    setTimeout(()=>{
        popupAdicionar.css('opacity', '1');
    }, 500);
    
    setInterval(()=>{
        verificacaoDeEntrada();
    }, 1000);
    
    return false;
});

// Fechar 

const closePopup = $(".pupup-adcionar");

closePopup.click(e => {
    if(e.target.className === 'pupup-adcionar' || e.target.className === 'fechar-popup'){
        
        
        closePopup.css('opacity', '0');
        setTimeout(()=>{
            closePopup.css('display', 'none');
            $('#popup-transactions-mostrar').html('');
        }, 500);
        window.history.pushState('', '', include_path);
        
    }
});

/* ** ** */

const inputTipoTransacao = $('.tipo-transacao-val');
const divValor = $('.valor-type');
const divEntrada = $('.entrada-type');
function verificacaoDeEntrada(){
    if(inputTipoTransacao.val().toLowerCase() === 'entrada'){
        divValor.css('width', '49%');
        divEntrada.css('width', '49%');
        divEntrada.find(':input').prop('required', true);
    }else{
        divValor.css('width', '100%');
        divEntrada.css('width', '0');
        divEntrada.find(':input').prop('required', false);
    }
    divValor.find(':input').maskMoney({thousands:'.', decimal:',', symbolStay: true});
}

