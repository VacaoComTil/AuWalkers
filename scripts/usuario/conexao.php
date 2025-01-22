<?php 

/*
$nome_sv = "localhost";
$nome_user = "id21914174_auwalker";
$senha_banco = "Auauwalkers123!";
$nome_banco = "id21914174_auwalkers"; 
*/

$nome_sv = "localhost";
$nome_user = "root";
$senha_banco = "";
$nome_banco = "auwalkers"; 

$conexao = mysqli_connect($nome_sv, $nome_user, $senha_banco, $nome_banco);

if (mysqli_connect_error()) 
{
    echo "Problemas com a conexão<br>".mysqli_connect_error();
}
?>