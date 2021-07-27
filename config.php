<?php

    date_default_timezone_set('America/Manaus');
    session_start();

    $autoload = function($class){
        include('class/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    /* Definindo Diretorios */
    define('INCLUDE_PATH', 'http://localhost/Controle_de_Despesas/');

    /* Conexão com o Banco de Dados */
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD','');
    define('DATABASER', 'controlpanel');
    
