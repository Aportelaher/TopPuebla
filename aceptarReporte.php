<?php
	$id_reporte = $_GET['id_reporte'];
	require_once 'config.php';
	require_once 'conexion.php';
	$base = new dbmysqli($hostname,$username,$password,$database);

	$query="SELECT * FROM reporte where NoRep = $id_reporte";
	$result = $base->ExecuteQuery($query);
	if($result)
	{
		if ($row=$base->GetRows($result))
		{
			var_dump($row);
			$id_usuario = $row['1'];
			$Calle = $row['2'];
			$Latitud = $row['3'];
			$Longitud = $row['4'];
			$Colonia = $row['5'];
			$Imagen = $row['6'];
			$Descripcion = $row['7'];
			$reporte = array("idUs" => "$id_usuario","Calle" => "$Calle", "Latitud" => "$Latitud", "Longitud" => "$Longitud", "Colonia" => "$Colonia", "Imagen" => "$Imagen", "Desripcion" => "$Descripcion");
			var_dump($reporte);
			$base->insertar("tope",$reporte);
			$base->SetFreeResult($result);
		}else
		{
			echo "<h3>Error generando la consulta</h3>";
		}
	}
	
	$recetas = array("NoRep"=> $id_reporte);
	$base ->borrar("reporte",$recetas,"ReporteAdmin.php") ;
	$base -> CloseConnection();
?>