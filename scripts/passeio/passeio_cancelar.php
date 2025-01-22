<?php

// Quando um passeio é cancelado, chamar este script

include_once('../conexao.php');

include_once("../utils.php");

$idPasseio = $_POST['idPasseio'];


$sqlcommand = "UPDATE 
        passeios 
    SET 
        ativo = false,
        horarioSaida = now()
    WHERE 
        id = $idPasseio";

$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);
redirect("../../pagina_usuario.php");
?>