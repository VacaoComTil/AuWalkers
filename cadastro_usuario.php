<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Cadastro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #fff5f0, #ffe5d9);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            max-width: 1000px;
            background-color: white;
            padding: 20px;
            border: 5px solid #FA7451;
            border-radius: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .custom-file-label::after {
            content: "Procurar";
        }
        .photo-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #photoPreviewContainer {
            width: 150px;
            height: 150px;
            border: 2px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        #photoPreview {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }
        .btn-secondary {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    
    <?php include("navbar.php"); ?> 

    <div class="container">
        <h2 class="text-center">Cadastro</h2>
        <form action="scripts/cadastro_login/cadastro.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Celular</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Digite seu número de celular" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu número de CPF" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Repetir Senha</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Repita sua senha" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="photo-container">
                        <div id="photoPreviewContainer">
                            <img id="photoPreview" src="#" alt="Pré-visualização da Foto">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="photo" accept="image/*" required>
                            <label class="custom-file-label" for="photo">Enviar foto</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fullName">Nome</label>
                        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">Cidade</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Digite sua cidade" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Digite seu endereço" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthDate">Data de nascimento</label>
                        <input type="date" class="form-control" name="birthDate" id="birthDate" required>
                    </div>
                </div>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">Eu li e concordo com os termos de uso</label>
            </div>
            <div class="text-center">
                <a href="index.php" class="btn btn-link">Voltar à tela de login</a>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <!--<button type="button" class="btn btn-secondary">Cadastrar como passeador</button>-->
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photoPreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#photoPreview').hide();
            }
        });
    </script>
</body>
</html>
