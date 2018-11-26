<?php
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TopPuebla</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>

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
  height: 50%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img1 { background-image: url("img/Puebla11.jpg"); }

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
  width: 300px;
  padding: 20px;
  text-align: center;
}
</style>


<body>
	<!-- Top menu -->
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
                                    <a class="enlacesDrop" href="perfilU.php">Mi perfil</a><br>
                                    <a class="enlacesDrop" href="cerrarsesion.php">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </span>

            </div>
        </div>
    </nav>

        	</div>
    	</div>
	</nav>
    <br><br/>

    <h1 align="center" style="color:white;">¿Quiénes Somos?</h1>

    <!--<img alt="team" align="right" src="img/team.png" width="400" height="300" /> -->
    <p align="center" style="color: white;"> <br>TopPuebla es un proyecto de Control de Topes, cargado de ilusión que crece dia a dia gracias a nuestros usuarios y visitantes. </p> 

    <h1 align="center" style="color:white;">Equipo</h1>

    <p align="center" style="color: white;font-size:15px">Almaráz González Laura Isabel</p><p align="center" style="color: white;font-size:15px">Lopez Martínez Fernando</p><p align="center" style="color: white;font-size:15px">Aguirre Ramírez Chantal Daniela</p><p align="center" style="color: white;font-size:15px">Aportela Hernández Victor Hugo</p>

    <div class="bg-image img1"></div>



    <script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
</body>

</html>