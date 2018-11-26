<?php 
	require_once 'config.php';
	class dbmysqli{
 		//declaramos una variable para conexión
		public $conexion;
		//Declaramos el constructor de la clase
		public function __construct($host, $usuario, $clave, $db){
			$this->conexion = new mysqli($host, $usuario, $clave,$db);
			if($this->conexion->connect_errno) {
				die("Error al conectarse a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error);
			}
		}
		//funcion para crear tablas
		public function creartabla($sql){
			if ($this->conexion->query($sql) === TRUE) {
				echo "Se ha creado una tabla";
			} else {
				echo "Fallo:no se ha creado la tabla ".$this->conexion->error;
			}
		}
		//Guardar nuevos datos en la base de datos
		//$clientes = array("nombre"=>'Carlos Moira', “nombre”=> 'Jose Triana', “nombre”=>'Julia Ordoñez' , “nombre”=> 'Carla Angelez' );
		//$conectadb ->insertar(“clientes”,$clientes) ;

		public function insertar($tabla, $camposdatos){
			//separamos los datos por si son varios
			$campo = implode(", ", array_keys($camposdatos));
			$i=0;
			foreach($camposdatos as $indice=>$valor) {
				$dato[$i] = "'".$valor."'";
				$i++;
			}
			$datos = implode(", ",$dato);
			//Insertamos los valores en cada campo
			//echo "INSERT INTO $tabla ($campo) VALUES ($datos)";
			//var_dump($datos);
			if($this->conexion->query("INSERT INTO $tabla ($campo) VALUES ($datos)") === TRUE){
				echo "<br>Nueva entrada agregada";
			}else{
				echo "Error al insertar los datos ".$this->conexion->error;
			}
		}
		public function insertaUsuario($tabla, $camposdatos){
			$campo = implode(", ", array_keys($camposdatos));
			$i=0;
			foreach($camposdatos as $indice=>$valor) {
				$dato[$i] = "'".$valor."'";
				$i++;
			}
			$datos = implode(", ",$dato);
			//Insertamos los valores en cada campo
			echo "INSERT INTO $tabla ($campo) VALUES ($datos)";
			var_dump($datos);
			if($this->conexion->query("INSERT INTO $tabla ($campo) VALUES ($datos)") === TRUE){
				echo "Nueva entrada agregada";
			}else{
				echo "Error al insertar los datos ".$this->conexion->error;
			}
		}
		//Borrar datos  de la base de datos
		//Ejemplo
		//$clientesborrar = array("idcliente"=>1,”idcliente”=>50, “idcliente”=>8 , “idcliente”=> 104);
		//$conectadb ->borrar(“clientes”,$clientesborrar) ;
		public function borrar($tabla, $camposdatos,$ruta){
			$i=0;
			foreach($camposdatos as $indice=>$valor) {
				$field = $indice;
				$dato[$i] = "'".$valor."'";
				$i++;
			}
			$campoydato = implode($field." AND ",$dato);
			echo "DELETE FROM $tabla WHERE $field = $campoydato";
			if($this->conexion->query("DELETE FROM $tabla WHERE $field = $campoydato") === TRUE){
				if(mysqli_affected_rows($this->conexion)){
					echo "<script>alert('Evento eliminado correctamente');</script>";
					echo "Borrado correctamente";
				} else{
					echo "Fallo no se pudo eliminar el registro" . $this->conexion->error;
				}
				echo "<script>window.location='$ruta';</script>";
			}else{
				echo "Nosepudo borrar". $this->conexion->error;
			}
		}
		//$clientesset = array("nombre"=>'Carlos Juan Dolfo', “nombre”=> 'Pedro Dorien Triana', “nombre”=>'Enrique Ordoñez' , “nombre”=> 'Carla Dolores Angeles' );
		
		//$clienteswhere= array("idcliente"=>1,”idcliente”=>2, “idcliente”=>5 , “idcliente”=> 10);

		//$conectadb->Actualizar(“clientes”,$clientesset,$clienteswhere);

		public function Actualizar($tabla, $camposset, $camposcondicion){
			//separamos los valores SET a modificar
			$i=0;
			foreach($camposset as $indice=>$dato) {
				$datoset[$i] = $indice." = '".$dato."'";
				$i++;
			}
			$consultaset = implode(", ",$datoset);
			$i=0;
			foreach($camposcondicion as $indice=>$datocondicion) {
				$condicion[$i] = $indice." = '".$datocondicion."'";
				$i++;
			}
			$consultacondicion = implode(" AND ",$condicion);
			//Actualización de registros
			if($this->conexion->query("UPDATE $tabla SET $consultaset WHERE $consultacondicion") === TRUE){
				if(mysqli_affected_rows($this->conexion)){
					echo "Registro actualizado";
				}else {
						echo "Fallo no se pudo eliminar el registro".$this->conexion->error;
				}
			}
		}
		public function GetRows($result){
		//Metodo que retorna la ultima fila de un resultado en forma de arreglo.
			return $result->fetch_row();
		}
		public function SetFreeResult($result){
		//Metodo que libera el resultado del query.
			$result->free_result();
		}
		public function ExecuteQuery($sql){
		//Metodo que ejecuta un query sql Retorna un resultado si es un SELECT
			$result = $this->conexion->query($sql);
			return $result;
		}
		public function CloseConnection(){
		//Metodo que cierra la conexion a la BD
			$this->conexion->close();
		}
	}
?>