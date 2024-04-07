<?php
session_start();
include_once('configs.php');
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="imgs/logo1.png">
    <title>
        <?php
        if ($title) {
            echo "$title - ";
        }
        ?> Quinta Ribeirinha
    </title>
    <link rel='stylesheet' href='includes/estilos.css'>
    <script src="includes/jquery-3.6.4.min.js" type="text/javascript"></script>


    <script>
        setTimeout(function() {
            $('.msg.hide-msg').fadeOut('slow');
        }, 5000);
        
    </script>
</head>

<body>
    <div class='header'>
        <div class='nav'>
            <div class='menu'>
                <a href='index.php'>
                    <img class='logo' src="imgs/logo1.png" alt='ribeirinha' height="100">
                </a>
                <div class='ops'>
                    <div class='item sel'>
                        <a class="item sel" href="alojamento.php">Alojamento</a>
                        <img class='img-nav' src="imgs/seta-baixo.png" height="20">
                        <ul class="submenu">
                            <li><a href="#">Interior</a></li>
                            <li><a href="#">Exterior</a></li>
                        </ul>
                    </div>
                    <a class='item sel' href="quinta.php">A Quinta</a>
                    <a class='item sel' href="#">Preçario</a>
                    <a class='item sel' href="reserva.php">Reserva</a>
                    <a class='item sel' href="contactos.php">Contactos</a>
                </div>
                <?php
                if (!isset($_SESSION['ID'])) :
                ?>
                    <div>
                        <a href="login.php">Entrar </a>
                        |
                        <a href="registaUtilizador.php"> Registar</a>
                    </div>
                <?php
                else :
                ?>
                    <div class="user">
                        <img class="img" src="imgs/user.png" height="20" alt="Utilizador">
                        <?php
                        echo "<div class=\"nickname\">$_SESSION[nome]</div>";
                        echo "<img class='img-nav' src='imgs/seta-baixo.png' height='20'>";
                        echo "<ul class = 'submenu'>                                
                                    <li><a href='dados_pessoais.php'>Os meus dados</a></li>
                                    <li><a href='logout.php'>Terminar Sessão</a></li>
                                </ul>"
                        ?>
                    </div>
                <?php
                endif;
                ?>
                <div class='icones'>
                    <div>
                        <img src="imgs/inglaterra.png" height="20">
                        <img src="imgs/frança.png" height="20">
                        <img src="imgs/alemanha.png" height="20">
                        <img src="imgs/portugal.png" height="20">
                    </div>
                    <a href="#"><img src="imgs/facebook.png" height="30px" alt='facebook'></a>
                    <a href="#"><img src="imgs/instagram.png" height="30px" alt='instagram'></a>
                    <a href="#"><img src="imgs/tripadvisor.png" height="30px" alt='tripadvisor'></a>
                </div>

            </div>
        </div>
    </div>

    <div>
        <?php
        $msg = @$_GET['msg'];
        if ($msg == "msgErro")
            echo '<div class="msg erro hide-msg">Ocorreu um erro inesperado, pff tente novamente!</div>';
        else if ($msg == "msgSucess")
            echo '<div class= "msg sucesso hide-msg">Menssagem enviada com sucesso! Entraremos em contacto logo que possivel!</div>';
        else if ($msg == "regSucess")
            echo '<div class="msg sucesso hide-msg">Registo Efectuado com Sucesso</div>';
        else if ($msg == "regErro")
            echo '<div class="msg erro hide-msg">Ocorreu um Erro</div>';
        else if ($msg == "regUtili")
            echo '<div class="msg aviso hide-msg">O e-mail inserido já se encontra registado</div>';
        else if ($msg == "loginSucess")
            echo '<div class="msg sucesso hide-msg">Login efectuado com sucesso</div>';
        else if ($msg == 'loginErro')
            echo '<div class="msg erro hide-msg">Erro no Login</div>';
        else if ($msg == 'logoutInfo')
            echo '<div class="msg info hide-msg">Sessão Terminada</div>';
        else if ($msg == 'dadosSucess')
            echo '<div class ="msg sucesso hide-msg">Dados atualizados com sucesso</div>';
        else if ($msg == 'dadosErro')
            echo '<div class= "msg erro hide-msg">Erro a atualizar os dados</div>';
        else if ($msg == 'reservErro')
            echo '<div class= "msg erro hide-msg">Erro a inserir os dados da Reserva</div>';
        else if ($msg == 'reservSucess')
            echo '<div class = "msg sucesso hide-msg">Reserva inserida com sucesso</div>';
        else if ($msg == 'dadosErroInser')
            echo '<div class = "msg erro hide-msg">Ocorreu um erro a inserir os seus dados, tente novamente</div>'
        ?>
    </div>