<?php
	$id_reporte = $_GET['id_reporte'];
	require_once 'config.php';
	require_once 'conexion.php';
	$base = new dbmysqli($hostname,$username,$password,$database);
	$query = "DELETE FROM tope WHERE id_tope = $id_reporte";
	$recetas = array("id_tope"=> $id_reporte);
	$base ->borrar("tope",$recetas,"topesAdmin.php") ;
?>