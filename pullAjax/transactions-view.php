<?php

    include('../config.php');

    if(isset($_GET['transaction'])){
        $id = $_GET['transaction'];

        $transactionSelect = PullBench::select('tb.control_transactions', 'uniqId = ?', array($id));
        
    }else{
        Painel::boxMsg('error', 'O parametro id Não existe');
        die();
    }
    
    var_dump($transactionSelect);
?> 