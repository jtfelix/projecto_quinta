<?php
$title = 'Dados Pessoais';
include('header.php');

$sql = 'SELECT * FROM utilizadores WHERE ID = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['ID']);
$stmt->execute();

$result = $stmt->get_result();
$utilizador = $result->fetch_assoc();
?>

<div class='fundo cinza'>
    <div class='container-reserva'>
        <h1>Dados Pessoais</h1>
        <form class='formulario tamanho-total' method="POST" action='actions.php?act=edita_perfil' onsubmit="return confirm('Tem a certeza que deseja alterar os dados?')">
            <div class="item">
                <label>Nome</label><br>
                <input class='campo' type="text" name="nome" value="<?php echo $utilizador['nome']; ?>">
            </div>
            <div class="item">
                <label>E-mail</label><br>
                <input class='campo' type="text" name="email" value="<?php echo $utilizador['email']; ?>">
            </div>
            <div class="item">
                <label>Telefone</label><br>
                <input class='campo' type="text" name="telefone" value="<?php echo $utilizador['telefone']; ?>">
            </div>
            <div class="item">
                <label>Morada</label><br>
                <input class='campo' type="text" name="morada" value="<?php echo $utilizador['morada']; ?>">
            </div>
            <div class="item">
                <label>Código Postal</label><br>
                <input class='campo' type="text" name="codigo_postal" value="<?php echo $utilizador['codigo_postal']; ?>">
            </div>
            <div class="item">
                <label>Localidade</label><br>
                <input class='campo' type="text" name="localidade" value="<?php echo $utilizador['localidade']; ?>">
            </div>
            <div>
                <input class='campo botao azul' type="submit" value='Submeter'>
            </div>
        </form>
    </div>
</div>
<?php
include('footer.php');
?>