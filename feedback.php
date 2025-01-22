<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback de Serviço</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #fff5f0, #ffe5d9);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .feedback-container {
            width: 60%;
            background-color: #f0f0f0;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
        }
        .feedback-header {
            font-size: 32px;
            margin-bottom: 20px;
        }
        .feedback-date,
        .feedback-price {
            margin: 20px 0;
            font-size: 24px;
        }
        .feedback-icons {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
        }
        .feedback-icons div {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .feedback-icons img {
            max-width: 100%;
            max-height: 100%;
        }
        .star-rating {
            margin: 40px 0;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 40px;
            color: gray;
            cursor: pointer;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input[type="radio"]:checked ~ label {
            color: gold;
        }
        .btn {
            font-size: 24px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>    
    
    <?php include("navbar.php"); ?> 

    <div class="feedback-container">
        <div class="feedback-header">FEEDBACK</div>
        <div class="feedback-date">15 DE JANEIRO 2025 15:57</div>
        <div class="feedback-price">R$ 22,50</div>
        <div class="feedback-icons">
            <div id="icon1"><img src="" alt="Icone 1"></div>
            <div id="icon2"><img src="" alt="Icone 2"></div>
            <div id="icon3"><img src="" alt="Icone 3"></div>
        </div>
        <div>Avalie o serviço!</div>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2">&#9733;</label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1">&#9733;</label>
        </div>
        <button type="button" class="btn btn-secondary">Enviar</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').change(function() {
                var $this = $(this);
                $('label').css('color', 'gray');
                $this.nextAll('label').css('color', 'gold');
                $this.prevAll('label').css('color', 'gold');
                $this.next('label').css('color', 'gold');
            });
        });
    </script>
</body>
</html>
