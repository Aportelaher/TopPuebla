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
.img1 { background-image: url("img/LeChocolat-DominiqueCrenn.png"); }
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

  <div class="bg-image img1 padtop">
    <div class="row rowsincon">
      <div class="col-md-12">
        <h3>Mis recetas</h3>
        <?php
          require_once 'config.php';
          require_once 'conexion.php';
          $id_usuario = $_SESSION['id_usuario'];
          $base = new dbmysqli($hostname,$username,$password,$database);
          $query="SELECT id_receta, nombre FROM receta WHERE id_usuario = $id_usuario";
          $result = $base->ExecuteQuery($query);
          ?>
          <div class="table-responsive">
                <table class="table">
                            <tr>
                                <th>Nombre de la receta</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
              </div>
              <?php
          if($result){
            while ($row=$base->GetRows($result)){
              
              ?>
              <tr>
                <td><a href="verReceta.php?id_receta=<?php echo ($row['0']) ?>"><?php echo ($row['1']) ?></a></td>
                <td><a href="editReceta.php?id_receta=<?php echo ($row['0']) ?>"><img class="editar" src="img/editar.png"></a></td>
                <td><a href="eliminarReceta.php?id_receta=<?php echo ($row['0']) ?>" onclick="return confirm('¿Esta seguro que desea eliminar?');"><img class="editar" src="img/eliminar.png"></a></td>
              </tr>
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

	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
    <script type="text/javascript">
        var num_ingredientes = 0;
        function agregar() {
            num_ingredientes = num_ingredientes + 1;
            if (num_ingredientes > 0) {
                for (var i = 1; i < num_ingredientes; i++) {
                    console.log(document.getElementById("demo"));
                }
            }
            var ingrediente = "<div class='row' id='"+num_ingredientes+"'><div class='col-sm-4'><div class='form-group'><input type='text' class='form-control' name='ingrediente[]' placeholder='Nombre' required></div></div>";
            var gramaje = "<div class='col-sm-3'><div class='form-group'><input type='text' class='form-control' name='gramaje[]' placeholder='Gramaje' required></div></div>";
            var unidad = "<div class='col-sm-3'><div class='form-group'><select class='custom-select' name='unidad[]' required><option value=''>Seleccione una unidad</option><option value='Pizca'>Pizca</option><option value='Pieza'>Pieza</option><option value='Cucharada'>Cucharada</option><option value='Onza'>Onza</option><option value='Taza'>Taza</option><option value='Litro'>Litro</option><option value='Gramos'>Gramos</option><option value='Libras'>Libras</option><option value='Libras'>Libras</option><option value='Kilo'>Kilo</option><option value='Al gusto'>Al gusto</option></select></div></div>";
            var eliminar = "<div class='col-sm-2 text-center'><button class='btn' onclick='eliminarIngrediente("+num_ingredientes+")'>x</button></div>";

                            
            //console.log(ingrediente + "" + gramaje + "" + unidad + eliminar);
            document.getElementById("demo").innerHTML += ingrediente + "" + gramaje + "" + unidad + "" + eliminar;
        }

        function eliminarIngrediente(id) {
            document.getElementById(id).remove();
            num_ingredientes--;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        if (!$('#dataConfirmModal').length) {
            $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">OK</a></div></div>');
        } 
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});
    </script>
</body>
</html>