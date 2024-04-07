<?php
$title = "reserva";
include('header.php');

$utilizador = array();

if ($_SESSION) {
    $sql = 'SELECT * FROM utilizadores WHERE ID = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_SESSION['ID']);
    $stmt->execute();

    $result = $stmt->get_result();
    $utilizador = $result->fetch_assoc();
}
?>

<div class="titulo">
    <h3>Reserva</h3>
</div>
<div class='fundo cinza'>
    <div class='container-reserva'>
        <h1>Dados da Reserva</h1>
        <form method="POST" action='actions.php?act=reserva'>
            <div class='formulario tamanho-total'>
                <div class="item">
                    <label for="checkin">Check-In</label><br>
                    <input class='campo has-datepicker data-entrada' type="date" name="data_entrada">
                </div>
                <div class="item">
                    <label for="checkout">Check-Out</label><br>
                    <input class='campo has-datepicker data-saida' type="date" name="data_saida">
                    <div class="msg-erro hide-msgErr">A data de check-out deve ser posterior à de check-in.</div>                    
                </div>
                <div class="item">
                    <label>Nº de Hóspedes</label><br>
                    <select class='campo n_pessoas' name="n_pessoas">
                        <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class='item'>
                    <label>Preço</label>
                    <br>
                    <div class='campo preco' type="text">---</div>
                </div>
            </div>
    </div>
    <div class='container-reserva'>
        <h1>Dados Pessoais</h1>
        <div class='formulario tamanho-total'>
            <div class="item">
                <label>Nome</label><br>
                <input class='campo' type="text" name="nome" value="<?php echo @$utilizador['nome']; ?>">
            </div>
            <div class="item">
                <label>E-mail</label><br>
                <input class='campo' type="text" name="email" value="<?php echo @$utilizador['email']; ?>">
            </div>
            <div class="item">
                <label>Telefone</label><br>
                <input class='campo' type="text" name="telefone" value="<?php echo @$utilizador['telefone']; ?>">
            </div>
            <div class="item">
                <label>Morada</label><br>
                <input class='campo' type="text" name="morada" value="<?php echo @$utilizador['morada']; ?>">
            </div>
            <div class="item">
                <label>Código Postal</label><br>
                <input class='campo' type="text" name="codigo_postal" value="<?php echo @$utilizador['codigo_postal']; ?>">
            </div>
            <div class="item">
                <label>Localidade</label><br>
                <input class='campo' type="text" name="localidade" value="<?php echo @$utilizador['localidade']; ?>">
            </div>
            <div>
                <input class='campo botao azul' type="submit" value='Submeter'>
            </div>
        </div>
    </div>
    </form>
</div>
</div>

<script>
    $(".data-entrada, .data-saida").change(function() {
        var dataEntrada = $('.data-entrada').val();
        var dataSaida = $('.data-saida').val();
        var precoDia = 80;

        if (dataEntrada == "" || dataSaida == "") {
            $('.preco').text = "---";
            return;
        }

        dataEntrada = new Date(dataEntrada);
        dataSaida = new Date(dataSaida);

        if (dataSaida < dataEntrada) {        
        $('.msg-erro').removeClass('hide-msgErr');
        $('.preco').text("---");
    } else {        
        $('.msg-erro').addClass('hide-msgErr');
        var diffTime = dataSaida.getTime() - dataEntrada.getTime();
        var diffDays = Math.ceil(diffTime / (1000 * 3600 * 24));
        var precoTotal = precoDia * diffDays;
        $('.preco').text(precoTotal + " €");
    }        

    });
</script>

<?php
include('footer.php');
?>