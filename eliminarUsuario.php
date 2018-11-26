<?php
	$id_usuario = $_GET['id_usuario'];
	require_once 'config.php';
	require_once 'conexion.php';
	$base = new dbmysqli($hostname,$username,$password,$database);
	$query = "DELETE FROM Usuario WHERE id_usuario = $id_usuario";
	$lol= array("id_usuario"=> $id_usuario);
	$base ->borrar("Usuario",$lol,"Usuarios.php") ;
?>