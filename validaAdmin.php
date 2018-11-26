<?php
	session_start();
	//CAPTURA DE DATOS DEL FORMULARIO
	require_once 'config.php';
	require_once 'conexion.php';
	echo "$hostname $username $password $database";
	$base = new dbmysqli($hostname,$username,$password,$database);
	$mail = $_POST['mail'];
	$nombre = $_POST['name'];
	$usuario = $_POST['user'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	if ($pass1 == $pass2) 
	{
		$password = md5($pass1);
	}
	else
	{
		echo "Las contraseñas no coinciden";
		$password = md5($pass1);
	}
	$usuario = array("nombre"=>"$nombre", "username"=> "$usuario", "correo"=>"$mail" , "password"=> "$password", "tipo" => 2);
	$base -> insertaUsuario("usuario",$usuario);
	$_SESSION['username']=$usuario;
	$query="SELECT* FROM usuario WHERE correo = '$mail'";
	$result = $base->ExecuteQuery($query);
	if($result){
		if ($row=$base->GetRows($result)){
				$_SESSION['username']=$row[2];
				$_SESSION['id_usuario']=$row[0];
				echo ("<br>".$_SESSION['username']);
				echo ("<br>".$_SESSION['id_usuario']);
				header("Location:indexAdmin.php");
		}
		$base->SetFreeResult($result);
	}else{
		echo "<h3>Error generando la consulta</h3>";
	}
	$base -> CloseConnection();
?>