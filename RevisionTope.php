<?php
    session_start();
    if (!isset($_SESSION['id_usuario'])) 
    {
        header("Location:index.php");
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TopPuebla</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: 'Montserrat', sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img1 { background-image: url("img/PatoZensai-NikiNakayama.png"); }
.img2 { background-image: url("img/ArrozNegroYLechedeNueces-AlexAtala.png"); }
.img3 { background-image: url("img/CosechaPasachámac-Virgilio.png"); }
.img4 { background-image: url("img/MoleMadre-EnriqueOlvera.png"); }


/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  font-size: 80px;
  border: 10px solid #f1f1f1;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 1500px;
  padding: 20px;
  text-align: center;

}

  #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
</style>
</head>
<body onload="initialize();">


    <!-- Top menu -->
<nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
        <div class="container">
            <a class="navbar-brand" href="indexU.php">TopPuebla</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="consultaU.php">Consulta de Topes</a>
                    </li>
                  <li class="nav-item">
                        <a class="nav-link scroll-link" href="Reporte.php">Reportar Tope</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="noticiasU.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="acercaU.php">Acerca de</a>
                    </li>
                    
                </ul>

<!--https://bootsnipp.com/snippets/featured/fancy-navbar-login-sign-in-form-->
                
                <span class="ml-auto navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo ($_SESSION['username']); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="login-dp-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="enlacesDrop" href="perfil.php">Mi perfil</a><br>
                                    <a class="enlacesDrop" href="cerrarsesion.php">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </span>

            </div>
        </div>
    </nav>

<div>

    <br><br><br><br><br>

    <div class="container registro">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center;">El Reporte ha sido enviado para su Validación</h2>
                <h2 style="text-align: center;">con los siguientes Datos: </h2><br>
            </div>
        </div>
        <div class="row ingredientes">
            <div class="col-md-12">

                <?php 

                $usu=$_SESSION['username'];
                $lat=$_POST['latitud'];
                $long=$_POST['longitud'];
                $calle=$_POST['calles'];
                $col=$_POST['colonias'];
                $des=$_POST['descripciones'];
                $im=$_FILES['archivo']['name'];

                                    $ruta = "Topes/".$_FILES['archivo']['name'];

                                    if(is_uploaded_file($_FILES['archivo']['tmp_name']))
                                    {
                                        copy($_FILES['archivo']['tmp_name'], $ruta);
                                    }
                                    require_once 'config.php';
                                    
                                    $link=mysqli_connect("localhost", "hugo", "aioris12345");//Query de la base de Datos
                                    mysqli_select_db($link, "TopPuebla"); 

                                    $result2 = mysqli_query($link, "select * from Usuario where username='$usu'");
                                    $row= mysqli_fetch_array($result2);         
                                    $fi = $row["id_usuario"];

                                   

                                    $result3 = mysqli_query($link, "insert into Reporte (idUs, Calle, Latitud, Longitud, Colonia, Imagen, Descripcion)
                                    values('$fi','$calle','$lat', '$long', '$col', '$im', '$des')");


                                    mysqli_free_result($result2);
                                    mysqli_free_result($result3);
                                    mysqli_close($link); 


                ?>
                
                <h4 style="text-align: center;">Longitud: <?php echo ("$lat"); ?></h4>
                <h4 style="text-align: center;">Latitud: <?php echo ("$long"); ?> </h4>
                <h4 style="text-align: center;">Calle: <?php echo ("$calle"); ?></h4>
                <h4 style="text-align: center;">Colonia: <?php echo ("$col"); ?></h4>
                <h4 style="text-align: center;">Descripicion: <?php echo ("$des"); ?></h4>
                <h4 style="text-align: center;">Imagen: <br><?php echo ("<img src = 'Topes/$im' width=400 height=400 <br><hr>" );?> </h4>
                <h4 style="text-align: center;">Id de Usuario Colaborador: <?php echo ("$fi"); ?></h4>
            </div>
        </div>
    </div>

    

    <script>
// Initialize and add the map
function initialize() {
            // Creating map object
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 17,
                center: new google.maps.LatLng(19.005641, -98.204317),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // creates a draggable marker to the given coords
            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(19.005641, -98.204317),
                draggable: true
            });

            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#txtLatitud").val(evt.latLng.lat().toFixed(6));
                $("#txtLongitud").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });

            // centers the map on markers coords
            map.setCenter(vMarker.position);

            // adds the marker on the map
            vMarker.setMap(map);
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKxe7Nb-cGjLAbUOOX61xW9M1P1_7k7qk&callback=initMap">
    </script>




    <script src="dist/jquery/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>