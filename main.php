<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/colos.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css" />
    <link rel="sortcut icon" href="financeiro.ico" type="image/x-icon" />
    <title>Controle de despesas</title>
</head>
<body class="">
    <div class="icons">
        <div class="btn-dark"></div><!-- Btn Dark -->
        <div class="delete-control"></div><!-- Deletar Tudo -->
    </div><!-- Icons -->

    <div class="box-delete">
        <div class="conf-delet">
            <h1>Deseja Deletar as anotações de ENTRADA e SAÍDA</h1>
            <div class="conf-btn">
                <a class="cont-btn-wraper conf-sim" href="">Sim</a>
                <a class="cont-btn-wraper conf-nao" href="">Não</a>
            </div><!-- Conf BTN -->
        </div><!-- Conf Delet -->
    </div><!-- Box Delet -->
    <div class="box-delete box-msg-conf">
        <div class="conf-delet msg-conf">
            <h1>As anotações de ENTRADA e SAÍDA foram deletadas com SUCESSO</h1>
        </div><!-- Conf Delet -->
    </div>

    <h2 class="title-geral">Controle de despesas</h2>
    <div class="container">
        <div class="mian-RC">
            <h4>Saldo atual</h4>
    
            <h2 id="balance" class="balance">R$ 0.00</h2>
            <div class="inc-exp-container">
                <div>
                    <h4>Receitas</h4>
                    <p id="money-plus" class="money plus">+ R$0.00</p>
                </div>
                <div>
                    <h4>Despesas</h4>
                    <p id="money-minus" class="money minus">- R$0.00</p>
                </div>
            </div>
        </div>

        <div class="entrada-saida">
            <ul id="transactions" class="transactions">
                <div class="transacao trans-entrada">
                    <h3>Entrada</h3>
                    <div id="entrada"></div>
                </div>
                <div class="transacao trans-saida">
                    <h3 class="transacao-title">Saída</h3>
                    <div id="saida"></div>
                </div>
            </ul>
        </div>
        

        <div class="adcionar">
            <h3>Adicionar transação</h3>

            <form id="form">
                <div class="form-control">
                    <label for="text">Nome</label>
                    <input autofocus type="text" id="text" placeholder="Nome da transação" required autofocus autocomplete="off"/>
                </div>

                <div class="form-control">
                    <label for="amount">Valor <br />
                        <small>(negativo - despesas, positivo - receitas)</small>
                    </label>
                    <input type="number" id="amount" placeholder="Valor da transação" required autocomplete="off"/>
                </div>

                <button class="btn">Adicionar</button>
            </form>
        </div>
    </div>

    
    <script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/efect.js"></script>
</body>
</html>