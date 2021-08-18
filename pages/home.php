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

<?php
    if(isset($_POST['acao'])){
        $dataHora = explode('T', $_POST['data-hora']);
        $datetimeLocal = $dataHora[0].' '.$dataHora[1].':00';
    }
?>

<h2 class="title-geral">Controle de despesas</h2>
<h2 class="title-geral">
</h2>
<div class="container">
    <div class="mian-RC">
        <!-- <h4>Saldo atual</h4> -->
        <h4><?php echo $datetimeLocal ?></h4>

        <h2 id="balance" class="balance">R$ <span class="value-amount">25500</span></h2>
        <div class="inc-exp-container">
            <div>
                <h4>Receitas</h4>
                <p id="money-plus" class="money plus">+ R$<span class="value-amount">225500</span></p>
            </div>
            <div>
                <h4>Despesas</h4>
                <p id="money-minus" class="money minus">- R$<span class="value-amount">25500</span></p>
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
            <form id="form" method="POST">

                <div class="form-control w50">
                    <label for="tipo-transacao">Transação</label>
                    <input type="text" autofocus list="forma-transacao" name="tipo-transacao" id="tipo-transacao" placeholder="Tipo de transação" required autofocus autocomplete="off"/>
                    <datalist id="forma-transacao">
                        <?php foreach(Painel::$globalVariables['forma-transacao'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Tipo de transação -->

                <div class="form-control w50">
                    <label for="forma-pagamento">Pagamento</label>
                    <input type="text" list="tipo-pagamento" name="forma-pagamento" id="forma-pagamento" placeholder="Forma de Pagamento" required autocomplete="off"/>
                    <datalist id="tipo-pagamento">
                        <?php foreach(Painel::$globalVariables['tipo-pagamento'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Forma de Pagamento -->

                <div class="form-control w50">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" placeholder="Nome da transação" required autocomplete="off"/>
                </div><!-- nome -->
                <div class="form-control w50">
                    <label for="responsavel-transacao">Responsável pela Transação</label>
                    <input type="text" list="resp-trans" name="responsavel-transacao" id="responsavel-transacao" placeholder="Nome do responsável" required autocomplete="off"/>
                    <datalist id="resp-trans">
                        <?php foreach(Painel::$globalVariables['responsavel-transacao'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Forma de Entrada -->
                <div class="form-control w100" id="valor-type">
                    <label for="amount">Valor</label>
                    <input type="text" name="amount" id="amount" placeholder="Valor da transação" required autocomplete="off"/>
                </div><!-- Valor -->
                <!-- onkeypress='return event.charCode >= 48 && event.charCode <= 57' -->
                <div class="form-control" id="entrada-type">
                    <label for="tipo-entrada">Entrada</label>
                    <input disabled type="text" list="forma-entrada" name="tipo-entrada" id="tipo-entrada" placeholder="Tipo de Entrada" required autocomplete="off"/>
                    <datalist id="forma-entrada">
                    <?php foreach(Painel::$globalVariables['forma-entrada'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Forma de Entrada -->

                <div class="form-control w50">
                    <label for="data-hora">Horario da Transação</label>
                    <input type="datetime-local" name="data-hora" required id="data-hora">
                </div><!-- Horario da transação -->

                <div class="form-control w50">
                    <label for="responsavel">Responsável pela Anotação</label>
                    <input type="text" disabled list="resp" name="responsavel" class="disabled" value="<?php echo $_SESSION['nome']; ?>" id="responsavel"/>
                </div><!-- Forma de Entrada -->

                <input type="submit" class="btn" name="acao" value="Adicionar">
            </form>
        </div>
    </div>
</div>
