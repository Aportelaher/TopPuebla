<?php
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
        header("Location:index.php");
    }else{
        if ($_SESSION['tipo'] == 1) {
            header("Location:indexU.php");
        }
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
  color: white;
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
            <a class="navbar-brand" href="indexAdmin.php">TopPuebla</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                   <li class="nav-item">
                      <a class="nav-link scroll-link" href="topesAdmin.php">Topes</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link scroll-link" href="ReporteAdmin.php">Reportes</a>
                  </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="crearPublicacion.php">Realizar Publicación</a>
                    </li>
                  <li class="nav-item">
                      <a class="nav-link scroll-link" href="Usuarios.php">Usuarios</a>
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

    <br><br>
    <h1 align="center" style="color:white;">Topes Aprobados</h1>

</div>
<center>
  <table border="20">
  <tr>
    <td>Nombre</td>
    <td>Usuario</td>
    <td>Correo</td>

  </tr>
    <?php
      require_once 'config.php';
                            $link=mysqli_connect($hostname, $username, $password);//Query de la base de Datos
                            mysqli_select_db($link, $database); 

                            $result = mysqli_query($link, "select * from Usuario");

                            while($row= mysqli_fetch_array($result))
                            {
                                $nom = $row["nombre"];
                                $usu = $row["username"];
                                $cor = $row["correo"];
                                $id_usuario = $row["id_usuario"];

                                ?>
                                <tr>
                                  <td><?php echo "$nom"; ?></td>
                                  <td><?php echo "$usu"; ?></td>
                                  <td><?php echo "$cor"; ?></td>
                                  <td><a href="editarUsuario.php?id_usuario=<?php echo "$id_usuario" ?>"><img src="img/editar.png"></a></td>
                                  <td><a href="eliminarUsuario.php?id_usuario=<?php echo "$id_usuario" ?>"><img src="img/eliminar.png"></a></td>
                                </tr>
                                <?php
                            }

                            echo ("</table>");

                            mysqli_free_result($result);
                            mysqli_close($link);
                            //update pelicula set imagen=('/imagen6.jpg') where id_pelicula=6;
                        ?>
</center>


    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKxe7Nb-cGjLAbUOOX61xW9M1P1_7k7qk&callback=initMap">
    </script>




    <script src="dist/jquery/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>