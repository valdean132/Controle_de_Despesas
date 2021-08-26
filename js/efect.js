/* * * Transactions Dinâmico * * */
dynamicLoadingTransactions();

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
const btnTransations = $('.abrir-transations');
btnTransations.click(()=>{
    
    mostrarPopup();
    $('[name="uniqId"]').val(geradorUniqId());
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
    // let observacoes = $('[name="observacoes"]')

    inputs.find(':input').prop('disabled', bool);

    inputsValue.each(function(i){
            inputsTable[i] = $(this).attr('name');
    })

    

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
            }

        }
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
    $('[realtimetrasactions]').click(function(){
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
            success: function(data){
                infoTransactions = objectGenerator(data.split('"'));
                valuesTransactionsInput(infoTransactions, true);
                $(`[name=amount`).mask('#.##0,00', {reverse: true});
                btnSubmitTransaction(['editar', 'Editar']);
            }
        });
        
        window.history.pushState('', '', '?'+pagina);
        
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
    })
}

/* ** */
