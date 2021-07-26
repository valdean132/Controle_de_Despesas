<?php

    class Painel{
        
        // Logado
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
            // return true;
        }



    }
