<?php
	$id_receta = $_GET['id_receta'];
	require_once 'config.php';
	require_once 'conexion.php';
	$base = new dbmysqli($hostname,$username,$password,$database);
	$query = "DELETE FROM receta WHERE id_receta = $id_receta";
	$recetas = array("id_receta"=> $id_receta);
	$base ->borrar("receta",$recetas,"editarReceta.php") ;
?>