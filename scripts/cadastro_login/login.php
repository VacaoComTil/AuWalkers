<?php
include_once('../utils.php');
include_once('../conexao.php');

$email = $_POST["email"];
$senha = $_POST["senha"];
$manterLogin = $_POST["manterLogin"];


// Comando SQL para abrir o registro do login
$sqlcommand = "SELECT * FROM usuarios
    WHERE email = '$email' AND senha = '$senha'";

$result = mysqli_query($conexao, $sqlcommand);

// Checagem do resultado do SQL
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    session_start();
    $_SESSION['email'] = $row["email"];
    $_SESSION['id'] = $row["id"];

    alert("Login concluido com sucesso!");
    redirect("../../mapa_lista.php");
}
else 
    alert("Algo deu errado: " .mysqli_error($conexao));
    
mysqli_close($conexao);
redirect("../../index.php");

?>
