<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreamento de Passeadores</title>
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
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100vw;
            margin: auto;
            background-color: white;
            padding: 20px;
            border: 5px solid #FA7451;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .map {
            flex: 2;
            position: relative;
            border-right: 1px solid #ddd;
        }
        .sidebar {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .passeador-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .passeador-photo {
            width: 150px;
            height: 150px;
            background-color: #ccc;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 2px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .passeador-id {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .passeador-details {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .passeador-details div {
            width: 80%;
            padding: 10px;
            background-color: #e9e9e9;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 5px;
        }
        .chamar-passeador {
            padding: 15px;
            background-color: #FA7451;
            color: white;
            text-align: center;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .map {
                height: 50vh;
                border-right: none;
                border-bottom: 1px solid #ddd;
            }
        }
    </style>
</head>
<body>
    
    <?php include("navbar.php"); ?> 
    
    <br> <br> <br>


    <!
    <div class="container">
        <div id="map" class="map"></div>
        <div class="sidebar">
            <div class="passeador-info">
                <div class="passeador-photo">
                    <img id="photoPreview" src="#" alt="Foto do Passeador" style="max-width: 100%; max-height: 100%; display: none;">
                </div>
                <div class="passeador-id">Passeador0101</div>
                <div class="passeador-details">
                    <div>Bem avaliado</div>
                    <div>Até médio porte</div>
                    <div>Experiente</div>
                    <div>Possui rastreador</div>
                </div>
                <button class="chamar-passeador">CHAMAR PASSEADOR</button>
            </div>
        </div>
        
        <?php
            include_once('mapa_passeio_atual.php');
        ?>
    </div>
    
</body>
</html>
