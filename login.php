<?php
    if(isset($_COOKIE['lembrarConexao'])){
        $_COOKIE['user'];
        $password = $_COOKIE['password'];

        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
        $sql->execute(array($user, $password));

        if($sql->rowCount() == 1){
            $info = $sql->fetch();

            
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo']; 
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];
            $_SESSION['themeMode'] = $info['themeMode'];
            if(isset($_POST['lembrarConexao'])){
                setcookie('lembrarConexao', true, time()+(60*60*24), '/');
                setcookie('user', $user, time()+(60*60*24), '/');
                setcookie('password', $password, time()+(60*60*24), '/');
            }
            header('Location: '.INCLUDE_PATH);
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div class="div-box">
            <div class="avatar-box"></div><!-- Avatar User -->
            <div class="title">
                <h2>Logar No Sistema</h2>
            </div><!-- Title -->
            <?php
                $height = '';
                $boxAlert = '';
                $userValue = '';
                $passwordValue = '';
                if(isset($_POST['acao'])){
                    $user = $_POST['user'];
                    $password = $_POST['password'];
                    if($user === '' && $password === ''){
                        $height = 'auto';
                        $boxAlert = Painel::boxMsg('error', 'Todos os campos devem ser preenchidos!!!');
                        $userValue = $user;
                        $passwordValue = $password;
                    }else{
                        $sql = MySql::conectar() -> prepare("SELECT * FROM `tb.control_user` WHERE user = ? AND password = ?");
                        $sql->execute(array($user, $password));

                        if($sql->rowCount() == 1){
                            $info = $sql->fetch();

                            if($password === $info['password']){
                                $_SESSION['login'] = true;
                                $_SESSION['user'] = $user;
                                $_SESSION['password'] = $password;
                                $_SESSION['cargo'] = $info['cargo']; 
                                $_SESSION['nome'] = $info['nome'];
                                $_SESSION['img'] = $info['img'];
                                $_SESSION['themeMode'] = $info['themeMode'];
                                if(isset($_POST['lembrarConexao'])){
                                    setcookie('lembrarConexao', true, time()+(60*60*24), '/');
                                    setcookie('user', $user, time()+(60*60*24), '/');
                                    setcookie('password', $password, time()+(60*60*24), '/');
                                }
                                header('Location: '.INCLUDE_PATH);
                                die();
                            }else{
                                $height = 'auto';
                                $boxAlert = Painel::boxMsg('error', 'Usuário ou Senha Incorretos!!!', 'Tente novamente');
                                $userValue = $user;
                                $passwordValue = '';
                            }
                        }else{
                            $height = 'auto';
                            $boxAlert = Painel::boxMsg('error', 'Usuário ou Senha Incorretos!!!', 'Tente novamente');
                            $userValue = $user;
                            $passwordValue = '';
                        }
                    }
                    
                }
            ?>
            <div class="div-form-valid" style="height: <?php echo $height; ?>">
                <?php echo $boxAlert; ?>
            </div>
            <div class="box-form">
                <form action="" method="POST">
                    <div class="box-wrapper box-user">
                        <input type="text" name="user" value="<?php echo $userValue; ?>" required autocomplete="off">
                        <label for="">Usuário</label>
                    </div><!-- Box User -->
                    <div class="box-wrapper box-password">
                        <input type="password" name="password" value="<?php echo $passwordValue; ?>" id="password" autocomplete="off" required>
                        <div class="icon-showPassword"></div>
                        <label for="">Senha</label>
                    </div><!-- Box User -->
                    <div class="box-lembre">
                        <div class="wrapper-lembre lembrar-user">
                            <input type="checkbox" name="lembrarConexao" id="lembrar-user">

                            <label for="lembrar-user" class="caixinha-box-input">
                                <div class="after-lembrete"></div>
                            </label>
                            <label for="lembrar-user">Manter conectado</label>
                        </div><!-- Lembrar Usuário -->
                        <div class="wrapper-lembre lembrar-login">
                            <input type="checkbox" id="lembrar-login">
                            <label for="lembrar-login" class="caixinha-box-input wrapper-lembrar-label">
                                <div class="after-lembrete"></div>
                            </label>
                            <label for="lembrar-login" class="wrapper-lembrar-label">Lembrar Login</label>
                        </div><!-- Lembrar Login -->
                    </div><!-- Box User -->
                    <div class="box-buttom">
                        <input type="submit" name="acao" value="Entrar">
                    </div><!-- Box Ação -->
                </form>
            </div><!-- Box Form -->
        </div><!-- Box Container -->
    </main><!-- Div Mãe -->

    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.min.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/functions.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/login-functions.js"></script>
</body>
</html>