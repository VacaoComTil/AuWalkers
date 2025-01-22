<?php

// Quando um passeador confirmar o passeio, chamar esse script

include_once("../utils.php");

session_start();

if (!isset($_SESSION['id'])) {
    redirect("../../index.php");
}

// Informações do passeador
$idPasseio = $_POST["idPasseio"];

include_once('../conexao.php');

$sqlcommand = "UPDATE 
        passeios 
    SET 
        confirmado = true
    WHERE 
        id = $idPasseio";
        

$result = mysqli_query($conexao, $sqlcommand);

if ($result) {
    alert("Concluido com sucesso!");
}
else 
    alert("Algo deu errado: " .mysqli_error($conexao));
    

mysqli_close($conexao);

redirect("../../pagina_usuario.php");
?>