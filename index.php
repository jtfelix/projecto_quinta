<?php
$title = "Home";
include('header.php');
?>

<div class='fundo'>
    <div class="banner" style="background-image :url('imgs/banner.png');"></div>
    <div class="destaque">
        <h1>Quinta da Ribeirinha</h1>        
        A Quinta da Ribeirinha, situada em Odiáxere-Lagos, é a sua escolha ideal para umas férias tranquilas.<br>
        Veja algumas das fotos do nosso alojamento.
        <div class="galeria">
            <img src="imgs/quinta1.JPG" height="200">
            <img src='imgs/quinta2.JPG' height="200">
            <img src="imgs/quinta3.JPG" height="200">
        </div>
    </div>
    <div class='seccao cinza'>
        <div class='img-descritivo' style="background-image: url('imgs/rosa.JPG');"></div>
        <div class='descritivo'>
            <h1>A Quinta</h1>
            "Localizada no meio de um cenário de natureza exuberante, a Quinta da Ribeirinha é um refúgio perfeito para quem procura tranquilidade,
            conforto e contato com a natureza. Situada em Odiáxere, a propriedade fica a poucos minutos das mais belas praias da região,
            o que faz dela uma escolha ideal para quem deseja explorar o litoral e desfrutar do sol e do mar."
            <br>
            <a href='quinta.php' class="botao azul">Saber Mais</a>
        </div>
    </div>
    <div class='seccao'>
        <div class='descritivo'>
            <h1>Alojamento</h1>
            Para que possa disfrutar de umas férias completas e relaxantes dispomos de vários serviços e comodidades. Clique no botão para saber mais.
            <br>
            <a href ='alojamento.php'class="botao azul"> Saber Mais</a>
        </div>
        <div class='img-descritivo' style="background-image: url('imgs/entrada.jpg');"></div>
    </div>
    <div class='seccao cinza'>
        <div class='img-descritivo' style="background-image: url('imgs/algarve.png');"></div>
        <div class='descritivo'>
            <h1>Região</h1>
            "O Algarve é uma região situada no sul de Portugal, conhecida pelas suas belas praias de água cristalina e paisagens deslumbrantes.
            Com mais de 300 dias de sol por ano, é um dos destinos mais populares para turistas em todo o mundo."
            <br>
            <a href='regiao.php' class="botao azul"> Saber Mais</a>
        </div>

    </div>
    <div class='seccao'>
        <div class='descritivo'>
            <h1>O que Visitar</h1>
            Lagos tem uma miríade de coisas para oferecer aos seus visitantes, principalmente para quem procura um destino que alia história e
            veraneio na perfeição. Tal simbiose não podia ficar em segredo muito tempo e, presentemente, Lagos é um dos destinos turísticos do
            Algarve mais populares, tanto para os portugueses como para os estrangeiros.<br>
            <a href ='#'class="botao azul"> Saber Mais</a>
        </div>
        <div class='img-descritivo' style="background-image: url('imgs/benagil.jpg');"></div>
    </div>
</div>

<?php
include('footer.php');
?>