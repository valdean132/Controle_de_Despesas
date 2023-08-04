<?php

    date_default_timezone_set('America/Manaus');
    session_start();

    $autoload = function($class){
        include('class/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    /* Definindo Diretorios */
    define('INCLUDE_PATH', 'http://controle.localhost/');
    // define('INCLUDE_PATH', 'https://minlouvorfin.valdeansouza.com/');

    /* Conexão com o Banco de Dados */
    // define('HOST', 'localhost');
    // define('USER', 'root');
    // define('PASSWORD','');
    // define('DATABASER', 'controlpanel');

    /* Conexão com o Hospedagem */
    define('HOST', '50.116.87.183');
    define('USER', 'valdea89_minlouvorfin');
    define('PASSWORD','#Q4!7[5ANn8Q');
    define('DATABASER', 'valdea89_minlouvorfin');
    
