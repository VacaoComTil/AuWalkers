<?php
include_once('../utils.php');


session_start();

// Verificando se o usuário está conectado a uma conta básica
if (!isset($_SESSION['email'])) {
    alert("Não conectado!");
    redirect("../../");
    return;
}
/*
$emailUsuario = $_SESSION['email'];
$senha = $_POST["senha"];

$idUsuario = -1;

// Conectando ao banco
include_once('../conexao.php');


// Verificando se a senha é correta
$sqlcommand = "SELECT * FROM usuarios
    WHERE email = '$email' AND senha = '$senha'";

$result = mysqli_query($conexao, $sqlcommand);


// Checando o resultado do comando SQL
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    if ($senha != $row["email"]) {
        alert("Senha incorreta!");
        redirect("../../pagina_usuario.php");
    }

    $idUsuario = $row["id"];
}

// Isso será apagado depois
// Diz se o código acima está funcionando
if ($idUsuario == -1) {
    alert("Usuário inválido!");
    redirect("../../index.php");
}
    */


// Conectando ao banco
include_once('../conexao.php');

$idUsuario = $_SESSION['id'];

// Verificando se o usuário já é um passeador
// Não é possível se tornar passeador duas vezes
$sqlcommand = "SELECT * FROM passeadores
    WHERE idUsuario = $idUsuario";

$result = mysqli_query($conexao, $sqlcommand);


// Checando o resultado do comando SQL
if ($result && mysqli_num_rows($result) > 0) {
    alert("O usuário já é um passeador");
    redirect("../../pagina_usuario.php");
}


// Inserindo no banco de dados que o usuário agora é um passeador
$sqlinsert = "INSERT INTO passeadores(idUsuario)
VALUES ($idUsuario)";

$result = mysqli_query($conexao, $sqlinsert);


//Dizendo se está tudo certo
if ($result) 
    // O alert deve ser apagado/comentado no futuro porque não fica bom usar um alert
    alert("Parabéns! O cadastrado foi registro com sucesso");
else 
    alert("Algo deu errado: " .mysqli_error($conexao));

redirect("../../pagina_usuario.php");
?>