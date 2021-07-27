<?php

    class Painel{
        
        // Logado
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
            // return true;
        }

        public static function boxMsg($type, $msg, $span = null){
            return '<div class="box-alert '.$type.'"><p>'.$msg.' <span>'.$span.'</span></p></div>';
        }
        
        public static function loggout(){
            setcookie('lembrarConexao', 'true', time()-1, '/');
            session_destroy();

            header('Location: '.INCLUDE_PATH);
        }

    }
