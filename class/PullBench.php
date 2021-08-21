<?php

    class PullBench{


        // Puxar dados gerais do Banco de dados (dinâmico).
        public static function tableBench($nameTable, $adcionais = null){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$nameTable` $adcionais");
            $sql->execute();

            return $sql->fetchAll();
        }

        // Selecionando um registro dinâmicamente
        public static function select($table, $query, $arr){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
            
            $sql->execute($arr);

            return $sql->fetch();
        }
    }
?>