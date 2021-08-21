<?php

    class EnviForm{
        
        // Enviar Formulário Transação
        public static function formTransacao($uniqId, $tipoTransacao, $formaPagamento, $descricao, $responsavelTransacao, $amount, $tipoEntrada, $observacoes, $dateLocal, $responsavelAnotacao){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb.control_transactions` VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            return $sql->execute(array($uniqId, $tipoTransacao, $formaPagamento, $descricao, $responsavelTransacao, $amount, $tipoEntrada, $observacoes, $dateLocal, $responsavelAnotacao)) ? true : false;
        }
    }