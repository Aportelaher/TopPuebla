<form method="POST" action="validadReceta.php">
	<table>
		<tr>
			<th>Ingredientes</th>
			<th>Gramaje</th>
			<th>Unidad</th>
		</tr>
		<tr>
			<td><input type="text" name="ingrediente1" placeholder="Nombre"></td>
			<td><input type="text" name="ingrediente1" placeholder="gramaje"></td>
			<td>
				<select name="select">
  					<option value="value1">Kilogramos (kg)</option> 
  					<option value="value2">Value 2</option>
  					<option value="value3">Value 3</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="text" name="ingrediente1" placeholder="Nombre"></td>
			<td><input type="text" name="ingrediente1" placeholder="gramaje"></td>
			<td>
				<select name="select">
  					<option value="value1">Kilogramos (kg)</option> 
  					<option value="value2">Value 2</option>
  					<option value="value3">Value 3</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="text" name="ingrediente1" placeholder="Nombre"></td>
			<td><input type="text" name="ingrediente1" placeholder="gramaje"></td>
			<td>
				<select name="select">
  					<option value="value1">Kilogramos (kg)</option> 
  					<option value="value2">Value 2</option>
  					<option value="value3">Value 3</option>
				</select>
			</td>
		</tr>

	</table>
	Ingedientes<br>
	
	<textarea name="preparacion" rows="10" cols="50" placeholder="Modo de preparación"></textarea><br>
	<textarea name="comentario" rows="10" cols="50" placeholder="Comentario"></textarea><br>
	

	<input type="submit" name="enviar" value="Enviar">
</form>