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
	<title>Uel Uelik</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
.img1 { background-image: url("img/Puebla10.jpg"); }


/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.3); /* Black w/opacity/see-through */
  color: black;
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


</style>
    
</head>
<body>
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

    <div class="bg-image img1">
      <br><br>
    <div class="container registro">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center" style="color:white;">Noticias</h1>
            </div>
        </div>
        <div class="row custom justify-content-center">
            <div class="col-md-12">
                <?php
                    require_once 'config.php';
                    require_once 'conexion.php';

                    $base = new dbmysqli($hostname,$username,$password,$database);
                    $query="SELECT id_noticia, titulo, descripcion FROM Publicacion";
                    $result = $base->ExecuteQuery($query);
                    if($result){
                        while ($row=$base->GetRows($result))
                        {
                            $id_noticia  = $row[0];
                            $titulo = $row[1];
                            $descripcion = $row[2];
                            ?>
                              <center>
                              <div class="form-group">
                                  <label for="mail"><a class="enlace-noticia" href="verNoticiaU.php?id_noticia=<?php echo ($id_noticia) ?>"><span><?php echo ($row['1']) ?></span></a><br></label>
                              </div>
                            </center>
                            <?php


                        }
                        $base->SetFreeResult($result);
                    }else{
                        echo "<h3>Error generando la consulta</h3>";
                    }
                ?>
            </div>
        </div>
    </div>
  </div>
	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>
