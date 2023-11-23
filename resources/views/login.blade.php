<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/style.css">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            /* Optional: Set a fixed width for the container */
            margin: 0 auto;
            /* Center the container */
            margin-top: 50px;
            /* Adjust the top margin as needed */
        }

        h2 {
            text-align: center;
            color: #7064dc;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input {
            padding: 8px;
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

        button:hover {
            background-color: #574fb8;
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
    <br>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../public/login_php.php" method="post">
            <!-- Add your login form fields here -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
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
