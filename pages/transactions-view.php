<?php

    if(isset($_GET['transaction'])){
        $id = (int)$_GET['transaction'];

        $transactionSelect = PullBench::select('tb.control_transactions', 'uniqId = ?', array($id));
    }else{
        Painel::boxMsg('error', 'O parametro id Não existe');
        die();
    }

    $prev = `
        <div class="adcionar">
            <h3>Visualização de transação</h3>
            
            <div class="fechar-popup"></div>
            <form id="form" method="POST">

                <div class="form-control w50">
                    <label for="tipo-transacao<?php $transactionSelect['uniqId']; ?>">Transação</label>
                    <input type="text" autofocus disabled value="<?php echo $transactionSelect['tipo-transacao']; ?>" list="forma-transacao<?php $transactionSelect['uniqId']; ?>" name="tipo-transacao<?php $transactionSelect['uniqId']; ?>" id="tipo-transacao<?php $transactionSelect['uniqId']; ?>" placeholder="Tipo de transação" required autofocus autocomplete="off"/>
                    <datalist id="forma-transacao">
                        <?php foreach(Painel::$globalVariables['forma-transacao'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Tipo de transação -->

                <div class="form-control w50">
                    <label for="forma-pagamento<?php $transactionSelect['uniqId']; ?>">Pagamento</label>
                    <input type="text" list="tipo-pagamento<?php $transactionSelect['uniqId']; ?>" disabled value="<?php echo $transactionSelect['forma-pagamento']; ?>" name="forma-pagamento<?php $transactionSelect['uniqId']; ?>" id="forma-pagamento<?php $transactionSelect['uniqId']; ?>" placeholder="Forma de Pagamento" required autocomplete="off"/>
                    <datalist id="tipo-pagamento<?php $transactionSelect['uniqId']; ?>">
                        <?php foreach(Painel::$globalVariables['tipo-pagamento'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Forma de Pagamento -->

                <div class="form-control w50">
                    <label for="descricao<?php $transactionSelect['uniqId']; ?>">Descrição</label>
                    <input type="text" id="descricao<?php $transactionSelect['uniqId']; ?>" name="descricao<?php $transactionSelect['uniqId']; ?>" disabled value="<?php echo $transactionSelect['descricao']; ?>" placeholder="Nome da transação" required autocomplete="off"/>
                </div><!-- nome -->

                <div class="form-control w50">
                    <label for="responsavel-transacao<?php $transactionSelect['uniqId']; ?>">Responsável pela Transação</label>
                    <input type="text" list="resp-trans<?php $transactionSelect['uniqId']; ?>" name="responsavel-transacao<?php $transactionSelect['uniqId']; ?>" disabled value="<?php echo $transactionSelect['resp-transacao']; ?>" id="responsavel-transacao<?php $transactionSelect['uniqId']; ?>" placeholder="Nome do responsável" required autocomplete="off"/>
                    <datalist id="resp-trans<?php $transactionSelect['uniqId']; ?>">
                        <?php foreach(Painel::$globalVariables['responsavel-transacao'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Forma de Entrada -->

                <div class="form-control w100" id="valor-type">
                    <label for="amount<?php $transactionSelect['uniqId']; ?>">Valor</label>
                    <input type="text" name="amount<?php $transactionSelect['uniqId']; ?>" disabled value="<?php echo $transactionSelect['amount']; ?>" id="amount<?php $transactionSelect['uniqId']; ?>" placeholder="Valor da transação" required autocomplete="off"/>
                </div><!-- Valor -->
                <!-- onkeypress='return event.charCode >= 48 && event.charCode <= 57' -->
                <div class="form-control" id="entrada-type">
                    <label for="tipo-entrada<?php $transactionSelect['uniqId']; ?>">Entrada</label>
                    <input type="text" list="forma-entrada<?php $transactionSelect['uniqId']; ?>" name="tipo-entrada<?php $transactionSelect['uniqId']; ?>" disabled value="<?php echo $transactionSelect['tipo-entrada']; ?>" id="tipo-entrada<?php $transactionSelect['uniqId']; ?>" placeholder="Tipo de Entrada" autocomplete="off"/>
                    <datalist id="forma-entrada<?php $transactionSelect['uniqId']; ?>">
                        <?php foreach(Painel::$globalVariables['forma-entrada'] as $values ){ ?>
                            <option value="<?php echo $values; ?>">
                        <?php } ?>
                    </datalist>
                </div><!-- Forma de Entrada -->

                <div class="form-control w100">
                    <label for="observacoes<?php $transactionSelect['uniqId']; ?>">Observações</label>
                    <textarea name="observacoes<?php $transactionSelect['uniqId']; ?>" disabled value="<?php echo $transactionSelect['observacoes']; ?>" placeholder="Digite a observação" id="observacoes<?php $transactionSelect['uniqId']; ?>"></textarea>
                </div><!-- Forma de Entrada -->

                <div class="form-control w50">
                    <label for="data-atual<?php $transactionSelect['uniqId']; ?>">Horario da Transação</label>
                    <?php $dataAtual = date('Y-m-d') ?>
                    <input type="date" name="data-atual<?php $transactionSelect['uniqId']; ?>" disabled value="<?php echo $transactionSelect['data-atual']; ?>" required id="data-atual<?php $transactionSelect['uniqId']; ?>">
                </div><!-- Horario da transação -->

                <div class="form-control w50">
                    <label for="responsavel-anotacao<?php $transactionSelect['uniqId']; ?>">Responsável pela Anotação</label>
                    <input type="text" name="responsavel-anotacao<?php $transactionSelect['uniqId']; ?>" class="disabled" disabled value="<?php echo $transactionSelect['resp-responsavel']; ?>" id="responsavel-anotacao<?php $transactionSelect['uniqId']; ?>"/>
                </div><!-- Forma de Entrada -->

                <input type="submit" class="btn" name="acao" value="Adicionar">
            </form>
        </div>
    `;
?>