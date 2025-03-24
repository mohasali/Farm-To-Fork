<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm to Fork - Easter Egg Hunt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 40px;
            padding-top: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            border: 3px solid #ff6600; /* Primary color */
            text-align: center;
        }
        .container h1 {
            font-size: 40px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .container p {
            font-size: 18px;
            margin: 20px 0;
        }
        .cta-button {
            display: inline-block;
            background-color: #ff6600; /* Primary color */
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }
        .cta-button:hover {
            background-color: #e65c00; /* Accent color */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Hello,</h1>
        <p>Thank you for joining the Farm to Fork community!</p>
        <p>Complete our Easter Egg Hunt to get 10% off your next order!</p>
        <div>
            <a href="{{ url('/') }}" class="cta-button">Go to Egg Hunt</a>
        </div>
        <p>Farm to Fork</p>
    </div>

</body>
</html>
