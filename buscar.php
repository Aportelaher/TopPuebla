<?php
      $buscar = $_POST['b'];
      if(!empty($buscar)) {
            buscar($buscar);
      }
      function buscar($b) {
            require_once 'config.php';
            require_once 'conexion.php';
            $base = new dbmysqli($hostname,$username,$password,$database);
            
            $sql = "SELECT * FROM ingrediente WHERE nombre LIKE '%".$b."%'";
            $result = $base->ExecuteQuery($sql);
            if($result){
                  ?>
                  <ol class="list-group text-ingredientes scroll2">
                  <?php
                  /*echo "<ol class='simple_with_animation list-group text-ingredientes scroll2'>";*/
                  while ($row=$base->GetRows($result)){
                        $nombre = $row['2'];
                        $id = $row['1'];
                        ?>
                        <li class="list-group-item" id="<?php echo $nombre ?>" onclick="agregar(<?php echo "'$nombre'" ?>)"><?php echo "$nombre"?>
                        <?php
                  }
                  ?>
                  </ol><br>
                  <?php
                  /*echo "</ol><br>";*/
                  $base->SetFreeResult($result);
            }else{
                  echo "<h3>Error generando la consulta</h3>";
            }
            $base -> CloseConnection();
            /*$contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($row=mysql_fetch_array($sql)){
                        $nombre = $row['nombre'];
                        $id = $row['id'];
                         
                        echo $id." - ".$nombre."<br /><br />";    
                  }
            }*/
      }
       
?>