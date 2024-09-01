<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        h1 {
            color: #ff6600;
        }
        p {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
        }
        .price {
            font-size: 24px;
            color: #ff6600;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank you for your payment!</h1>
        <p><strong>Pet Boarding Center:</strong> {{ $metadata['boarding_center'] }}</p>
        <p><strong>Pet Name:</strong> {{ $metadata['pet_name'] }}</p>
        <p><strong>Check-in:</strong> {{ $metadata['check_in'] }}</p>
        <p><strong>Check-out:</strong> {{ $metadata['check_out'] }}</p>
        <p><strong>Pet Owner:</strong> {{ $metadata['owner_first_name'] }} {{ $metadata['owner_last_name'] }}</p>
        <p class="price">Total Price: LKR {{ session('price') }}</p>
    </div>
</body>
</html>
