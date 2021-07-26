<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
            <div class="box-form">
                <form action="" method="POST">
                    <div class="box-wrapper box-user">
                        <input type="text" name="user" required autocomplete="off">
                        <label for="">Usuário</label>
                    </div><!-- Box User -->
                    <div class="box-wrapper box-password">
                        <input type="password" name="password" id="password" autocomplete="off" required>
                        <div class="icon-showPassword"></div>
                        <label for="">Senha</label>
                    </div><!-- Box User -->
                    <div class="box-lembre">
                        <div class="wrapper-lembre lembrar-user">
                            <input type="checkbox" id="lembrar-user">

                            <label for="lembrar-user" class="caixinha-box-input">
                                <div class="after-lembrete"></div>
                            </label>
                            <label for="lembrar-user">Manter conectado</label>
                        </div><!-- Lembrar Usuário -->
                        <div class="wrapper-lembre lembrar-login">
                            <input type="checkbox" id="lembrar-login">
                            <label for="lembrar-login" class="caixinha-box-input">
                                <div class="after-lembrete"></div>
                            </label>
                            <label for="lembrar-login">Lembrar Login</label>
                        </div><!-- Lembrar Login -->
                    </div><!-- Box User -->
                    <div class="box-buttom">
                        <input type="submit" value="Entrar">
                    </div><!-- Box Ação -->
                </form>
            </div><!-- Box Form -->
        </div><!-- Box Container -->
    </main><!-- Div Mãe -->


    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.min.js"></script>
    <script>

        // $('#lembrar-login').prop('checked', false);

        const showPassword = $('.icon-showPassword');
        const password = $('#password');

        setInterval(()=>{
            if(password.val() !== ''){
                showPassword.css('display', 'flex');
            }else{
                showPassword.css('display', 'none');
            }
        });

        showPassword.click(()=>{
            const passwordType = password.attr('type');

            if(passwordType === 'password'){
                password.attr('type', 'text');
                
                showPassword.addClass('activePassword');
            }else{
                password.attr('type', 'password');
                showPassword.removeClass('activePassword');

            }
        }); 
    </script>
</body>
</html>