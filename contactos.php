<?php
$title = "Contactos";
include('header.php');
?>

<div class="titulo">
    <h3>Contacte-nos</h3>
</div>
<div class='fundo cinza'>
    <div class='container-form'>
        <form class='formulario' method="POST" action="actions.php?act=menssagem">
            <div>
                <h1>Contactos</h1>
            </div>
            <div class="item">
                <img src="imgs/telefone-preto.png" height="30px"> - (+351) 92000000
            </div>
            <div class="item">
                <img src="imgs/mail@.png" height="30"> - quintaribeirinha@gmail.com
            </div>
            <div class="item grande">
                <img src="imgs/caneta.png" height="30"> Formulário de Contacto
            </div>
            <div class='item'>
                <label>Nome</label>
                <br>
                <input class='campo' type='text' name="nome" required>
            </div>
            <div class='item'>
                <label>E-mail</label>
                <br>
                <input class='campo' type='text' name="email" required>
            </div>
            <div class='item'>
                <label>Assunto</label>
                <br>
                <input class='campo' type='text' name="assunto" required>
            </div>
            <div class='item'>
                <label>Mensagem</label>
                <br>
                <textarea class='campo grande' type='text' name="menssagem" required></textarea>
            </div>
            <div>
                <input class='grande botao azul' type="submit" value="Enviar Mensagem" width="690">
            </div>
        </form>
    </div>
</div>
<?php
include('footer.php');
?>