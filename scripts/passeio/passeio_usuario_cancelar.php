<?php

// Quando um passeio é cancelado por um usuário, chamar este script

include_once('../conexao.php');

include_once("../utils.php");

session_start();

$idUsuario = $_SESSION["id"];
$idPasseador = $_POST["idPasseador"];

alert($idPasseio);

$sqlcommand = "UPDATE 
        passeios 
    SET 
        ativo = false
    WHERE 
        idUsuario = $idUsuario AND
        idPasseador = $idPasseador";

$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);

redirect("../../mapa_lista.php");
?>