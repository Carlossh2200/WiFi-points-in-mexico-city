<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/style.css">
    <title>Complaints</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #7064dc;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        main {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #7064dc;
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #7064dc;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navBar">
            <ul class="listaNav">
                <li><a>
                        <div class="imageContainer">
                            <a class="botonWifi" href="/Bases_de_Datos/public/">
                                <img class="imagenWifiCdmx" src="../public/logo_wifi_cdmx.jpg">
                            </a>
                        </div>
                    </a></li>
                <li><a href="/Bases_de_Datos/public/">Home</a></li>
                <li><a href="/Bases_de_Datos/public/faqs">FAQs</a></li>
                <li><a href="/Bases_de_Datos/public/complaint">Complaints</a></li>
                <li><a href="/Bases_de_Datos/public/login">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="text">Complaint:</label>
            <input type="text" id="complaint" name="complaint" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Submit Complaint</button>
        </form>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
        <p>&copy; 2023 Wi-Fi CDMX. All rights reserved.</p>
    </footer>
</body>

</html>
