<?php

    class Painel{
        
        // Logado
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
            // return true;
        }

        // Mensagem de alerta
        public static function boxMsg($type, $msg, $span = null){
            return '<div class="box-alert '.$type.'"><p>'.$msg.' <span>'.$span.'</span></p></div>';
        }
        
        // Sair da Sessão
        public static function loggout(){
            setcookie('lembrarConexao', 'true', time()-1, '/');
            session_destroy();

            header('Location: '.INCLUDE_PATH);
        }

        // Redrecionamento
        public static function loadPage(){
            if(isset($_GET['url'])){
                $url= explode('/', $_GET['url']);
                if(file_exists('page/'.$url[0].'.php')){
                    include('pages/'.$url[1].'.php');
                }else{
                    // Quando a página não existe
                    include('pages/404.php');
                }
            }else{
                if('pages/home.php');
            }
        }
    }
