<?php
$title = "Alojamento";
include('header.php');
?>

<div class='fundo'>
    <div class="banner" style="background-image :url('imgs/entrada.jpg');"></div>
    <div class="container">
        <div class='tab-container'>
            <div class="nav-tab">
                <img src="imgs/pessoas.png" height="40px">
                <div>6 - hóspedes</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/quarto.png" height="40px">
                <div>2 - Quartos</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/cama.png" height="40px">
                <div>1 - Cama Casal</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/cama-solteiro.png" height="40px">
                <div>2 - Camas Solteiro</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/sala.png" height="40px">
                <div>Sala de Estar</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/cozinha.png" height="40px">
                <div>Cozinha</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/wc.png" height="40px">
                <div>1 - Casa de Banho</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/piscina.png" height="40px">
                <div>Piscina</div>
            </div>
            <div class="nav-tab">
                <img src="imgs/barbecue.png" height="40px">
                <div>Barbecue</div>
            </div>
        </div>
    </div>
    <div class='seccao cinza'>
        <div class="descritivo">
            <h1>Interior</h1>
            Combinando perfeitamente o charme rústico com a elegância moderna, a Quinta Ribeirinha oferece uma experiência singular para todos
            os seus visitantes. Localizada em meio à natureza, esta propriedade proporciona uma sensação de paz e tranquilidade,
            ideal para quem busca momentos de descanso e renovação. Venha desfrutar de um refúgio encantador, repleto de conforto e beleza natural.
            <div>
                <a href='interior.php' class="botao azul">Saber Mais</a>
            </div>
        </div>
        <div class='img-descritivo' style="background-image: url('imgs/sala-estar.jpg');"></div>
    </div>
    <div class='seccao'>
        <div class='img-descritivo' style="background-image: url('imgs/piscina.jpg');"></div>
        <div class='descritivo'>
            <h1>Exterior</h1>
            Com uma ampla área externa, esta propriedade conta com diversas opções para desfrutar do ar livre,
            incluindo uma refrescante piscina para mergulhos nos dias de calor, uma espaçosa área para piquenique para refeições ao ar livre
            e um moderno barbecue para preparar deliciosas refeições para toda a família.
            <div>
                <a href='exterior.php' class="botao azul">Saber Mais</a>
            </div>
        </div>
    </div>
</div>


<?php
include('footer.php');
?>