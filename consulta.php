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
            <a class="navbar-brand" href="index.php">TopPuebla</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="consulta.php">Consulta de Topes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="acerca.php">Acerca de</a>
                    </li>
                    
                </ul>

<!--https://bootsnipp.com/snippets/featured/fancy-navbar-login-sign-in-form-->
                
                <span class="ml-auto navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="document.getElementById('email').value = ' '; document.getElementById('pass').value = '' ">
                            Iniciar sesión
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="login-dp">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form" role="form" method="post" action="validalogin.php" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                             <label class="sr-only" for="email">Correo electrónico</label>
                                             <input type="email" class="form-control" name="mail" id="email" placeholder="Correo electrónico" required>
                                        </div>
                                        <div class="form-group">
                                             <label class="sr-only" for="pass">Contraseña</label>
                                             <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required>
                                        </div>
                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                                        </div>
                                 </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bottom text-center">
                                        ¿Aún no estas registrado? <a href="registro.php"><b>Regístrate</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </span>
            </div>
        </div>
    </nav>

<div>

    <br><br>
    <h1 align="center" style="color:white;">Seleccione la Localización del Tope</h1>

    <div id="map_canvas" style="width: auto; height: 300px;">
    </div>
</div>


    <div class="container registro">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center;">Agrega la Información del Tope</h2>
            </div>
        </div>
        <div class="row ingredientes">
            <div class="col-md-12">
                <form method="POST" action="validaReceta.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Latitud</label>
                                    <input type="text" class="form-control" name="latitud" id="txtLatitud"  value="19.005641" required disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Longitud</label>
                                    <input id="txtLongitud" type="text" class="form-control" name="longitud" required value="-98.204317" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre">Calle</label>
                                    <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre">Colonia</label>
                                    <input type="text" class="form-control" name="colonia" id="Colonia"placeholder="Colonia" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="comment">Descripción</label>
                                    <textarea class="form-control" rows="5" name="descripcion" id="descripcion" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="comment">Imagen</label>
                                    <br>
										<input type="file" name="archivo">
                                </div>
                            </div>
                        </div>
                    <br><button type="submit" class="btn btn-primary">Enviar Reporte</button>
                </form>
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