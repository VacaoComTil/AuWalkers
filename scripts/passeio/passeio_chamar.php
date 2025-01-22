<?php

// Quando um passeio é chamado, chamar este script

include_once("../utils.php");

// Verificando se o passeador está conectado
session_start();

if (!isset($_SESSION['id'])) {
    redirect("../../");
}

// Informações do passeador
$idUsuario = $_SESSION['id'];
$idPasseador = $_POST["idPasseador"];
$duracao = 45;


include_once('../conexao.php');


$sqlcommand = "INSERT INTO 
    passeios(
        idPasseador,
        idUsuario,
        horarioInicio,
        horarioSaida,
        ativo,
        confirmado,
        iniciado,
        concluido) 
    VALUES (
        $idPasseador,
        $idUsuario, 
        now(),
        date_add(now(), interval $duracao minute),
        true,
        false,
        false,
        false)";

$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);
redirect("../../mapa_esperando_confirmacao");
?>