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
  height: 125%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img1 { background-image: url("img/taco.jpg"); }
.img2 { background-image: url("img/ArrozNegroYLechedeNueces-AlexAtala.png"); }
.img3 { background-image: url("img/CaminataEnElBosque-DominiqueCrenn.png"); }
.img4 { background-image: url("img/MoleMadre-EnriqueOlvera.png"); }


/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.8); /* Black w/opacity/see-through */
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
</style>
    
</head>



<body>
	<!-- Top menu -->
  <nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
      <div class="container">
          <a class="navbar-brand" href="indexU.php">UEL UELIK</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link scroll-link" href="consultaU.php">Consulta de receta</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link scroll-link" href="noticiasU.php">Noticias</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link scroll-link" href="acercaU.php">Acerca de</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link scroll-link" href="crearReceta.php">Crear receta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="editarReceta.php">Editar receta</a>
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

    <div class="container registro">
        <div class="row">
            <div class="col-md-12">
                <?php
                    require_once 'config.php';
                    require_once 'conexion.php';
                    $base = new dbmysqli($hostname,$username,$password,$database);
                    $id_noticia = $_GET['id_noticia'];
                    $query="SELECT titulo, descripcion FROM noticia where id_noticia = $id_noticia";
                    $result = $base->ExecuteQuery($query);
                    if($result){
                        if ($row=$base->GetRows($result)){
                            $titulo = $row[0];
                            $descripcion = $row[1];
                            ?>
                            <h3><?php echo "$titulo"; ?></h3>
                            <p><?php echo "$descripcion"; ?></p>
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
