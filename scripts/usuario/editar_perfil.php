<?php
include_once('../utils.php');

$nome = $_POST["fullName"];
$email = $_POST["email"];
$cidade = $_POST["city"];
$endereco = $_POST["address"];
$numeroCelular = $_POST["phone"];

$foto = $_POST["photo"];

$senha = $_POST["password"];
$senhaConfirmar = $_POST["confirmPassword"];


// Verifica mais uma vez se as senhas são iguais
if ($senha != $senha) {
    alert("Insira as senhas iguais;");
    redirect("../../cadastro_usuario.php");
    return;
}

// TO-DO
// Verificações de email, senha, nome e tals
$erro = 0;

if ($email == "") $erro = 1;
if ($senha == "") $erro = 1;

// Conectando ao banco
include_once('../conexao.php');

$result = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email'");

// Checando o resultado do comando SQL
if ($result && mysqli_num_rows($result) > 0) {
    alert("Email já cadastrado!");
    redirect("../../cadastro_usuario.php");
    $erro = 1;
    return;
}


// Inserindo novo registro de usuário ao banco de dados
$sqlinsert = "INSERT INTO usuarios(nome, email, dataNasc, senha, cpf, numeroCelular, cidade, endereco)
VALUES ('$nome', '$email', '$dataNasc', '$senha', '$cpf', '$numeroCelular', '$cidade', '$endereco')";

$result = mysqli_query($conexao, $sqlinsert);

// TO-DO
// Apagar/comentar o alert no futuro
if ($result) 
    echo "Parabéns! O cadastrado foi registro com sucesso";
else 
{   
    alert("Algo deu errado: " .mysqli_error($conexao));
    redirect("../../");
}


mysqli_close($conexao);
redirect("../../");
?>
