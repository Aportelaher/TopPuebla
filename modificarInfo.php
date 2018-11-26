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
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img1 { background-image: url("img/CaminataEnElBosque-DominiqueCrenn.png"); } 
.img2 { background-image: url("img/MoleMadre-EnriqueOlvera.png"); }
.img3 { background-image: url("img/ArrozNegroYLechedeNueces-AlexAtala.png"); } 
.img4 { background-image: url("img/PescaCercana-Virgilio.png"); } 


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
	        <a class="navbar-brand" href="indexAdmin.php">UEL UELIK</a>
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
        	</button>
        	<div class="collapse navbar-collapse" id="navbarNav">
	            <ul class="navbar-nav">
                	<li class="nav-item">
	                    <a class="nav-link scroll-link" href="crearPublicacion.php">Realizar Publicación</a>
                	</li> 
	                <li class="nav-item">
                    	<a class="nav-link scroll-link" href="modificarInfo.php">Modificar Información</a>
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

    
    <div class="bg-image img1"></div>
    <div class="bg-image img2"></div>
    <div class="bg-image img3"></div>
    <div class="bg-image img4"></div>

    <div class="bg-text">Hola! <br><?php echo ($_SESSION['username']); ?></div>


	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>