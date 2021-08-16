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
                    <label for="tipo-transacao">Tipo de Transação</label>
                    <input type="text" autofocus list="forma-transacao" name="tipo-transacao" id="tipo-transacao" placeholder="Tipo da transação" required autofocus autocomplete="off"/>
                    <datalist id="forma-transacao">
                        <option value="Entrada">
                        <option value="Saída">
                    </datalist>
                </div><!-- Tipo de transação -->

                <div class="form-control w50">
                    <label for="forma-pagamento">Forma de Pagamento</label>
                    <input type="text" list="tipo-pagamento" name="forma-pagamento" id="forma-pagamento" placeholder="Forma de Pagamento" required autocomplete="off"/>
                    <datalist id="tipo-pagamento">
                        <option value="Dinheiro">
                        <option value="Cartão de Credito">
                        <option value="Cartão de Debito">
                        <option value="Pix">
                    </datalist>
                </div><!-- Forma de Pagamento -->

                <div class="form-control w100">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" placeholder="Nome da transação" required autocomplete="off"/>
                </div><!-- nome -->

                <div class="form-control w100" id="valor-type">
                    <label for="amount">Valor</label>
                    <input type="number" name="amount" id="amount" placeholder="Valor da transação" required autocomplete="off"/>
                </div><!-- Valor -->
                
                <div class="form-control" id="entrada-type">
                    <label for="tipo-entrada">Tipo de Entrada</label>
                    <input disabled type="text" list="forma-entrada" name="tipo-entrada" id="tipo-entrada" placeholder="Tipo de Entrada" required autocomplete="off"/>
                    <datalist id="forma-entrada">
                        <option value="Fatura">
                        <option value="Instalação">
                        <option value="Emprestimo">
                        <option value="Reposição">
                    </datalist>
                </div><!-- Forma de Entrada -->

                <div class="form-control w50">
                    <label for="data-hora">Horario da Transação</label>
                    <?php
                        $datetimeLocal = explode(' ', date('Y-m-d H:i:s'));
                        $datetimeLocalAgendado = $datetimeLocal[0].'T'.$datetimeLocal[1];
                    ?>
                    <input type="datetime-local" value="<?php echo $datetimeLocalAgendado; ?>" name="data-hora" required id="data-hora">
                </div><!-- Horario da transação -->

                <div class="form-control w50">
                    <label for="responsavel">Responsável</label>
                    <input type="text" list="resp" name="responsavel" id="responsavel" placeholder="Tipo de Entrada" required autocomplete="off"/>
                    <datalist id="resp">
                        <option value="Sandro Cordovil">
                        <option value="Valdean Souza">
                    </datalist>
                </div><!-- Forma de Entrada -->

                <input type="submit" class="btn" value="Adicionar">
            </form>
        </div>
    </div>
</div>
