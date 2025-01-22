<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Denúncia</title>
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
            width: 100%; /* Alterado para 100% */
            height: 200px; /* Ajustado para 200px */
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
        .preview-image {
            width: 100%;
            height: 100%;
            border: none; /* Removida a borda */
            border-radius: 5px;
        }
        .dashed-border {
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            cursor: pointer;
        }
        .dashed-border:hover {
            border-color: #aaa;
        }
    </style>
</head>
<body>
    
    <?php include("navbar.php"); ?>

    <div class="container">
        <h2 class="text-center">Formulário de Denúncia</h2>
        <form action="scripts/denuncia/enviar_denuncia.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectPasseio">Selecione o Passeio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button">Selecionar</button>
                            </div>
                            <input type="text" class="form-control" id="selectPasseio" placeholder="Selecione o Passeio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputUsuario">Digite o usuário</label>
                        <input type="text" class="form-control" id="inputUsuario" placeholder="Digite o usuário">
                    </div>
                    <div class="form-group dashed-border" onclick="document.getElementById('fileInput').click();">
                        <span>Clique para adicionar uma foto</span>
                        <input type="file" id="fileInput" accept="image/*" style="display:none;"> <!-- Retirada a borda do file input -->
                    </div>
                    <div id="photoPreviewContainer" class="dashed-border">
                        <img id="photoPreview" class="preview-image" src="#" alt="Pré-visualização da Foto">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectMotivo">Selecione o Motivo</label>
                        <select class="form-control" id="selectMotivo">
                            <option>Não compareceu ao passeio</option>
                            <option>Atraso no horário</option>
                            <option>Tratamento inadequado do cão</option>
                            <option>Não seguiu as instruções</option>
                            <option>Comportamento inadequado do passeador</option>
                            <option>Passeio muito curto</option>
                            <option>Problemas de comunicação</option>
                            <option>Preço cobrado incorretamente</option>
                            <option>Problemas de segurança</option>
                            <option>Outros</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputDescricao">Descreva o motivo da denúncia</label>
                        <textarea class="form-control" id="inputDescricao" rows="8" placeholder="Descreva detalhadamente o motivo da sua denúncia"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Finalizar Denúncia</button>
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
