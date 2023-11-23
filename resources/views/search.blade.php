<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="../public/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 20px;
        }

        .dropdown-container,
        .search-container {
            margin-top: 20px;
        }

        select,
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            margin-right: 10px;
        }

        select {
            cursor: pointer;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #7064dc;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #574fb8;
        }
        .result-container {
            display: grid;
            grid-template-columns:1fr 1fr;
            background-color: #7064dc;
            border: 2px solid #7064dc;
            border-radius: 5px;
            /* Optional: Add rounded corners */
            margin-bottom: 10px;
            /* Optional: Add spacing between result containers */
            max-width: 95%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
        }
        .Contenido2 {
            display: grid;
            height: 100%;
            width: 100%;
            
            justify-items: center;
            padding-bottom: 40px;
        }
        .result-container> div:nth-child(1n+1){
            display: block;
            display: flex;
            justify-content: center;
            justify-items: center; 
            align-items: center;
        }
        .Contenido2> div:nth-child(1n+1){
            display: block;
            display: flex;
            align-items: center;
            justify-content: center;
            justify-items: center; 
        }

        .result-content {
            padding: 10px;
        }

        .color {
            color: white;
            
            margin-left: auto;
            margin-right: auto;
        }

        .result-key {
            font-weight: 600;
            margin-bottom: 5px;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hide{
            display: none
        }
    </style>
</head>

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


<script>
    function typoSearch() {
        var colorSeleccionado = document.getElementById("miComboBox").value;
        var miInput = document.getElementById("Type");
        miInput.value = colorSeleccionado;
        document.getElementById("searchQuery").removeAttribute("disabled");
    }
    function Cambio(Tipo) {
        if (Tipo==1){
            var miInput = document.getElementById("Atras");
            miInput.value = "1";
        }
        else{
            var miInput = document.getElementById("Adelante");
            miInput.value = "2";
        }
    }
  </script>

<body>
    <br><br><br><br><br>
    <div class="search-container">
        <form action="{{ route('search') }}" method="GET">
            <label for="pageSelection">Select a Page:</label>
            <select id="miComboBox" name="page"  onchange='typoSearch()' >
                <option value=0 disabled selected>Select a Page</option>
                <option value=1>Beneficiario</option>
                <option value=2>Municipios</option>
                <option value=3>Colonias</option>
                <option value=4>Programa</option>
                <option value=5>Encargados de Alcaldia</option>
                <option value=6>Datos Geograficos</option>
            </select>

            <label for="searchQuery">Search:</label>

            <input class="hide" type="text" id="Type" value=0 >

            <input type="text" id="searchQuery" name="query" placeholder="Enter search term" disabled>

            <input type="submit" value="Search">
        </form>
    </div>
    <br><br>
    <section >
        <div class="hide" >
            <?php 
                try{
                if($_SESSION['type']){
                    $type= $_SESSION['type'];
                    $cadena= $_SESSION['except'];
                    
                }   
                 
                }
                catch (Exception $e){
                    $type= 1;
                    $cadena= "Esc";
                }    
            ?>
        </div>
        
            
            <?php
                $Minimo=0;
                try{
                    $Actual=$_SESSION['Actual'];
                }
                catch (Exception $e){
                    $Actual=0;
                }  
                $Maximo=0;
                $Espacio=1;
                $contador=1;
                $con = new mysqli("localhost", "root", "", "puntos_wifi");

                $sql = "SELECT * FROM programa ";
                $Programas = $con->query($sql);

                $sql = "SELECT * FROM puntos ";
                $Puntos = $con->query($sql);

                $sql = "SELECT * FROM datosgeograficos ";
                $Geo = $con->query($sql);
                try{
                    $NLetrasBusqueda = strlen($cadena);
                }
                catch (Exception $e){
                    $cadena="$";
                    $type="0";
                } 
                $archivo = fopen("ubicaciones.csv", "w");
                $Contado=1;


                if ($type=="1")
                {   
                    $sql = "SELECT * FROM beneficiario ";
                    $bene = $con->query($sql);
                    while($Colum = $bene->fetch_array() and $ColumPro = $Programas->fetch_array() and  $ColumPun = $Puntos->fetch_array() and $ColumGeo = $Geo->fetch_array()){
                        $Nombre=$Colum['tipo_bene'];
                        $Program=$Colum['idprogram'];
                        $NLetrasName = strlen($Nombre);
                        if ($NLetrasBusqueda<=$NLetrasName){
                            $Busqueda = substr($Nombre, 0, $NLetrasBusqueda);
                            if ($cadena==$Busqueda){
                                $Maximo=$Maximo+1;
                                if ($Contado>$Actual*10){
                                    
                                    $var1=$ColumPro['nombrepr'];
                                    $var2=$ColumPun['fecha'];
                                    $var3=$ColumGeo['longitud'];
                                    $var4=$ColumGeo['latitud'];
                                    if ($contador==1)
                                    {
                                        echo '<div class="result-container"><div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>   '.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                        echo '</div>';
                                        $contador=$contador+1;
                                    }
                                    else if ($contador!=0)
                                    {
                                        echo '<div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!4v1700419910107!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>'.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                        echo '</div></div>';
                                        $contador=1;
                                        
                                    }
                                    if ($Espacio==10){$contador=0;}
                                    else{$Espacio=$Espacio+1;}
                                }
                                $Contado=$Contado+1;
                            }
                        }   
                    }
                    $Maximo=intval($Maximo / 10) ;
                    if ($Maximo % 10!=0){
                        $Maximo=$Maximo+1;
                    }
                    if ($contador==1){echo '</div>';}
                }
                if ($type=="2")
                {   
                    $sql = "SELECT * FROM municipio ";
                    $mun = $con->query($sql);
                    
                    while($Colum = $mun->fetch_array()){
                        $NombreM=$Colum['nombrem'];
                        
                        $NLetrasName = strlen($NombreM);
                        if ($NLetrasBusqueda<=$NLetrasName){
                            $Busqueda = substr($NombreM, 0, $NLetrasBusqueda);
                            if ($cadena==$Busqueda){
                                $municipio=$Colum['idmunicipio'];
                                break;
                            }
                            else{
                                $municipio=0;
                            }
                        }
                    }
          
                    while($ColumPro = $Programas->fetch_array() and  $ColumPun = $Puntos->fetch_array() and $ColumGeo = $Geo->fetch_array()){
                                
                                $idAlcaldia=$ColumPro['idalcaldia'];
                                if ($idAlcaldia==$municipio){
                                    $Maximo=$Maximo+1;
                                    if ($Contado>$Actual*10){
                                        
                                        $var1=$NombreM;
                                        $var2=$ColumPun['fecha'];
                                        $var3=$ColumGeo['longitud'];
                                        $var4=$ColumGeo['latitud'];
                                        if ($contador==1)
                                        {
                                            echo '<div class="result-container"><div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>   '.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                            echo '</div>';
                                            $contador=$contador+1;
                                        }
                                        else if ($contador!=0)
                                        {
                                            echo '<div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!4v1700419910107!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>'.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                            echo '</div></div>';
                                            $contador=1;
                                            
                                        }
                                        if ($Espacio==10){$contador=0;}
                                        else{$Espacio=$Espacio+1;}
                                    }
                                }
                                $Contado=$Contado+1;
                            }   
                }
                if ($type=="3")
                {    
                    $sql = "SELECT * FROM colonia ";
                    $mun = $con->query($sql);
                    
                    while($Colum = $mun->fetch_array()){
                        $NombreC=$Colum['nombrec'];
                        
                        $NLetrasName = strlen($NombreC);
                        if ($NLetrasBusqueda<=$NLetrasName){
                            $Busqueda = substr($NombreC, 0, $NLetrasBusqueda);
                            if ($cadena==$Busqueda){
                                $municipio=$Colum['idmunicipio'];
                                break;
                            }
                            else{
                                $municipio=0;
                            }
                        }
                    }
          
                    while($ColumPro = $Programas->fetch_array() and  $ColumPun = $Puntos->fetch_array() and $ColumGeo = $Geo->fetch_array()){
                                
                                $idAlcaldia=$ColumPro['idalcaldia'];
                                if ($idAlcaldia==$municipio){
                                    $Maximo=$Maximo+1;
                                    if ($Contado>$Actual*10){
                                        
                                        $var1=$NombreC;
                                        $var2=$ColumPun['fecha'];
                                        $var3=$ColumGeo['longitud'];
                                        $var4=$ColumGeo['latitud'];
                                        if ($contador==1)
                                        {
                                            echo '<div class="result-container"><div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>   '.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                            echo '</div>';
                                            $contador=$contador+1;
                                        }
                                        else if ($contador!=0)
                                        {
                                            echo '<div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!4v1700419910107!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>'.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                            echo '</div></div>';
                                            $contador=1;
                                            
                                        }
                                        if ($Espacio==10){$contador=0;}
                                        else{$Espacio=$Espacio+1;}
                                    }
                                }
                                $Contado=$Contado+1;
                            } 
                }
                if ($type=="4")
                {    
                    while($ColumPro = $Programas->fetch_array() and  $ColumPun = $Puntos->fetch_array() and $ColumGeo = $Geo->fetch_array()){
                        $Nombre=$ColumPro['nombrepr'];
                        $NLetrasName = strlen($Nombre);
                        if ($NLetrasBusqueda<=$NLetrasName){
                            $Busqueda = substr($Nombre, 0, $NLetrasBusqueda);
                            if ($cadena==$Busqueda){
                                $Maximo=$Maximo+1;
                                if ($Contado>$Actual*10){
                                    
                                    $var1=$ColumPro['nombrepr'];
                                    $var2=$ColumPun['fecha'];
                                    $var3=$ColumGeo['longitud'];
                                    $var4=$ColumGeo['latitud'];
                                    if ($contador==1)
                                    {
                                        echo '<div class="result-container"><div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>   '.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                        echo '</div>';
                                        $contador=$contador+1;
                                    }
                                    else if ($contador!=0)
                                    {
                                        echo '<div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!4v1700419910107!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>'.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                        echo '</div></div>';
                                        $contador=1;
                                        
                                    }
                                    if ($Espacio==10){$contador=0;}
                                    else{$Espacio=$Espacio+1;}
                                }
                                $Contado=$Contado+1;
                            }
                        }   
                    }
                    $Maximo=intval($Maximo / 10) ;
                    if ($Maximo % 10!=0){
                        $Maximo=$Maximo+1;
                    }
                    if ($contador==1){echo '</div>';}
                }
                if ($type=="5")
                {    
                    $sql = "SELECT * FROM encargado ";
                    $mun = $con->query($sql);
                    
                    while($Colum = $mun->fetch_array()){
                        $NombreE=$Colum['nombre'];
                        
                        $NLetrasName = strlen($NombreE);
                        if ($NLetrasBusqueda<=$NLetrasName){
                            $Busqueda = substr($NombreE, 0, $NLetrasBusqueda);
                            if ($cadena==$Busqueda){
                                $municipio=$Colum['id_encargado'];
                                break;
                            }
                            else{
                                $municipio=0;
                            }
                        }
                    }
          
                    while($ColumPro = $Programas->fetch_array() and  $ColumPun = $Puntos->fetch_array() and $ColumGeo = $Geo->fetch_array()){
                                
                                $idAlcaldia=$ColumPro['idalcaldia'];
                                if ($idAlcaldia==$municipio){
                                    $Maximo=$Maximo+1;
                                    if ($Contado>$Actual*10){
                                        
                                        $var1=$NombreE;
                                        $var2=$ColumPun['fecha'];
                                        $var3=$ColumGeo['longitud'];
                                        $var4=$ColumGeo['latitud'];
                                        if ($contador==1)
                                        {
                                            echo '<div class="result-container"><div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>   '.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                            echo '</div>';
                                            $contador=$contador+1;
                                        }
                                        else if ($contador!=0)
                                        {
                                            echo '<div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!4v1700419910107!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>'.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                            echo '</div></div>';
                                            $contador=1;
                                            
                                        }
                                        if ($Espacio==10){$contador=0;}
                                        else{$Espacio=$Espacio+1;}
                                    }
                                }
                                $Contado=$Contado+1;
                            } 
                }
                if ($type=="6")
                {    
                    while($ColumPro = $Programas->fetch_array() and  $ColumPun = $Puntos->fetch_array() and $ColumGeo = $Geo->fetch_array()){
                        $Nombre=$ColumGeo['latitud'];
                        $Nombre2=$ColumGeo['longitud'];
                        $NLetrasName = strlen($Nombre);
                        $NLetrasName2 = strlen($Nombre2);
                        if ($NLetrasBusqueda<=$NLetrasName){
                            $Busqueda = substr($Nombre, 0, $NLetrasBusqueda);
                            $Busqueda2 = substr($Nombre2, 0, $NLetrasBusqueda);
                            if ($cadena==$Busqueda or $cadena==$Busqueda2){
                                $Maximo=$Maximo+1;
                                if ($Contado>$Actual*10){
                                    
                                    $var1=$ColumPro['nombrepr'];
                                    $var2=$ColumPun['fecha'];
                                    $var3=$ColumGeo['longitud'];
                                    $var4=$ColumGeo['latitud'];
                                    if ($contador==1)
                                    {
                                        echo '<div class="result-container"><div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>   '.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                        echo '</div>';
                                        $contador=$contador+1;
                                    }
                                    else if ($contador!=0)
                                    {
                                        echo '<div class="color Contenido2 "><iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1409.9664853163163!2d'.$var3.'!3d'.$var4.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDIxJzQ1LjQiTiA5OcKwMTUnMTAuNiJX!5e0!3m2!1ses!2smx!4v1700419910107!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>'.$var1.'<br><br>'.$var2.'<br><br>'.$var3.'<br><br>'.$var4.'<br><br>'.'<br><br>';
                                        echo '</div></div>';
                                        $contador=1;
                                        
                                    }
                                    if ($Espacio==10){$contador=0;}
                                    else{$Espacio=$Espacio+1;}
                                }
                                $Contado=$Contado+1;
                            }
                        }   
                    }
                    $Maximo=intval($Maximo / 10) ;
                    if ($Maximo % 10!=0){
                        $Maximo=$Maximo+1;
                    }
                    if ($contador==1){echo '</div>';}
                }

                $Maximo=intval($Maximo / 10) ;
                if ($Maximo % 10!=0){
                    $Maximo=$Maximo+1;
                }
                if ($contador==1){echo '</div>';}

                            
                #$_SESSION['id_cliente']  = $idU;
                #$conn = new mysqli("localhost", "root", "", "puntos_wifi");
                #$sql = "SELECT * FROM programa WHERE idalcaldia  = $id ";
                #$res = $con->query($sql);
                #$res = $res->fetch_assoc();
                #while($Colum = $res->fetch_array()){

                #}
            ?>
            <form action="{{ route('search2') }}" method="GET">
                <input type="submit" value="<<" id="Atras" name="Atras" onclick="Cambio(1) "  <?php if ($Actual==$Minimo){ echo 'class="hide"' ;}?>>
                
                <input type="text" id="searchQuery" placeholder="     Pagina <?php echo "$Actual" ?>" size="10" disabled>
                <input type="submit" value=">>" id="Adelante" name="Adelante" onclick="Cambio(2)" <?php if ($Actual==$Maximo){ echo 'class="hide"' ;}?>>
                <br>
                <label type="text" style="position: absolute; left: 823px; top: 2880px;"<?php if ($Actual==$Minimo){ echo 'class="hide">' ;}else{echo ">$Minimo" ;}?></label> 
                <label type="text" style="position: absolute; left: 1027px; top: 2880px;"<?php if ($Actual==$Maximo){ echo 'class="hide">' ;}else{echo ">$Maximo" ;}?></label> 
            </form>
        
    </section>   

    <!-- Display search results -->

</body>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<footer>
    <p>&copy; 2023 Wi-Fi CDMX. All rights reserved.</p>
</footer>

</html>
