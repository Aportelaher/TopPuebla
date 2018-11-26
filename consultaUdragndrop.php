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
            	<!-- <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">Already have an account?</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Iniciar sesión
								<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
    										<div class="form-group">
    											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
    											 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
    										</div>
    										<div class="form-group">
    											 <label class="sr-only" for="exampleInputPassword2">Password</label>
    											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
    										</div>
    										<div class="form-group">
    											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    										</div>
    								 </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="#"><b>Join Us</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      </ul> -->
        	</div>
    	</div>
	</nav>

    <div class="container registro">
        <div class="row">
            <div class="col-md-3 col-izq">
                <?php
                    require_once 'config.php';
                    require_once 'conexion.php';
                    $base = new dbmysqli($hostname,$username,$password,$database);

                ?>
                <h3>Ingredientes</h3>
                <div class="form-group">
                    <label for="nombre"></label>
                    <input type="text" class="form-control" id="busqueda" placeholder="Nombre" required>
                </div>
                <div id="resultado"></div>
                <ol class="simple_with_animation list-group text-ingredientes scroll1">
                    <li class="list-group-item">Another</li>
                <?php
                    $consulta = "SELECT DISTINCT nombre FROM ingrediente";
                    $result = $base->ExecuteQuery($consulta);
                    if($result){
                        while ($row=$base->GetRows($result)){
                            $nombre = $row['0'];
                            ?>
                                <li class="list-group-item" id="<?php echo $nombre ?>" onclick="agregar(<?php echo "'$nombre'" ?>)"><?php echo "$nombre"; ?></li>
                            <?php
                        }
                        $base->SetFreeResult($result);
                    }else{
                        echo "<h3>Error generando la consulta</h3>";
                    }
                    $base -> CloseConnection();
                ?>
                </ol>
            </div>
            <div class="col-md-9 col-der">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Arrastra tus ingredientes aquí</h3>
                        <ol class='simple_with_animation list-group text-ingredientes scroll1'>
                            <li class="list-group-item"></li>
                        </ol>
                    </div>
                </div>
                <div class="fondo"><a href="#" class="btn btn-primary">Buscar receta</a></div>
            </div>
        </div>
    </div>

	<script src="dist/jquery/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
    <script src="js/jquery-sortable.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var consulta;
            //comprobamos si se pulsa una tecla
            $("#busqueda").keyup(function(e){
                //obtenemos el texto introducido en el campo de búsqueda
                consulta = $("#busqueda").val();
                //hace la búsqueda
                $.ajax({
                    type: "POST",
                    url: "buscar.php",
                    data: "b="+consulta,
                    dataType: "html",
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#resultado").empty();
                    $("#resultado").append(data);                                                             
                    }
                });
            });                                                     
});
    </script>
    
    <script type="text/javascript">
        var adjustment;
        $("ol.simple_with_animation").sortable({
            group: 'simple_with_animation',
            pullPlaceholder: false,
            // animation on drop
            onDrop: function  ($item, container, _super) {
                var $clonedItem = $('<li/>').css({height: 0});
                $item.before($clonedItem);
                $clonedItem.animate({'height': $item.height()});

                $item.animate($clonedItem.position(), function  () {
                    $clonedItem.detach();
                    _super($item, container);
                });
            },
            // set $item relative to cursor position
            onDragStart: function ($item, container, _super) {
                var offset = $item.offset(),
                pointer = container.rootGroup.pointer;
                adjustment = {
                    left: pointer.left - offset.left,
                    top: pointer.top - offset.top
                };
                _super($item, container);
            },
            onDrag: function ($item, position) {
                $item.css({
                    left: position.left - adjustment.left,
                    top: position.top - adjustment.top
                });
            }
        });
    </script>
    <script type="text/javascript">
        function agregar(nombre){
            
            console.log(nombre);
        }
        function quitar(nombre) {
            document.getElementById(nombre).remove();
        }
    </script>
</body>
</html>