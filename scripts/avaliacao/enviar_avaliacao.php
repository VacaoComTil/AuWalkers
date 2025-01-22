<?php

// Usuário envia uma avaliação para o passeador

include_once("../utils.php");

// Verificando se o passeador está conectado
session_start();

if (!isset($_SESSION['id'])) {
    redirect("../../home.php");
}

// Informações do passeador e nota
$idUsuario = $_SESSION['id'];
$idPasseador = $_POST["idPasseador"];
$nota = $_POST["avaliacao"];
$comentario = $_POST["comentario"];
$idPasseio = $_POST["idPasseio"];


// Conectanco-se ao banco
include_once('../conexao.php');


// Verificando se avaliação já foi enviada
// Para evitar que o usuário envie várias avaliações


$sqlcommand = "SELECT * FROM avaliacoes WHERE id = $idPasseio";

$result = mysqli_query($conexao, $sqlcommand);
if (mysqli_num_rows($result) > 0) { 
    redirect("../../home.php");
    return;
}

// Enviando avaliação
$sqlcommand = "INSERT INTO 
    avaliacoes(
        idPasseador,
        idUsuario,
        idPasseio,
        comentario,
        nota) 
    VALUES (
        $idPasseador,
        $idUsuario,
        $idPasseio, 
        $nota,
        '$comentario')";

$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);

redirect("../../home.php");
?>