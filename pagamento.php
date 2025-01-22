<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
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
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border: 5px solid #FA7451;
            border-radius: 10px;
        }
        .payment-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .payment-form .form-group label {
            font-weight: bold;
        }
        .payment-form .form-group input,
        .payment-form .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .payment-methods {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .payment-methods label {
            margin-right: 10px;
        }
        .payment-form .form-group .qr-code {
            display: none;
            justify-content: center;
            margin-bottom: 15px;
        }
        .payment-form .form-group .qr-code img {
            width: 150px;
            height: 150px;
        }
        .payment-form button {
            width: 100%;
            padding: 15px;
            background-color: #FA7451;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .payment-form button:hover {
            background-color: #E06348;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    
    <?php include("navbar.php"); ?> 
    
    <div class="container">
        <div class="payment-form">
            <h2>Pagamento</h2>
            <div class="payment-methods">
                <label><input type="radio" name="payment-method" value="credit" checked> Cartão de crédito</label>
                <label><input type="radio" name="payment-method" value="debit"> Cartão de débito</label>
                <label><input type="radio" name="payment-method" value="pix"> Pix</label>
            </div>
            <div class="form-group">
                <label for="name">Nome completo</label>
                <input type="text" id="name">
            </div>
            <div class="form-group">
                <label for="card-number">Número do cartão</label>
                <input type="text" id="card-number">
            </div>
            <div class="form-group">
                <label for="expiry">Validade</label>
                <input type="text" id="expiry" placeholder="MM/AA">
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf">
            </div>
            <div class="form-group qr-code">
                <label>QR Code PIX</label>
                <div id="qrcode"></div>
            </div>
            <div><p id="pix-key">Chave PIX:</p></div>
            <button type="button" onclick="confirmPayment()">CONFIRMAR PAGAMENTO</button>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        document.querySelectorAll('input[name="payment-method"]').forEach(input => {
            input.addEventListener('change', function() {
                if (this.value === 'pix') {
                    document.querySelector('.form-group.qr-code').style.display = 'flex';
                    generateQRCode();
                } else {
                    document.querySelector('.form-group.qr-code').style.display = 'none';
                }
            });
        });

        function generateQRCode() {
            const qrcode = new QRCode(document.getElementById('qrcode'), {
                text: "ChavePIX",
                width: 150,
                height: 150
            });
        }

        function confirmPayment() {
            alert('Pagamento confirmado!');
        }
    </script>
</body>
</html>
