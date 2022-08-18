<?php

    class EnviForm{
        
        // Enviar Formulário Transação
        public static function formTransacao($uniqId, $tipoTransacao, $formaPagamento, $descricao, $responsavelTransacao, $amount, $tipoEntrada, $observacoes, $dateLocal, $responsavelAnotacao){
            $sql = MySql::conectar()->prepare("INSERT INTO `tb.control_transactions` VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            return $sql->execute(array($uniqId, $tipoTransacao, $formaPagamento, $descricao, $responsavelTransacao, $amount, $tipoEntrada, $observacoes, $dateLocal, $responsavelAnotacao)) ? true : false;
        }

        // Atualizar Tabela no Banco de dados
        public static function edtTableBd($parameters){
            $certo = true;
            $first = false;
            $nome_tabela = $parameters['nome_tabela'];
            $query = "UPDATE `$nome_tabela` SET ";

            foreach($parameters as $key => $value){
                $nome = $key;

                if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'uniqId')
                    continue;
                
                // if($value == ''){
                //     break;
                // }
                if($first == false){
                    $first = true;
                    $query .= "`$nome`=?";
                }else{
                    $query .= ", `$nome`=?";
                }
                $arr[] = $value;
            }

            if($certo == true){
                $arr[] = $parameters['uniqId'];

                $sql = MySql::conectar()->prepare($query.' WHERE uniqId=?');
                $sql->execute($arr);
                
            }
        }

        // Deletando dados
        public static function deleteInfo($delete){

            $sql = MySql::conectar()->prepare("DELETE FROM `tb.control_transactions` WHERE `uniqId` = ?");
            $sql->execute(array($delete));
        }
    }