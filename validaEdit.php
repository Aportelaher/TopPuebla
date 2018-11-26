<style type="text/css">
	.ball {
  margin-top: 50px;
  margin-left: -200px;
  width: 120px;
  height: 40px;
  background-color: #EDE053;
  border-radius: 20px;
  transition: 1s;
  line-height: 40px;
  text-align: center;
}
</style>
<?php
	session_start();
	$id_usuario = $_SESSION['id_usuario'];
	echo "$id_usuario";
	require_once 'config.php';
	require_once 'conexion.php';
	$base = new dbmysqli($hostname,$username,$password,$database);

	if (isset($_POST['nombre'])){
		echo ($_POST['nombre']);
		$nombre = $_POST['nombre'];
	}
	if (isset($_POST['preparacion'])) {
		echo ($_POST['preparacion']);
		$preparacion = $_POST['preparacion'];
	}
	if (isset($_POST['comment'])) {
		echo ($_POST['comment']);
		$comment = $_POST['comment'];
	}
	$receta = array("id_usuario" => "$id_usuario", "nombre" => "$nombre", "preparacion" => "$preparacion", "comentario" => "$comment");
	var_dump($receta);
	$base->insertar("receta",$receta);
	$query="SELECT LAST_INSERT_ID()";
	$result = $base->ExecuteQuery($query);
	if($result){
		if ($row=$base->GetRows($result)){
				echo($row[0]);
				$id_receta = $row[0];
				//header("Location:indexU.php");
		}
		$base->SetFreeResult($result);
	}else{
		echo "<h3>Error generando la consulta</h3>";
	}
	
	//$base -> insertar("receta",$receta);
	if ( !empty($_POST["ingrediente"]) && is_array($_POST["ingrediente"]) ) {
		foreach ( $_POST["ingrediente"] as $ingrediente ) {
			$ingredientes[] = $ingrediente;
		}
	}
	if ( !empty($_POST["gramaje"]) && is_array($_POST["gramaje"]) ) {
		foreach ( $_POST["gramaje"] as $gramaje ) { 
			$gramajes[] = $gramaje;
		}
	}
	if ( !empty($_POST["unidad"]) && is_array($_POST["unidad"]) ) {
		foreach ( $_POST["unidad"] as $unidad ) {
			$unidades[] = $unidad;
		}
	}
	for ($i=0; $i < count($ingredientes); $i++) {
		$insert = array("id_receta" => "$id_receta", "nombre" => "$ingredientes[$i]","cantidad" => "$gramajes[$i] "."$unidades[$i]" );
		$base->insertar("ingrediente",$insert);
	}
	$base -> CloseConnection();
	?>
	<a href="verRecetaU.php?id_receta=<?php echo $id_receta ?>" id="miEnlace">VEr</a>;
	<div class="ball" id="ball">
  Loaded
</div>
	?php
?>
<script type="text/javascript">
	window.onload = function() {
  var ball = document.getElementById('ball')
  ball.style.marginLeft = "25px";
};
</script>
<script>
	document.getElementById("miEnlace").click();
</script>