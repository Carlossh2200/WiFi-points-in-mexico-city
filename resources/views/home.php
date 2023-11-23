<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../public/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navBar">
        <ul class="listaNav">
            <li><a> 
            <div class="imageContainer"> 
              <a class="botonWifi" href="/Bases_de_Datos/public/">
                <img  class="imagenWifiCdmx" src="../public/logo_wifi_cdmx.jpg"> 
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
    <br>
    <br>
    <div class="welcome">
        <div class="welcomeImageContainer sharedBanner">
            <img id="welcomeImage" src="../public/cdmxWifiImage.jpg" alt="imagen del angel de la independencia">
        </div>
        <div class="welcomeText sharedBanner">
            <h2>Search for Wi-fi access points in Mexico City</h2>
            <p> Search across our database with more than 2,800 access ponts across the city</p>
        </div>
        <button class="welcomeButton" onclick="redirect()">Search</button>
        <script>
            function redirect(){
                window.location.href="/Bases_de_Datos/public/search"
            }
        </script>
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
    <div class="paragraph">
        <div class="paragraphText">
        <h2>How does it work?</h2>
        <p>Just sign in and start searching for the nearest access point near you.</p>
        </div>
    </div>
    <div class="guyImage">
        <img id="guyWithPhone" src=../public/guy_phone.jpg>
    </div>
    <main>
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
        <p>&copy;  2023  Wi-Fi CDMX. All rights reserved.</p>
    </footer>

</body>
</html>
