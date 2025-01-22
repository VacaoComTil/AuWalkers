<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Passeadores</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to bottom right, #fff5f0, #ffe5d9);
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
            flex: 1;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .map {
            flex: 2;
            height: 600px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .sidebar {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-left: 20px;
        }

        .return-time {
            margin-bottom: 20px;
        }

        .walkers {
            flex: 1;
            overflow-y: auto;
        }

        .walkers-list {
            display: flex;
            flex-direction: column;
        }

        .walker {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        @media (max-width: 768px) {
            header, main {
                flex-direction: column;
            }

            .map {
                height: 300px;
            }

            .sidebar {
                width: 100%;
                padding: 1rem;
                margin: 0;
            }
        }
    </style>
</head>
<body>
    
    <?php include("navbar.php"); ?> 

    <br> <br> <br>

    <div class="container">
        <main>
            <section class="map" id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59062.821346593686!2d-48.557538949999994!3d-22.2997105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c7580297897717%3A0x2014cdea99a6a82e!2zSmHDuiwgU1A!5e0!3m2!1spt-BR!2sbr!4v1718902030056!5m2!1spt-BR!2sbr" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </section>
            <section class="sidebar">
                <div class="return-time">
                    <p>
                        <select class="form-select form-select-sm" aria-label="Selecionar duração">
                            <option value="0" selected>Passeio de 15 minutos</option>
                            <option value="1">Passeio de 30 minutos</option>
                            <option value="2">Passeio de 45 minutos</option>
                            <option value="3">Passeio de 1 hora</option>
                        </select>
                    </p>
                </div>
                <div class="walkers">
                    <h2>Passeadores</h2>
                    <div class="walkers-list">
                        <?php
                            include_once("scripts/passeador/buscar_passeadores.php");
                            buscarPasseadores();
                        ?>
                    </div>
                </div>
            </section>
            <?php
                include_once('mapa_passeio_atual.php');
            ?>
        </main>
    </div>
</body>
</html>
