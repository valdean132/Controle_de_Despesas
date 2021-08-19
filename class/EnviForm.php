<?php

    class EnviForm{
        
        // Enviar Formulário Transação
        public static function formTransacao($tipoTransacao, $formaPagamento, $descricao, $responsavelTransacao, $amount, $tipoEntrada, $observacoes, $datetimeLocal, $responsavelAnotacao){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb.control_transactions` VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            return $sql->execute(array($tipoTransacao, $formaPagamento, $descricao, $responsavelTransacao, $amount, $tipoEntrada, $observacoes, $datetimeLocal, $responsavelAnotacao)) ? true : false;
        }
    }

