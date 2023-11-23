<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>FAQs Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #fff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #7064dc;
        }

        .faq-item {
            margin-bottom: 20px;
        }

        .question {
            font-weight: bold;
            color: #7064dc;
            cursor: pointer;
            user-select: none;
        }

        .answer {
            display: none;
            margin-top: 10px;
        }

        .answer.show {
            display: block;
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
        <div class="faq-item">
            <div class="question" onclick="toggleAnswer(this)">Does the government keep track of my data while using the
                Wi-Fi spots?</div>
            <div class="answer">It is necessary to point out that no type of information, like personal data is kept in
                possession of Mexico City's
                government while or after using the service.</div>
        </div>

        <div class="faq-item">
            <div class="question" onclick="toggleAnswer(this)">Is the service free?</div>
            <div class="answer">Yes. All Wi-fi navigation is free to our users.</div>
        </div>

        <!-- Add more FAQ items as needed -->

    </main>

    <script>
        function toggleAnswer(element) {
            const answer = element.nextElementSibling;
            answer.classList.toggle("show");
        }
    </script>
    <footer>
        <p>&copy; 2023 Wi-Fi CDMX. All rights reserved.</p>
    </footer>
</body>

</html>
