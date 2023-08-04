/* * * Transactions Dinâmico * * */
$(function(){
    dynamicLoadingTransactions();
    viewsTransactions();
});
rolagemEnd('#entrada, #saida');
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

/* * * Popup Trasations * * */


// Abrir
/* Adicionar ou visualizar */
const btnTransations = $('.abrir-transations');
btnTransations.click(()=>{
    
    mostrarPopup();
    $('[name="uniqId"]').val(geradorUniqId());
    $('.adcionar h3').text('Adicionar transação');
    geraisAttr();
    btnSubmitTransaction(['acao', 'Adicionar']);

    return false;
});





// Fechar 


let popupAdicionar = $('.pupup-adcionar');
popupAdicionar.click(e => {
    closePopup(e)
});

/* ** ** */

/* Functions */

// Guardar Divs
function addDiv(){
    removeDiv();
    let divTrasactions = $('.container-popup-adcionar').html();
    popupAdicionar.html(divTrasactions);
}
// Remover Divs
function removeDiv(){
    $('.pupup-adcionar .adcionar').remove();
}

// Mostrar Popup
function mostrarPopup(){
    popupAdicionar.css('display', 'block');

    addDiv();
    $('[name="resp-responsavel"]').prop('disabled', true);
    setTimeout(()=>{
        popupAdicionar.css('opacity', '1');
    }, 500);
    
    setInterval(()=>{
        verificacaoDeEntrada();
    }, 1000);
    
}

// Fechar Popup
function closePopup(e){
    let popupAdicionar = $(".pupup-adcionar");
    if(e.target.className === 'pupup-adcionar' || e.target.className === 'fechar-popup'){
        
        popupAdicionar.css('opacity', '0');
        setTimeout(()=>{
            popupAdicionar.css('display', 'none');
            removeDiv();
        }, 500);
        window.history.pushState('', '', include_path);
        valuesTransactionsInput('', false);
        $('textarea').prop('rows', false);
    }
}

// Verificação de Entrada
function verificacaoDeEntrada(){
    let inputTipoTransacao = $('.tipo-transacao-val');
    let divValor = $('.valor-type');
    let divEntrada = $('.entrada-type');
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



// values Transactions
function valuesTransactionsInput(infoTransactions, bool){
    let inputs = $(".form-control");
    let inputsValue = $('[name]');
    let inputsTable = [];
    // let titleAdcionar = $('.adcionar');

    inputs.find(':input').prop('disabled', bool);

    inputsValue.each(function(i){
            inputsTable[i] = $(this).attr('name');
    })
    $('textarea').on('input', function () {
        $('textarea').prop('rows', false);
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
    
    
    
    for(let i = 0; i <= inputsTable.length; i++){
        for(var k in infoTransactions){
            if(inputsTable[i] == k){
                
                $(`[name=${inputsTable[i]}]`).val(infoTransactions[k]);
                if(inputsTable[i] == 'tipo-transacao'){
                    $(`[name=${inputsTable[i]}]`).val(verificTypeEntrada(infoTransactions[k]));
                }
                if(inputsTable[i] == 'amount'){
                    $(`[name=${inputsTable[i]}]`).val(verifNumber(infoTransactions[k]));
                }
                if(inputsTable[i] == 'uniqId'){
                    $('.adcionar h3').text(`Transação ${infoTransactions[k]}`);
                }
            }
        }
    }
    
    if($('textarea').val() != ''){
        valueTxT = $('textarea').val();
        sepTxT = valueTxT.split('\n');
        tamanhoTxT = sepTxT.length;
        $('textarea').prop('rows', tamanhoTxT);
    }
    

}

// Verificação de tipo de Entrada
function verificTypeEntrada(type){
    if(type == 0)
        return 'Saída';
    else if(type == 1)
        return 'Entrada';
}

// Loading Transactions Dynamic
function dynamicLoadingTransactions(){
    var url_atual = window.location.href.split('?')[1];
    if(url_atual != undefined){

        mostrarPopup();
            
        $.ajax({
            url: include_path+'pullAjax/transactions-view.php',
            type: 'GET',
            data: url_atual,
            beforeSend: function(){
                $('.form-control').find(':input').val('Carregando conteúdo...');
                $('.form-control').find(':input').prop('disabled', true);
            },
            error: function(data){
                console.log(data)
            },
            success: function(data){
                infoTransactions = JSON.parse(data);

                valuesTransactionsInput(infoTransactions, true);
                $(`[name=amount]`).mask('#.##0,00', {reverse: true});
                btnSubmitTransaction(['editar', 'Editar']);
            }
        });

        let setlimpar = setInterval(()=>{
            var verificUrl = window.location.href.split('?')[1]
            if(verificUrl == undefined){
                popupAdicionar.css('opacity', '0');
                setTimeout(()=>{
                    popupAdicionar.css('display', 'none');
                    removeDiv();
                }, 500);
                window.history.pushState('', '', include_path);
                valuesTransactionsInput('', false);
                $('textarea').prop('rows', false);

                clearInterval(setlimpar);
            }
        }, 1000)
    }



    $('[realtimetrasactions]').click(function(e){
        if(e.target.className !== 'delete-btn'){
            var pagina = $(this).attr('realtimetrasactions');
        

            mostrarPopup();
            
            $.ajax({
                url: include_path+'pullAjax/transactions-view.php',
                type: 'GET',
                data: pagina,
                beforeSend: function(){
                    $('.form-control').find(':input').val('Carregando conteúdo...');
                    $('.form-control').find(':input').prop('disabled', true);
                },
                error: function(data){
                    console.log(data)
                },
                success: function(data){
                    infoTransactions = JSON.parse(data);

                    valuesTransactionsInput(infoTransactions, true);
                    $(`[name=amount]`).mask('#.##0,00', {reverse: true});
                    btnSubmitTransaction(['editar', 'Editar']);
                }
            });
            
            window.history.pushState('', '', '?'+pagina);
            let setlimpar = setInterval(()=>{
                var verificUrl = window.location.href.split('?')[1]
                if(verificUrl == undefined){
                    popupAdicionar.css('opacity', '0');
                    setTimeout(()=>{
                        popupAdicionar.css('display', 'none');
                        removeDiv();
                    }, 500);
                    window.history.pushState('', '', include_path);
                    valuesTransactionsInput('', false);
                    $('textarea').prop('rows', false);

                    clearInterval(setlimpar);
                }
            }, 1000)
        }

        if(e.target.className === 'delete-btn'){
            let deletTransaction = $(this).attr('realtimetrasactions');
            let deleteTr = deletTransaction+"&delete='transaction'";

            $.ajax({
                url: include_path+'pullAjax/transactions-view.php',
                type: 'GET',
                data: deleteTr,
                error: function(data){
                    console.log(data)
                },
                success: function(data){
                    location.reload();
                }
            });
        }
        
        return false;
    });
}


// Function Edit Transaction (btnSubmitTransaction)
function btnSubmitTransaction(nome){
    $('[type="submit"]').attr('name', nome[0]);
    $('[type="submit"]').val(nome[1]);
    
    if($('[type="submit"]').attr('name') === 'editar'){
        editTransaction($('[type="submit"]'))
    }
}


// Function editar (para enviar edção);
function editTransaction(btnSubmit){
    btnSubmit.click(()=>{
        $('.editTransaction').prop('disabled', false);
        
        
        if(btnSubmit.attr('name') === 'enviar-edicao'){
            window.history.pushState('', '', include_path);
            return true;
        }else{
            btnSubmit.val('Enviar Edição');
            btnSubmit.attr('name', 'enviar-edicao');
            return false;
        }
    });
}

// Rolar pro final da Div
function rolagemEnd(par){
    let divAtha = $(par);
    let random = new Date().getTime();
    var targetOffset = divAtha.height() + random;

    divAtha.animate({
        scrollTop: targetOffset
    });
    
}

function viewsTransactions(){
    $('.btn-transactions').click(function(){
        let popupAdicionar = $('.contain-transactions');

        popupAdicionar.css('display', 'block');
        $(`[popup="${$(this).attr('href')}"]`).css('display', 'block');

        setTimeout(()=>{
            popupAdicionar.css('opacity', '1');
        }, 500);

        return false;
    });
    $('[popup-x="fechar"]').click(function(e){
        console.log()
        if(e.target.attributes['popup-x'] != undefined){

            let popupAdicionar = $('.contain-transactions');
            popupAdicionar.css('opacity', '0');
    
            
            setTimeout(()=>{
                popupAdicionar.css('display', 'none');
                $(`[popup]`).css('display', 'none');
            }, 500);
        }
    });

}

/* ** */
