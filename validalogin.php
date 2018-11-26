<?php
	session_start();
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];

	require_once 'config.php';
	require_once 'conexion.php';
	
	$base = new dbmysqli($hostname,$username,$password,$database);
	$usuariobuscar = array("correo","$mail");
	$query="SELECT* FROM usuario WHERE correo = '$mail'";
	$result = $base->ExecuteQuery($query);
	if($result)
	{
		if ($row=$base->GetRows($result))
		{
			echo "El usario esta registrado\n<br>";

			if (md5($pass) == $row[4]) 
			{
				$_SESSION['username']=$row[2];
				$_SESSION['id_usuario']=$row[0];
				var_dump($row);
				$_SESSION['tipo']=$row[5];
				//SI TIPO ES 1 ES USUARIO NORMAL 
				//Si es 2 es administrador
				echo ("<br>".$_SESSION['username']);
				echo ("<br>".$_SESSION['id_usuario']);
				echo ("<br>".$_SESSION['tipo']);
				echo "Las contraseñas coinciden";
				if($row[5]==2)
				{
					header("Location:indexAdmin.php");
				}
				if($row[5]==1)
				{
					header("Location:indexU.php");
				}
				
			}
			else
			{
				echo "Contraseña incorrecta";
				header("Location:indexerror.php");
			}
		}
		$base->SetFreeResult($result);
	}
	else
	{
		echo "<h3>Error generando la consulta</h3>";
	}
?>