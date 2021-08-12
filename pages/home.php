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
    
    <a class="btn abrir-transations" href="">
        Adicionar Transação
    </a>

    <div class="pupup-adcionar">
        <div class="adcionar">
            <h3>Adicionar transação</h3>
            
            <div class="fechar-popup"></div>
            <form id="form">

                <div class="form-control w50">
                    <label for="text">Tipo de Transação</label>
                    <input autofocus type="text" list="tipo-transacao" id="tipo" placeholder="Nome da transação" required autofocus autocomplete="off"/>
                    <datalist id="tipo-transacao">
                        <option value="Entrada">
                        <option value="Saída">
                    </datalist>
                </div>

                <div class="form-control">
                    <label for="text">Nome</label>
                    <input type="text" id="text" placeholder="Nome da transação" required autofocus autocomplete="off"/>
                </div>

                <div class="form-control">
                    <label for="amount">Valor <br />
                        <small>(negativo - despesas, positivo - receitas)</small>
                    </label>
                    <input type="number" id="amount" placeholder="Valor da transação" required autocomplete="off"/>
                </div>
                
                <div class="form-control">
                    <label for="text">Horario da Transação</label>
                    <?php
                        $datetimeLocal = explode(' ', date('Y-m-d H:i:s'));
                        $datetimeLocalAgendado = $datetimeLocal[0].'T'.$datetimeLocal[1];
                    ?>
                    <input type="datetime-local" value="<?php echo $datetimeLocalAgendado; ?>" name="data-trans" required id="">
                </div>

                <input type="submit" class="btn" value="Adicionar">
            </form>
        </div>
    </div>
</div>
