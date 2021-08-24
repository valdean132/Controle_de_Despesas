<?php

    include('../config.php');

    if(isset($_GET['transaction'])){
        $id = $_GET['transaction'];

        $transactionSelect = PullBench::select('tb.control_transactions', 'uniqId = ?', array($id));
        
    }else{
        Painel::boxMsg('error', 'O parametro id Não existe');
        die();
    }
    // print json_decode($transactionSelect);
    
    var_dump(array(
        "uniqId"           => $transactionSelect['uniqId'],
        "tipo-transacao"   => $transactionSelect['tipo-transacao'],
        "forma-pagamento"  => $transactionSelect['forma-pagamento'],
        "descricao"        => $transactionSelect['descricao'],
        "resp-transacao"   => $transactionSelect['resp-transacao'],
        "amount"           => $transactionSelect['amount'],
        "tipo-entrada"     => $transactionSelect['tipo-entrada'],
        "observacoes"      => $transactionSelect['observacoes'],
        "data-atual"       => $transactionSelect['data-atual'],
        "resp-responsavel" => $transactionSelect['resp-responsavel']
    ));
    
        // 
    // if($transactionSelect['tipo-transacao'] == 1){
    //     $width49 = 'style="width: 49%;"';
    // }else{
    //     $width49 = '';
    // }
    // $prev = '
    //     <div class="adcionar">
    //         <h3>Visualização de transação</h3>
            
    //         <div class="fechar-popup"></div>
    //         <form id="form" method="POST">

    //             <div class="form-control w50">
    //                 <label for="tipo-transacao'.$transactionSelect['uniqId'].'">Transação</label>
    //                 <input type="text" disabled class="tipo-transacao-val" value="'.Painel::pullVariaveisGlobais('forma-transacao', $transactionSelect['tipo-transacao']).'" name="tipo-transacao'.$transactionSelect['uniqId'].'" id="tipo-transacao'.$transactionSelect['uniqId'].'" />
    //             </div><!-- Tipo de transação -->

    //             <div class="form-control w50">
    //                 <label for="forma-pagamento'.$transactionSelect['uniqId'].'">Pagamento</label>
    //                 <input type="text" list="tipo-pagamento'.$transactionSelect['uniqId'].'" disabled value="'.$transactionSelect['forma-pagamento'].'" name="forma-pagamento'.$transactionSelect['uniqId'].'" id="forma-pagamento'.$transactionSelect['uniqId'].'" placeholder="Forma de Pagamento" required autocomplete="off"/>
    //                 <datalist id="tipo-pagamento'.$transactionSelect['uniqId'].'">';
    //                     foreach(Painel::$globalVariables['tipo-pagamento'] as $values ){
    //                         $prev .= '<option value="'.$values.'">';
    //                     }
    //             $prev .= '
    //                 </datalist>
    //             </div><!-- Forma de Pagamento -->

    //             <div class="form-control w50">
    //                 <label for="descricao'.$transactionSelect['uniqId'].'">Descrição</label>
    //                 <input type="text" id="descricao'.$transactionSelect['uniqId'].'" name="descricao'.$transactionSelect['uniqId'].'" disabled value="'.$transactionSelect['descricao'].'" placeholder="Nome da transação" required autocomplete="off"/>
    //             </div><!-- nome -->

    //             <div class="form-control w50">
    //                 <label for="responsavel-transacao'.$transactionSelect['uniqId'].'">Responsável pela Transação</label>
    //                 <input type="text" list="resp-trans'.$transactionSelect['uniqId'].'" name="responsavel-transacao'.$transactionSelect['uniqId'].'" disabled value="'.$transactionSelect['resp-transacao'].'" id="responsavel-transacao'.$transactionSelect['uniqId'].'" placeholder="Nome do responsável" required autocomplete="off"/>
    //                 <datalist id="resp-trans'.$transactionSelect['uniqId'].'">';
    //                     foreach(Painel::$globalVariables['responsavel-transacao'] as $values ){
    //                         $prev .= '<option value="'.$values.'">';
    //                     }
    //             $prev .= '
    //                 </datalist>
    //             </div><!-- Forma de Entrada -->

    //             <div class="form-control w100 valor-type" '.$width49.'>
    //                 <label for="amount'.$transactionSelect['uniqId'].'">Valor</label>
    //                 <input type="text" disabled class="value-amount" name="amount'.$transactionSelect['uniqId'].'" value="'. $transactionSelect['amount'].'" id="amount'.$transactionSelect['uniqId'].'" placeholder="Valor da transação" required autocomplete="off"/>
    //             </div><!-- Valor -->
                
    //             <div class="form-control entrada-type" '.$width49.'>
    //                 <label for="tipo-entrada'.$transactionSelect['uniqId'].'">Entrada</label>
    //                 <input type="text" disabled list="forma-entrada'.$transactionSelect['uniqId'].'" name="tipo-entrada'.$transactionSelect['uniqId'].'" disabled value="'.$transactionSelect['tipo-entrada'].'" id="tipo-entrada'.$transactionSelect['uniqId'].'" placeholder="Tipo de Entrada" autocomplete="off"/>
    //                 <datalist id="forma-entrada'.$transactionSelect['uniqId'].'">';
    //                     foreach(Painel::$globalVariables['forma-entrada'] as $values ){
    //                         $prev .= '<option value="'.$values.'">';
    //                     }
    //             $prev .= '
    //                 </datalist>
    //             </div><!-- Forma de Entrada -->

    //             <div class="form-control w100">
    //                 <label for="observacoes'.$transactionSelect['uniqId'].'">Observações</label>
    //                 <textarea disabled name="observacoes'.$transactionSelect['uniqId'].'" placeholder="Digite a observação" id="observacoes'.$transactionSelect['uniqId'].'">'.$transactionSelect['observacoes'].'</textarea>
    //             </div><!-- Forma de Entrada -->

    //             <div class="form-control w50">
    //                 <label for="data-atual'.$transactionSelect['uniqId'].'">Horario da Transação</label>
    //                 <input type="date" name="data-atual'.$transactionSelect['uniqId'].'" disabled value="'.$transactionSelect['data-atual'].'" required id="data-atual'.$transactionSelect['uniqId'].'">
    //             </div><!-- Horario da transação -->

    //             <div class="form-control w50">
    //                 <label for="responsavel-anotacao'.$transactionSelect['uniqId'].'">Responsável pela Anotação</label>
    //                 <input type="text" name="responsavel-anotacao'.$transactionSelect['uniqId'].'" class="disabled" disabled value="'.$transactionSelect['resp-responsavel'].'" id="responsavel-anotacao'.$transactionSelect['uniqId'].'"/>
    //             </div><!-- Forma de Entrada -->

    //             <input type="submit" class="btn" name="acao" value="Adicionar">
    //         </form>
    //     </div>
    // ';
    
    // echo $prev;
?> 