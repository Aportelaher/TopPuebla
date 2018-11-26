<!DOCTYPE html>
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
  height: 150%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img3 { background-image: url("img/3.jpg"); }


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
<body onload="document.getElementById('pass1').value = ''; document.getElementById('pass2').value = ''; document.getElementById('name').value = ''">

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
                       <input type="email" class="form-control" name="mail" id="email" placeholder="Correo electrónico" required value=" ">
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

  <br><br>
    <div class="container custom">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
    <div class="container registro">
        <div class="row">
            <div class="col-md-12">
                <h1 align="center" style="color:white;">Registro</h1>
            </div>
        </div>
        <div class="bg-image img3">
        <div class="row custom justify-content-center">
            <div class="col-md-12">
                <form method="POST" action="validaRegistro.php" enctype="multipart/form-data" autocomplete="off">
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

                  <div class="row">
                    	<div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Contraseña</label>
                                    <input type="password" class="form-control" name="pass1" id="pass1"  required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre">Confirmación</label>
                                    <input id="pass2" type="password" class="form-control" name="pass2" required>
                                </div>
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</div>
	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
</body>
</html>