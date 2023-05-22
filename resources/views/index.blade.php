<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cinevana inicio</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        html {
            font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        body {
            background-color: #f7fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .heading {
            font-size: 3rem;
            font-weight: bold;
            color: #1a202c;
            text-align: center;
            margin-bottom: 2rem;
        }

        .subheading {
            font-size: 1.5rem;
            color: #4a5568;
            text-align: center;
            margin-bottom: 2rem;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        .cta-button {
            display: inline-block;
            background-color: #4c51bf;
            color: #ffffff;
            padding: 1rem 2rem;
            font-size: 1.25rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
            margin-right: 1rem;
        }

        .cta-button:last-child {
            margin-right: 0;
        }

        .cta-button:hover {
            background-color: #434190;
        }

        .footer {
            text-align: center;
            font-size: 0.875rem;
            color: #a0aec0;
            margin-top: 4rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="heading">Cinevana</h1>
        <p class="subheading">¡Descubre el mejor cine en línea!</p>
        <div class="cta-buttons">
            <a class="cta-button" href="{{ route('login') }}">Iniciar sesión</a>
            <a class="cta-button" href="{{ route('register') }}">Registrarse</a>
        </div>
        <div class="footer">
            &copy; Cinevana 2023 - por el equipo de Cinevana
        </div>
    </div>
</body>

</html>
