<?php
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
        header("Location:index.php");
    }
?>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uel Uelik</title>
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
  height: 125%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img1 { background-image: url("img/PescaCercana-Virgilio.png"); }
.img2 { background-image: url("img/ArrozNegroYLechedeNueces-AlexAtala.png"); }
.img3 { background-image: url("img/CaminataEnElBosque-DominiqueCrenn.png"); }
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
        <div class="row"><?php 
            require_once 'config.php';
            require_once 'conexion.php';
            //$id_receta = $_GET['id_receta'];
/*            <a href="eliminarProximoEvento.php?id_evento=<?php echo "$id_evento" ?>" class="waves-effect" onclick="return confirm('¿Esta seguro que desea eliminar?');"><i class="fa fa-times fa-fw" aria-hidden="true"></i><span class="hide-menu">Eliminar</span></a></td>
*/

            $id_receta = $_GET['id_receta'];
            $base = new dbmysqli($hostname,$username,$password,$database);
            $query="SELECT* FROM receta WHERE id_receta = '$id_receta'";
            $result = $base->ExecuteQuery($query);
            if($result){
                if ($row=$base->GetRows($result)){
                    $nombre = $row[2];
                    $descripcion = $row[3];
                    $comentario = $row[4];
                }
                $base->SetFreeResult($result);
            }else{
                echo "<h3>Error generando la consulta</h3>";
            }
            $query="SELECT* FROM ingrediente WHERE id_receta = '$id_receta'";
            $result = $base->ExecuteQuery($query);
            if($result){
                while ($row=$base->GetRows($result)){
                    $ingredientes[] = $row[2];
                    $cantidades[] = $row[3];
                }
                $base->SetFreeResult($result);
            }else{
                echo "<h3>Error generando la consulta</h3>";
            }
            $base -> CloseConnection();
            
            ?>
            <div class="col-md-12">
                <h3><?php echo "$nombre"; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo "$comentario"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Ingredientes</h4>
                <ul>
                    <?php
                        for ($i=0; $i < count($ingredientes); $i++) { 
                            ?><li><?php echo ($cantidades[$i]." de ".$ingredientes[$i]) ?> </li><?php
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Preparación</h4>
                <p><?php echo "$descripcion"; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
    </div>
	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>