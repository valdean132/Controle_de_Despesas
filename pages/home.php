<div class="icons">
        <div class="delete-control"></div><!-- Deletar Tudo -->
    </div><!-- Icons -->
<div class="box-delete">
    <div class="conf-delet">
        <h2>Deseja Deletar as anotações de ENTRADA e SAÍDA</h2>
        <div class="conf-btn">
            <a class="cont-btn-wraper conf-sim" href="">Sim</a>
            <a class="cont-btn-wraper conf-nao" href="">Não</a>
        </div><!-- Conf BTN -->
    </div><!-- Conf Delet -->
</div><!-- Box Delet -->
<div class="box-delete box-msg-conf">
    <div class="conf-delet msg-conf">
        <h2>As anotações de ENTRADA e SAÍDA foram deletadas com SUCESSO</h2>
    </div><!-- Conf Delet -->
</div>

<h2 class="title-geral">Controle de despesas</h2>
<h2 class="title-geral">
</h2>
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
