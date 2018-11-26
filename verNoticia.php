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
	        <a class="navbar-brand" href="index.php">UEL UELIK</a>
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
        	</button>
        	<div class="collapse navbar-collapse" id="navbarNav">
	            <ul class="navbar-nav">
                	<li class="nav-item">
	                    <a class="nav-link scroll-link" href="consulta.php">Consulta de receta</a>
                	</li>
                	<li class="nav-item">
	                    <a class="nav-link scroll-link" href="noticias.php">Noticias</a>
                	</li>
	                <li class="nav-item">
                    	<a class="nav-link scroll-link" href="acerca.php">Acerca de</a>
                	</li>
                	
            	</ul>

<!--https://bootsnipp.com/snippets/featured/fancy-navbar-login-sign-in-form-->
            	
            	<span class="ml-auto navbar-nav">
            		<li class="nav-item dropdown">
            			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            							¿Aún no estas registrado? <a href="registro.php"><b>Registrarse</b></a>
            						</div>
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
