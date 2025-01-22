<?php

// Quando um passeio é encerrado, chamar este script

include_once('../conexao.php');

include_once("../utils.php");

$idPasseio = $_POST["idPasseio"];

alert($idPasseio);

$sqlcommand = "UPDATE 
        passeios 
    SET 
        ativo = false,
        concluido = true
    WHERE 
        id = $idPasseio";

$result = mysqli_query($conexao, $sqlcommand);

mysqli_close($conexao);

redirect("../../pagina_usuario.php");
?>