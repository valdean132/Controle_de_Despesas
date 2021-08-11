<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
    $pageAtual = Painel::loadPage();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/colos.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/main.css">
    <?php
        if($pageAtual === 'pages/home.php'){
            echo '<link rel="stylesheet" href="'.INCLUDE_PATH.'css/home.css" />';
        }
    ?>
    <link rel="sortcut icon" href="financeiro.ico" type="image/x-icon" />
    <title>Controle de despesas</title>
</head>
<body>
    <base base="<?php echo INCLUDE_PATH; ?>">
    <div class="menu-container">
        <div class="btn-menu">
            <div class="barrinhas-menu">
                <span class="barra-before"></span>
                <span class="barra-center"></span>
                <span class="barra-after"></span>
            </div>
            <h2>
                Menu
            </h2>
        </div><!-- btn-menu -->
        <nav>
            <ul>
                <li><a realtime='perfil' href="<?php echo INCLUDE_PATH; ?>perfil"><i class=" fa fa-pencil-square-o"></i>Perfil</a></li>
                <li><a realtime='home' href="<?php echo INCLUDE_PATH; ?>"><i class=" fa fa-address-card-o"></i>Menu 2</a></li>
                <li><a realtime='' href="aaaa"><i class=" fa fa-address-card-o"></i>Menu 3</a></li>
            </ul>
        </nav>
    </div><!-- Menu Container -->

    <div class="icons-main loggout">
        <a href="<?php echo INCLUDE_PATH; ?>?loggout"></a>
    </div><!-- Icon Loggout -->
    <div class="icons-main icons-dark">
        <div class="btn-dark"></div><!-- Btn Dark -->
    </div><!-- Icon Darck -->
    
    
    
    <div class="container-center">
        <?php 
            include($pageAtual);
        ?>
    </div>

    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.min.js"></script>
    <script>
        
    </script>
    <script src="<?php echo INCLUDE_PATH; ?>js/functions.js"></script>
    <script>
        setInterval(()=>{
            var url_atual = window.location.href;
            
            if(url_atual === 'http://localhost/Controle_de_Despesas/'){
                
                if(!$('style,link[href="<?php echo INCLUDE_PATH; ?>css/home.css"]').length){
                    
                    $('style,link[href="<?php echo INCLUDE_PATH; ?>css/main.css"]').after('<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/home.css">');
                }
            }else{
                $('style,link[href="<?php echo INCLUDE_PATH; ?>css/home.css"]').remove();
            }
        });
    </script>
    <script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/efect.js"></script>
</body>
</html>