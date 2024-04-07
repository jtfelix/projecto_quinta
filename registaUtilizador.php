<?php
$title = "Registo";
include('header.php');
?>
<script>
    $(document).ready(function() {
        $('.form-registo').submit(function() {          

            var pw = $('.password').val(); //dar nome das classes
            var rpw = $('.confirmaPassword').val();
            var nome = $('.nome').val();
            var email = $('.email').val();

            if (pw.length < 5) {
                alert("A password deve conter pelo menos 5 caracteres!");
                return false;
            }

            if (pw != rpw) {
                alert("As passwords não coincidem!");
                return false;
            }            
        });
    })
</script>
<div class='titulo'>
    <h3>Registo</h3>
</div>
<div class='fundo'>
    <div class='wrapper'>
        <form class='form-registo' method="POST" action='actions.php?act=registaUtilizador'>
            <div class='container-registo'>
                <label>
                    Nome
                    <br><input class='campo nome' type='text' name='nome' required>
                </label>
                <label>E-mail<br>
                    <input class='campo email' type='text' name='email' required>
                </label>
                <label>Password<br>
                    <input class='campo password' type='password' name='password' required>
                </label>
                <label>Confirmar Password<br>
                    <input class='campo confirmaPassword' type='password' name='confirmaPassword' required>
                </label>
                <input class="campo botao azul" type="submit" value="Confirmar Registo">
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