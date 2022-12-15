<!-- <div class="icons">
    <div class="delete-control"></div>
</div> -->
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
    $infoTransacions = PullBench::tableBench('tb.control_transactions', 'ORDER BY `data-atual`');
    $boxAlert = '';
    
    if(isset($_POST['acao'])){
        
        $tipoTransacao = strtolower($_POST['tipo-transacao']) === 'entrada' ? '1' : '0';
        $formaPagamento = $_POST['forma-pagamento'];
        $descricao = $_POST['descricao'];
        $responsavelTransacao = $_POST['resp-transacao'];
        $amount = Painel::explodeAmount($_POST['amount']);
        $tipoEntrada = $_POST['tipo-entrada'] === '' ? '' : $_POST['tipo-entrada'];
        $observacoes = $_POST['observacoes'] === '' ? '' : $_POST['observacoes'];
        $dateLocal = $_POST['data-atual'];
        $responsavelAnotacao = $_SESSION['nome'];
        
        $uniqId = $_POST['uniqId'];

        if(EnviForm::formTransacao($uniqId, $tipoTransacao, $formaPagamento, $descricao, $responsavelTransacao, $amount, $tipoEntrada, $observacoes, $dateLocal, $responsavelAnotacao)){
            $boxAlert = Painel::boxMsg('sucesso', 'Transação enviada com Sucesso!!!');
            $infoTransacions = PullBench::tableBench('tb.control_transactions', 'ORDER BY `data-atual`');
        }else{
            $boxAlert = Painel::boxMsg('error', 'Erro ao enviar o formulário!!!', 'Tente novamente mais tarde');
        }
    }

    if(isset($_POST['enviar-edicao'])){

        $parameters = [
            'uniqId' => $_POST['uniqId'],
            'descricao' => $_POST['descricao'],
            'amount' => Painel::explodeAmount($_POST['amount']),
            'observacoes' => $_POST['observacoes'] === '' ? '' : $_POST['observacoes'],
            'tipo-entrada' => $_POST['tipo-entrada'],
            'data-atual' => $_POST['data-atual'],
            'nome_tabela' => 'tb.control_transactions',
            'acao' => 'enviar-edicao'
        ];
        
        if(!EnviForm::edtTableBd($parameters)){
            $boxAlert = Painel::boxMsg('sucesso', 'A transação '.$_POST['uniqId'].' foi editada com Sucesso!!!');
            $infoTransacions = PullBench::tableBench('tb.control_transactions', 'ORDER BY `data-atual`');
        }else{
            $boxAlert = Painel::boxMsg('error', 'Erro ao enviar Atualização!!!', 'Tente novamente mais tarde');
        }

    }

    // Calc Amaunt
    $calcEntrada = Painel::calcAmauntEntrada($infoTransacions);
    $calcSaida = Painel::calcAmauntSaida($infoTransacions);
    $calcGeral = Painel::calcAmauntGeral($calcEntrada, $calcSaida);
    $operator = $calcGeral < 0 ? '-' : '';
?>

<div class="div-form-valid box-alert-container" style="width: 50%; height: 45px;">
    <?php echo $boxAlert; ?>
</div>

<h2 class="title-geral">Controle de despesas</h2>
</h2>
<div class="container">
    <div class="mian-RC">
        <!-- <h4><?php echo $tipoEntrada ?></h4> -->
        <h4>Saldo Atual</h4>
        <h2 id="balance" class="balance"><?php echo $operator ?> R$ 
            <span class="value-amount"><?php echo Painel::verifNumber($calcGeral) < 0 ? abs(Painel::verifNumber($calcGeral)) : Painel::verifNumber($calcGeral) ?></span>
        </h2>
        <div class="inc-exp-container">
            <div>
                <h4>Receitas</h4>
                <p id="money-plus" class="money plus"><span>R$</span>
                    <span class="value-amount"><?php echo Painel::verifNumber($calcEntrada); ?></span>
                </p>
            </div>
            <div>
                <h4>Despesas</h4>
                <p id="money-minus" class="money minus"><span>R$</span> 
                    <span class="value-amount"><?php echo Painel::verifNumber($calcSaida); ?></span>
                </p>
            </div>
        </div>
    </div>

    <div class="entrada-saida">
        <ul id="transactions" class="transactions">
            <div class="transacao trans-entrada">
                <h3>Entrada</h3>
                <div id="entrada">
                    <?php
                        $trueDate = false;
                        foreach($infoTransacions as $key => $values){
                            if($values['tipo-transacao'] == 1){
                                $DateAtualSpan = date('d/m/Y', strtotime($values['data-atual']));
                                
                                if($trueDate == true){
                                    if($dateArmazen != $values['data-atual']){
                                        $trueDate = false;
                                        $dateArmazen = '';
                                    }else{
                                        $cont++;
                                    }
                                }
                                if($trueDate == false){
                                    echo '<span class="date-transaction-span">'.$DateAtualSpan.'</span>';
                                    $dateArmazen = $values['data-atual'];
                                    $trueDate = true;
                                    $cont = 1;
                                }
                    ?>
                        <a realtimetrasactions='transaction=<?php echo $values['uniqId']; ?>' href="?transaction=<?php echo $values['uniqId']; ?>">
                            <li class="plus">
                                <span>
                                    <span style="color: #0ff;"><?php echo $cont < 10 ? '0'.$cont.'° ' : $cont.'° ' ?></span>
                                    <?php echo $values['descricao']; ?> - <?php echo $values['tipo-entrada'] ?>
                                </span>
                                <span>+ R$ <span class="value-amount"><?php echo Painel::verifNumber($values['amount']); ?></span></span>
                                <button class="delete-btn" attrdescription="<?php echo $values['descricao'] ?>" >X</button>
                            </li>
                        </a>
                    <?php            
                            }
                        }
                    ?>
                    
                </div>
            </div>
            <div class="transacao trans-saida">
                <h3 class="transacao-title">Saída</h3>
                <div id="saida">
                    <?php
                        $trueDate = false;
                        foreach($infoTransacions as $key => $values){
                            if($values['tipo-transacao'] == 0){
                                $DateAtualSpan = date('d/m/Y', strtotime($values['data-atual']));
                                
                                if($trueDate == true){
                                    if($dateArmazen != $values['data-atual']){
                                        $trueDate = false;
                                        $dateArmazen = '';
                                    }else{
                                        $cont++;
                                    }
                                }
                                if($trueDate == false){
                                    echo '<span class="date-transaction-span">'.$DateAtualSpan.'</span>';
                                    $dateArmazen = $values['data-atual'];
                                    $trueDate = true;
                                    $cont = 1;
                                }
                    ?>
                        <a realtimetrasactions='transaction=<?php echo $values['uniqId']; ?>' href="?transaction=<?php echo $values['uniqId']; ?>">
                            <li class="minus">
                                <span>
                                    <span style="color: #0ff;"><?php echo $cont < 10 ? '0'.$cont.'° ' : $cont.'° ' ?></span>
                                    <?php echo $values['descricao']; ?>
                                </span>
                                <span>- R$ <span class="value-amount"><?php echo Painel::verifNumber($values['amount']); ?></span></span>
                                <button class="delete-btn" attrdescription="<?php echo $values['descricao'] ?>" >X</button>
                            </li>
                        </a>
                    <?php            
                            }
                        }
                    ?>
                </div>
            </div>
        </ul>
    </div>
    
    <a class="btn abrir-transations" href="">
        Adicionar Transação
    </a>

    <div class="pupup-adcionar"></div><!-- Popup Adcionar -->
</div>

<div class="container-popup-adcionar" style="display: none;" >
    <div class="adcionar">
        <h3>Adicionar transação</h3>
        
        <div class="fechar-popup"></div>
        <form id="form" method="POST">

            <div class="form-control w50">
                <label for="tipo-transacao">Transação</label>
                <input type="text" autofocus list="forma-transacao" class="tipo-transacao-val" name="tipo-transacao" id="tipo-transacao" placeholder="Tipo de transação" required autofocus autocomplete="off"/>
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
                <input type="text" id="descricao" name="descricao" class="editTransaction" placeholder="Nome da transação" required autocomplete="off"/>
            </div><!-- nome -->

            <div class="form-control w50">
                <label for="resp-transacao">Responsável pela Transação</label>
                <input type="text" list="resp-trans" name="resp-transacao" id="resp-transacao" placeholder="Nome do responsável" required autocomplete="off"/>
                <datalist id="resp-trans">
                    <?php foreach(Painel::$globalVariables['resp-transacao'] as $values ){ ?>
                        <option value="<?php echo $values; ?>">
                    <?php } ?>
                </datalist>
            </div><!-- Forma de Entrada -->

            <div class="form-control w100 valor-type">
                <label for="amount">Valor</label>
                <input type="text" name="amount" class="editTransaction" id="amount" placeholder="Valor da transação" required autocomplete="off"/>
            </div><!-- Valor -->
            <!-- onkeypress='return event.charCode >= 48 && event.charCode <= 57' -->
            <div class="form-control entrada-type">
                <label for="tipo-entrada">Entrada</label>
                <input type="text" list="forma-entrada" class="editTransaction" name="tipo-entrada" id="tipo-entrada" placeholder="Tipo de Entrada" autocomplete="off"/>
                <datalist id="forma-entrada">
                    <?php foreach(Painel::$globalVariables['forma-entrada'] as $values ){ ?>
                        <option value="<?php echo $values; ?>">
                    <?php } ?>
                </datalist>
            </div><!-- Forma de Entrada -->

            <div class="form-control w100">
                <label for="observacoes">Observações</label>
                <textarea name="observacoes" class="editTransaction" placeholder="Digite a observação" id="observacoes"></textarea>
            </div><!-- Forma de Entrada -->

            <div class="form-control w50">
                <label for="data-atual">Horario da Transação</label>
                <?php $dataAtual = date('Y-m-d') ?>
                <input type="date" name="data-atual" class="editTransaction" value="<?php echo $dataAtual ?>" required id="data-atual">
            </div><!-- Horario da transação -->

            <div class="form-control w50">
                <label for="resp-responsavel">Responsável pela Anotação</label>
                <input type="text" disabled list="resp" name="resp-responsavel" class="disabled" value="<?php echo $_SESSION['nome']; ?>" id="resp-responsavel"/>
            </div><!-- Forma de Entrada -->
            <input type="hidden" name="uniqId" value="">
            <input type="submit" class="btn" name="acao" value="Adicionar">
        </form>
    </div>
</div>
