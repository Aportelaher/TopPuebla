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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uel Uelik</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
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
                      <a class="nav-link scroll-link" href="agregaAdmin.php">Agregar administrador</a>
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
    <div class="container custom">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
    <div class="container registro">
        <div class="row">
            <div class="col-md-12">
                <h2>Registro</h2>
            </div>
        </div>
        <div class="row custom justify-content-center">
            <div class="col-md-12">
                <form method="POST" action="validaRegistro.php" enctype="multipart/form-data">
                	<div class="form-group">
                		<label for="mail">Correo electrónico</label>
                		<input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelp" placeholder="Correo electrónico" required>
                	</div>
                	<div class="form-group">
                		<label for="user">Usuario</label>
                		<input type="text" class="form-control" name="user" id="user" placeholder="Nombre de usuario" required>
                	</div>
					<div class="form-group">
                		<label for="name">Nombre completo</label>
                		<input type="text" class="form-control" name="name" id="name" placeholder="Nombre completo" required>
                	</div>
                    <div class="form-group row">
                    	<label for="pass1" class="col-sm-3 col-form-label">Contraseña</label>
                    	<div class="col-sm-9">
                    		<input type="password" class="form-control" name="pass1" id="pass1" placeholder="Contraseña" required>
                    	</div>
                    </div>
                    <div class="form-group row">
                    	<div class="col-sm-3"></div>
                    	<div class="col-sm-9">
                    		<input type="password" class="form-control" name="pass2" id="pass1" placeholder="Confirmar contraseña" required>
                    	</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>