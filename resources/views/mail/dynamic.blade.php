<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        .company-info {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .product {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Débloquez des informations grâce à l'étude Bet Advisory</h1>
        <p>Bonjour {{ $data['name'] }},</p>
        <p>{{ $data['message'] }}</p>

        @if($data['status'] == 'Accepté')
        <div class="product">
            <p><strong>Nom de l'étude :</strong> {{ $data['study'] }}</p>
            <p><strong>Prix:</strong> {{ $data['price'] }} DH</p>
            <p>Téléchargez votre matériel d'étude en cliquant sur le bouton ci-dessous :</p>
            <a class="button" href="{{ url($data['studylink']) }}">Télécharger maintenant</a>
        </div>
        @endif
        <div class="company-info">
            <p><strong>Entreprise:</strong> Bet Advisory</p>
            <p><strong>Email du contact:</strong> Office@bet-advisory.com</p>
            <p><strong>Numéro du contact:</strong> +212 661328113</p>
        </div>

        <p>Si vous avez des questions ou avez besoin d'aide, n'hésitez pas à nous contacter. Merci d'avoir choisi Bet Advisory !</p>
    </div>
</body>
</html>