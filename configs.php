<?php
define('MODO' , 'LOCALHOST');

$server = '';
$user = '';
$pw = '';
$db = '';

if(MODO == 'LOCALHOST'){

$server = 'localhost';
$user = 'root';
$pw = '';
$db = 'quinta_ribeirinha';

error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors' , 1);
}

$conn = new mysqli($server, $user, $pw, $db);

if($conn->connect_error){
    echo 'Erro, não foi possivel ligar à base de dados: ' . $conn->connect_error;
    exit;
}
?>