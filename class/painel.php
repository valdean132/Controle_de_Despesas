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
                '0' => 'Saída',
                '1' => 'Entrada',
            ],
            'tipo-pagamento' => [
                '0' => 'Dinheiro',
                '1' => 'Cartão de Credito',
                '2' => 'Cartão de Debito',
                '3' => 'Pix'
            ],
            'resp-transacao' => [
                '1' => 'Valdean Palmeira de Souza',
            ],
            'forma-entrada' => [
                '0' => 'Fatura',
                '1' => 'Instalação',
                '2' => 'Emprestimo',
                '3' => 'Reposição'
            ]
        ];

        // Pull Type Variables
        public static function pullVariaveisGlobais($nomeVarial, $posicao){
            return Painel::$globalVariables[$nomeVarial][$posicao];
        }

        // deixando apenas números
        public static function explodeAmount($amount){
            $juntVir = explode(',', $amount);
            
            $explodePont = explode('.', implode($juntVir));

            return is_array($explodePont) ? implode($explodePont) : implode($juntVir);

        }

        // Calculando Entrada
        public static function calcAmauntEntrada($valuesTable){
            $contEntrada = 0;
            foreach($valuesTable as $value){
                if($value['tipo-transacao'] == 1){
                    $contEntrada+=$value['amount'];
                } 
            }
            return $contEntrada;
        }

        // Calculando Saida
        public static function calcAmauntSaida($valuesTable){
            $contSaida = 0;
            foreach($valuesTable as $value){
                if($value['tipo-transacao'] == 0){
                    $contSaida+=$value['amount'];
                } 
            }
            return $contSaida;
        }
        // Calculando Saida
        public static function calcAmauntGeral($calEntrada, $calcSaida){
            return $calEntrada - $calcSaida;
        }

        // Verificação de número
        public static function verifNumber($number){
            if($number == 0){
                return '000';
            }else if(strlen(abs($number)) == 1){
                return '00'.abs($number);
            }else if(strlen(abs($number)) == 2){
                return '0'.abs($number);
            }else{
                return abs($number);
            }
        }
    }
?>
