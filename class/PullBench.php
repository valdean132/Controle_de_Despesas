<?php

    class PullBench{


        // Puxar dados gerais do Banco de dados (dinâmico).
        public static function tableBench($nameTable){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$nameTable`");
            $sql->execute();

            return $sql->fetchAll();
        }

    }

?>