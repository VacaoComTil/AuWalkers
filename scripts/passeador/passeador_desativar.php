<?php

// Quando um passeador diz que não está mais aceitando pedidos de passeio

include_once("../utils.php");

// Verificando se o passeador está conectado
session_start();

if (!isset($_SESSION['id'])) {
    redirect("../../index.php");
}

// Informações do passeador
$idPasseador = $_SESSION['id'];


include('../conexao.php');

$sqlcommand = "UPDATE passeadores_atividades 
    SET 
        ativo = false 
    WHERE 
        idPasseador = $idPasseador";

$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);
redirect("../../pagina_usuario.php");
?>