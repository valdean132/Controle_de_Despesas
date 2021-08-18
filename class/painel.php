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
                $url = explode('/', $_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    return('pages/'.$url[0].'.php');
                }else{
                    // Quando a página não existe
                    return('pages/404.php');
                }
            }else{
                return('pages/home.php');
            }
        }

        // Variaveis Globais
        public static $globalVariables = [
            'forma-transacao' => [
                '0' => 'Entrada',
                '1' => 'Saída',
            ],
            'tipo-pagamento' => [
                '0' => 'Dinheiro',
                '1' => 'Cartão de Credito',
                '2' => 'Cartão de Debito',
                '3' => 'Pix'
            ],
            'responsavel-transacao' => [
                '0' => 'Sandro Cordovil Rodrigues',
                '1' => 'Valdean Palmeira de Souza',
                '2' => 'Samuel Rodrigues',
            ],
            'forma-entrada' => [
                '0' => 'Fatura',
                '1' => 'Instalação',
                '2' => 'Emprestimo',
                '3' => 'Reposição'
            ]
        ];
    }
