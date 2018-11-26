<?php
	$id_reporte = $_GET['id_reporte'];
	require_once 'config.php';
	require_once 'conexion.php';
	$base = new dbmysqli($hostname,$username,$password,$database);
	$query = "DELETE FROM reporte WHERE id_reporte = $id_reporte";
	$recetas = array("NoRep"=> $id_reporte);
	$base ->borrar("reporte",$recetas,"ReporteAdmin.php") ;
?>