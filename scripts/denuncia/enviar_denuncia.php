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
$idDenunciado = $_POST["idDenunciado"];
$comentario = $_POST["comentario"];


// Conectanco-se ao banco
include_once('../conexao.php');

// Enviando avaliação
$sqlcommand = "INSERT INTO 
    denuncias(
        idUsuario,
        idDenunciado,
        comentario) 
    VALUES (
        $idPasseador,
        $idDenunciado,
        '$comentario')";

$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);

redirect("../../home.php");
?>