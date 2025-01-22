<?php
	include_once("scripts/utils.php");
    session_start();
    if (!isset($_SESSION['id'])) {
        redirect("index.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta do Usuário</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #fff5f0, #ffe5d9);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            background-color: white;
            padding: 20px;
            border: 5px solid #FA7451;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            background-color: #FA7451;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .profile, .activity, .history {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            flex: 1;
            min-width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-picture img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }

        .profile-info {
            width: 100%;
            text-align: center;
        }

        .profile-info h1 {
            margin-bottom: 20px;
        }

        .profile-info label {
            font-weight: bold;
        }

        .profile-info input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-status {
            margin-top: 20px;
        }

        .profile-status p {
            margin: 5px 0;
        }

        .tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .tabs button {
            background-color: #FA7451;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .tabs button:hover {
            background-color: #E06348;
        }

        .history-content {
            display: none;
        }

        .history-content.active {
            display: block;
        }

        @media (max-width: 768px) {
            header, main {
                flex-direction: column;
                align-items: center;
            }

            .profile, .activity, .history {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    
    <?php include("navbar.php"); ?> 
    <br><br><br>
    <div class="container">
        <main>
            <section class="profile">
                <div class="profile-picture">
                    <img src="assets/brand/user.png" alt="Foto do usuário">
                    <br> <br>
                </div>
                <div class="profile-info">
                    <h1>Usuário0101</h1>
                    <form id="user-form">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email">

                        <label for="phone">Celular:</label>
                        <input type="tel" id="phone" name="phone">

                        <label for="address">Endereço:</label>
                        <input type="text" id="address" name="address">

                        <label for="password">Alterar senha:</label>
                        <input type="password" id="password" name="password">

                        <label for="passwordConfirm">Confirmar senha:</label>
                        <input type="password" id="passwordConfirm" name="passwordConfirm">

                        <form action="scripts/usuario/editar_perfil.php" method="post">
                            <input type="submit" class="btn btn-primary mt-3" value="Editar perfil">
                        </form>

                        <?php
                        include_once("scripts/usuario/usuario_passeador_verificar.php");
                        if (usuarioChecarPasseador($_SESSION['id'])) {
                            echo "<form action='scripts/cadastro_login/cadastro_passeador.php' method='post'>
                                <input type='submit' class='btn btn-primary mt-3' value='Se tornar um passeador'>
                            </form>";
                        }
                        ?>

                        <form action="scripts/cadastro_login/logout.php" method="post">
                            <input type="submit" class="btn btn-danger" value="Sair">
                        </form>
                    </form>
            </section>
            <?php
                if (!usuarioChecarPasseador($_SESSION['id'])) {
                    include_once("pagina_usuario_atividade.php");
                }
            ?>
            <section class="history">
                <h2>Histórico</h2>
                <div class="tabs">
                    <button onclick="showFacts()">Feitos</button>
                    <button onclick="showRequests()">Pedidos</button>
                </div>
                <div id="facts" class="history-content">
                    <!-- Conteúdo dos feitos -->
                </div>
                <div id="requests" class="history-content">
                    <!-- Conteúdo dos pedidos -->
                </div>
            </section>
        </main>
    </div>

    <script>
        function editProfile() {
            alert("Editar perfil");
        }

        function viewAnimals() {
            alert("Ver animais");
        }

        function startActivity() {
            alert("Iniciar atividade");
        }

        function showFacts() {
            document.getElementById('facts').classList.add('active');
            document.getElementById('requests').classList.remove('active');
        }

        function showRequests() {
            document.getElementById('requests').classList.add('active');
            document.getElementById('facts').classList.remove('active');
        }
    </script>
</body>
</html>
