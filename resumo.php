<?php
$title = "Resumo";
include('header.php');

@$reserva_id = ($_SESSION["ID_reserva"]);
unset($_SESSION["ID_reserva"]);

$sql = 'SELECT * FROM reservas WHERE ID = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i' , $reserva_id);
$stmt->execute();

$result = $stmt->get_result();
$reserva = $result->fetch_assoc();

$sql = 'SELECT * FROM utilizadores WHERE ID = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $reserva['ID_utilizador']);
$stmt->execute();

$result = $stmt->get_result();
$utilizador = $result->fetch_assoc();

?>

<div class="fundo cinza">
    <div class='container-resumo'>
        <h1>Obrigado pela sua reserva! <img src="imgs/baloes.png" height="40"></h1>
        <h2>Entraremos em contacto logo que possivel!</h2>
        <h4>Resumo da sua Reserva:</h4>
        <div class='dados-reserva'>
            <div class='item'>
                <label>
                    <strong>Nome:</strong> <?php echo $utilizador['nome'] ?>
                </label>
            </div>
            <div class='item'>
                <label>
                    <strong>E-mail:</strong> <?php echo $utilizador['email'] ?>
                </label>
            </div>
            <div class='item'>
                <label>
                    <strong>Telefone:</strong> <?php echo $utilizador['telefone'] ?>
                </label>
            </div>
            <div class='item'>
                <label>
                    <strong>Data de Entrada:</strong> <?php echo $reserva['data_entrada'] ?>
                </label>
            </div>
            <div class='item'>
                <label>
                    <strong>Data de Saida:</strong> <?php echo $reserva['data_saida'] ?>
                </label>
            </div>
            <div class='item'>
                <label>
                    <strong>Preço: </strong> <?php echo $reserva['preco'] ?>€
                </label>
            </div>
            <div class='item'>
                <label>
                    <strong>Hóspedes: </strong> <?php echo $reserva['n_pessoas'] ?> Pessoas
                </label>
            </div>
        </div>
        <img src="imgs/logo1.png" height="200">
    </div>
</div>

<?php
include('footer.php');
?>