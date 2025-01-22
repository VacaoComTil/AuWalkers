
<?php
    include_once("scripts/utils.php");
    session_start();
    if (isset($_SESSION['email'])) {
        redirect("mapa_lista.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Tela de Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .border-custom {
            border: 2px solid #FA7451;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            color: #000000;
        }

        .bg-body-tertiary {
            background-color: #f8f9fa;
        }

        .form-signin .form-floating > label {
            color: #000000;
        }

        .form-signin .form-check-label, .form-signin a {
            color: #000000;
        }

        .form-signin small {
            color: #FF0000;
        }
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    
    <?php include("navbar.php"); ?> 
    
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="border-custom">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="assets/brand/index.jpeg" alt="Logo" class="img-fluid" width="90%" height="90%">
                </div>
                <div class="col-md-6">
                    <main class="form-signin">
                        <form id="formLogin" action="scripts/cadastro_login/login.php" method="post">
                            <h1 class="h3 mb-3 fw-normal text-center">Bem Vindo</h1>
                            <br>
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email ou Celular</label>
                                <input id="loginEmail" name="email" type="email" class="form-control" placeholder="" oninput="loginChecagem()">
                                <small id="loginEmailErro" class="text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label for="loginSenha" class="form-label">Senha</label>
                                <input id="loginSenha" name="senha" type="password" class="form-control" placeholder="" oninput="loginChecagem()">
                                <small id="loginSenhaErro" class="text-danger"></small>
                            </div>

                            <div class="form-check text-start my-3">
                                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Lembrar-me</label>
                            </div>
                            <br>
                            <button id="loginSubmit" type="submit" class="btn btn-secondary w-100 py-2" value="Entrar">Entrar</button>
                            <br>
                            <p class="text-center mt-3"><a href="">Problemas para fazer login?</a></p>
                            <br><br>
                            <a href="cadastro_usuario.php"><p class="text-center">Não possui conta ainda?</p></a>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const formLogin = document.getElementById("formLogin");
        const loginEmail = document.getElementById("loginEmail");
        const loginSenha = document.getElementById("loginSenha");
        const loginEmailErro = document.getElementById("loginEmailErro");
        const loginSenhaErro = document.getElementById("loginSenhaErro");

        function loginChecagem() {
            let erro = false;

            if (loginEmail.value === "") {
                loginEmailErro.innerHTML = "Email é obrigatório.";
                erro = true;
            } else {
                loginEmailErro.innerHTML = "";
            }

            if (loginSenha.value === "") {
                loginSenhaErro.innerHTML = "Senha é obrigatória.";
                erro = true;
            } else {
                loginSenhaErro.innerHTML = "";
            }

            formLogin.action = erro ? "" : "./scripts/cadastro_login/login.php";
        }
    </script>
</body>
</html>
