<?php
$title="Login";
include('header.php');

if(@isset($_SESSION['ID'])){
    header("Location: index.php");
    exit;
}
?>
<div class='titulo'>
    <h3>Entrar</h3>
</div>
<div class='fundo'>
    <div class='wrapper'>
        <form class='form-registo' method="POST" action='actions.php?act=login'>
            <div class='container-registo'>                
                <label>E-mail<br>
                    <input class='campo email' type='text' name='email' required>
                </label>
                <label>Password<br>
                    <input class='campo password' type='password' name='password' required>
                </label>                
                <input class="campo botao azul" type="submit" value="Login">
            </div>
            <div>
                <img src="imgs/logo1.png" height="300" alt="logo">
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php')
?>

