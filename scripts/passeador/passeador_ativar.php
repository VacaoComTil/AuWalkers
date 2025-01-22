<?php

// Quando um passeador diz que está aceitando pedidos de passeio

include_once("../utils.php");

// Verificando se o passeador está conectado
session_start();

if (!isset($_SESSION['id'])) {
    redirect("../../index.php");
}

// Informações do passeador
$idPasseador = $_SESSION['id'];
$duracao = $_POST['duracao'];

$cidade = "jau";
$estado = "sp";

// Verificando se o passeador já está ativo
include_once('conexao.php');
$sqlcommand = "SELECT * 
    FROM passeadores_atividades p_a
    
    INNER JOIN passeadores p ON p.id = p_a.idPasseador
    INNER JOIN usuarios u ON u.id = p.idUsuario

    WHERE p_a.ativo = true AND p_a.horarioSaida < now();
";

$result = mysqli_query($conexao, $sqlcommand);

if (mysqli_num_rows($result) > 0) {
    mysqli_close($conexao);
    redirect("../../pagina_usuario.php");
    return;
}

// Conectando ao banco


// Ativando a busca
$sqlcommand = "INSERT INTO 
    passeadores_atividades(
        idPasseador, 
        horarioInicio,
        horarioSaida,
        cidade,
        estado,
        ativo) 
    VALUES (
        $idPasseador, 
        now(),
        date_add(now(), interval $duracao minute),
        '$cidade',
        '$estado',
        true)";
    
$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);
redirect("../../pagina_usuario.php");
?>