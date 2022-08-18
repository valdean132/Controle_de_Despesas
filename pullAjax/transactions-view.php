<?php

    include('../config.php');

    if(isset($_GET['delete'])){
        if(EnviForm::deleteInfo($_GET['transaction'])){
            die();
        }
    }else if(isset($_GET['transaction'])){
        $id = $_GET['transaction'];

        $transactionSelect = PullBench::select('tb.control_transactions', 'uniqId = ?', array($id));
        
    }else{
        Painel::boxMsg('error', 'O parametro id Não existe');
        die();
    }
    
    echo json_encode($transactionSelect);
?> 