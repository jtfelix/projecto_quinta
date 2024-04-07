<?php
session_start();
include_once('configs.php');

//proteger o que é POST
$_POST = array_map(function ($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}, $_POST);

//proteger o que é GET
$_GET = array_map(function ($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}, $_GET);


$act = $_GET['act'];

if ($act == 'menssagem') {

    $ID = $_SESSION['ID'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $menssagem = $_POST['menssagem'];

    $sql = 'INSERT INTO menssagens (nome, email, assunto, menssagem) VALUES (?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $nome, $email, $assunto, $menssagem);
    $stmt->execute();

    if ($stmt->affected_rows == 0)
        die('Location: contactos.php?msg=msgErro');
    else {
        header('Location: contactos.php?msg=msgSucess');
    }

    exit;
} else if ($act == 'registaUtilizador') {
    $nome = htmlentities($_POST['nome']);
    $email = htmlentities($_POST['email']);
    $password = sha1($_POST['password']);

    //verificar se o email existe
    $sql = "SELECT count(*) as contagem FROM utilizadores WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $results = $stmt->get_result();
    $totalRegistos = $results->fetch_assoc()['contagem'];

    if ($totalRegistos > 0) {
        header('Location: registaUtilizador.php?msg=regUtili');
        exit;
    }

    $sql = "INSERT INTO utilizadores (nome, email, password) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $password);
    $stmt->execute();

    if ($stmt->affected_rows == 0) {
        header('Location: registaUtilizador.php?msg=regErro');
        exit;
    } else {
        header('Location: index.php?msg=regSucess');
    }

    exit;
} else if ($act == 'login') {
    $email = $_POST['email'];
    $pw = sha1($_POST['password']);

    $sql = 'SELECT count(*) as contagem, ID, nome, telefone, morada, codigo_postal, admin from utilizadores WHERE email = ? AND password = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $pw);
    $stmt->execute();

    $results = $stmt->get_result();
    $utilizador = $results->fetch_assoc();

    if ($utilizador['contagem'] == 1) {
        $_SESSION['ID'] = $utilizador['ID'];
        $_SESSION['nome'] = $utilizador['nome'];
        $_SESSION['email'] = $utilizador['email'];
        $_SESSION['admin'] = $utilizador['admin'];
        header('Location: index.php?msg=loginSucess');
    } else {
        sleep(1);
        header('Location: login.php?msg=loginErro');
    }

    exit;
} else if ($act == 'edita_perfil') {

    $ID = $_SESSION['ID'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $morada = $_POST['morada'];
    $telefone = $_POST['telefone'];
    $codigo_postal = $_POST['codigo_postal'];
    $localidade = $_POST['localidade'];

    $sql = 'UPDATE utilizadores SET nome=?, email=?, morada=?, telefone=?, codigo_postal=?, localidade=? WHERE ID=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi', $nome, $email, $morada, $telefone, $codigo_postal, $localidade, $ID);
    $stmt->execute();

    if ($stmt->affected_rows == 0) {
        header('Location: dados_pessoais.php?msg=dadosErro');
        exit;
    } else {
        header('Location: dados_pessoais.php?msg=dadosSucess');
    }

    exit;
} else if ($act == 'reserva') {

    //dados pessoais
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $morada = $_POST['morada'];
    $telefone = $_POST['telefone'];
    $codigo_postal = $_POST['codigo_postal'];
    $localidade = $_POST['localidade'];

    //dados da reserva
    $data_entrada = $_POST['data_entrada'];
    $data_saida = $_POST['data_saida'];
    $n_pessoas = $_POST['n_pessoas'];
    $precoDia = 80;

    if ($data_entrada != "" && $data_saida != "") {
        $timestampEntrada = strtotime($data_entrada);
        $timestampSaida = strtotime($data_saida);
        $diffTime = $timestampSaida - $timestampEntrada;
        $diffDays = ceil($diffTime / (60 * 60 * 24));
        $precoTotal = $precoDia * $diffDays;
    } else {
        $precoTotal = "---";
    }
    //será o correto?  

    /*
    Sugestão para o futuro
    user com sessão OU user sem sessão mas com registo -> update
    user sem sessão mas sem registo -> (Insert) registar sem pw
    */

    $id_utilizador = 0;

    if (!isset($_SESSION['ID'])) {
        $sql = "SELECT count(*) as contagem, ID FROM utilizadores WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $results = $stmt->get_result();
        $dadosUtilizador = $results->fetch_assoc();        

        if ($dadosUtilizador['contagem'] > 0) {
            $sql = 'UPDATE utilizadores SET nome=?, morada=?, telefone=?, codigo_postal=?, localidade=? WHERE email=?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssss', $nome, $morada, $telefone, $codigo_postal, $localidade, $email);
            $stmt->execute();

            $id_utilizador = $dadosUtilizador['ID'];

            if ($stmt->errno) {                
                exit;
            }
           
        } else {
            $sql = 'INSERT INTO utilizadores (nome, email, morada, telefone, codigo_postal, localidade) VALUES (?,?,?,?,?,?)';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssss', $nome, $email, $morada, $telefone, $codigo_postal, $localidade);
            $stmt->execute();

            if ($stmt->affected_rows == 0) {           
                
                exit;
            }            

            $id_utilizador = mysqli_insert_id($conn);
        }
    } else {
        $sql = 'UPDATE utilizadores SET nome=?, email=?, morada=?, telefone=?, codigo_postal=?, localidade=? WHERE ID=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssi', $nome, $email, $morada, $telefone, $codigo_postal, $localidade, $_SESSION['ID']);
        $stmt->execute();

        if ($stmt->errno) {            
            header('Location: reserva.php?msg=dadosErro');
            exit;
        }

        $id_utilizador = $_SESSION['ID'];
    }

    #reserva
    $sql = "INSERT INTO reservas (data_entrada, data_saida, n_pessoas, preco, ID_utilizador) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssidi', $data_entrada, $data_saida, $n_pessoas, $precoTotal, $id_utilizador);
    $stmt->execute();

    $reserva_id = mysqli_insert_id($conn);

    $sql = 'SELECT * FROM reservas WHERE ID = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $reserva_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $reserva = $result->fetch_assoc();   

    $_SESSION['ID_reserva'] =  $reserva_id;

    if ($stmt->affected_rows == 0) {        
        header('Location: reserva.php?msg=reservErro');
    } else {        
        header("Location: resumo.php?msg=reservSucess");
        exit;
    }
    exit;
}
