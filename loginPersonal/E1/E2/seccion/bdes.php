<?php include ("../template/cabecera.php"); ?>
<?php include("../../../../config/db.php"); ?>

<?php
	$ID=(isset($_POST['ID']))?$_POST['ID']:"";
	$Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
	$Apellido=(isset($_POST['Apellido']))?$_POST['Apellido']:"";
	$Correo=(isset($_POST['Correo']))?$_POST['Correo']:"";
	$Contra=(isset($_POST['Contra']))?$_POST['Contra']:"";
	$Turno=(isset($_POST['Turno']))?$_POST['Turno']:"";
	$Carrera=(isset($_POST['Carrera']))?$_POST['Carrera']:"";
	$Cuatri=(isset($_POST['Cuatri']))?$_POST['Cuatri']:"";
	$Mod=(isset($_POST['Mod']))?$_POST['Mod']:"";
	$Tel=(isset($_POST['Tel']))?$_POST['Tel']:"";
	$accion=(isset($_POST['accion']))?$_POST['accion']:"";
	

	include("../../../../config/db.php");

		switch($accion){
			case "Agregar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$Foto = $_FILES["Imagen"]["tmp_name"];
				$Imagen = addslashes(file_get_contents($Foto));

				$result = "INSERT IGNORE INTO estudiante(ID_E, Nombre, Apellido, Correo, Contraseña, Turno, Carrera, Cuatrimestre, Modalidad, Telefono, Imagen) VALUES ('$ID', '$Nombre', '$Apellido', '$Correo', '$Contra', '$Turno', '$Carrera', '$Cuatri', '$Mod', '$Tel', '$Imagen');";
				$mysqli->query($result);

				header("Location:bdes.php");
				break;

			case "Modificar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "UPDATE estudiante SET Nombre = '$Nombre', Apellido = '$Apellido', Correo = '$Correo', Contraseña = '$Contra', Turno = '$Turno', Carrera = '$Carrera', Cuatrimestre = '$Cuatri', Modalidad = '$Mod', Telefono = '$Tel'  WHERE ID_E = '$ID'";
				$mysqli->query($result);
				
				if(!empty($_FILES["Imagen"]["tmp_name"])) {
					$Foto = $_FILES["Imagen"]["tmp_name"];
					$Imagen = addslashes(file_get_contents($Foto));

					$mysqli = new mysqli($servername, $username, $password, $db);
					$result = "UPDATE estudiante SET Imagen = '$Imagen' WHERE ID_E ='$ID'";
					$mysqli->query($result);
				}

				header("Location:bdes.php");
				break;

			case "Cancelar":
				header("Location:bdes.php");
				break;

			case "Seleccionar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "SELECT * FROM estudiante WHERE ID_E = '$ID'";
				$mm = $mysqli->query($result);
				$as = $mm->fetch_assoc();
				if(isset($as)){
						$Nombre = $as['Nombre'];
						$Imagen = $as['Imagen'];
						$Apellido = $as['Apellido'];
						$Correo = $as['Correo'];
						$Contra = $as['Contraseña'];
						$Turno = $as['Turno'];
						$Carrera = $as['Carrera'];
						$Cuatri = $as['Cuatrimestre'];
						$Mod = $as['Modalidad'];
						$Tel = $as['Telefono'];
				}
				break;

			case "Borrar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "DELETE FROM estudiante WHERE ID_E = '$ID'";
				$mysqli->query($result);

				header("Location:bdes.php");
				break;
		}
		$mysqli = new mysqli($servername, $username, $password, $db);
		$resuk = "SELECT * FROM estudiante, qr";
		$es = $mysqli->query($resuk);
		$es -> fetch_all(MYSQLI_ASSOC);

?>
<link rel="stylesheet" href="/sitioweb/CSS/css/bde.css">
<div class="col-md-5">
	<div class="card">
		<div class="card-header">
			Datos e informacion de la base de datos
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class="input-data">
					<input type="number" class="form-control" min="1000" pattern="[1-9]" value="<?php echo $ID; ?>" name="ID" id="ID" required oninvalid="this.setCustomValidity('Poner la matricula correspondiente del estudiante')">
					<div class="underline"></div>
					<label for="ID">Ingrese la ID:</label>
				</div><br><br>
				<div class="input-data">
					<input type="text" class="form-control" required value="<?php echo $Nombre; ?>" name="Nombre" id="Nombre">
					<div class="underline"></div>
					<label for="Nombre">Ingrese el nombre estudiante</label>
				</div><br><br>
				<div class="input-data">
					<input type="text" class="form-control" required value="<?php echo $Apellido; ?>" name="Apellido" id="Apellido">
					<div class="underline"></div>
					<label for="Apellido">Ingrese el apellido del estudiante</label>
				</div><br><br>
				<div class="input-data">
					<input type="email" class="form-control" required value="<?php echo $Correo; ?>" name="Correo" id="Correo">
					<div class="underline"></div>
					<label for="Correo">Ingrese el correo del estudiante</label>
				</div><br><br>
				<div class="input-data">
					<input type="text" class="form-control" required value="<?php echo $Contra; ?>" name="Contra" id="Contra">
					<div class="underline"></div>
					<label for="Contra">Ingrese la contraseña del estudiante</label>
				</div><br>
				<div class = "form-group">
					<label">Turno:</label>
					<select name="Turno">
						<?php if ($accion=="Seleccionar") { ?>
							<option value="<?php echo $Turno; ?>"><?php echo $Turno; ?></option>
							<option value="Matutino">Matutino</option>
							<option value="Vespertino">Vespertino</option>
						<?php }else{ ?>
							<option value="Matutino">Matutino</option>
							<option value="Vespertino">Vespertino</option>
						<?php } ?>
					</select>
				</div>
				<div class = "form-group">
					<label>Carrera:</label>
					<select name="Carrera">
						<?php if ($accion=="Seleccionar") { ?>
							<option value="<?php echo $Carrera; ?>"><?php echo $Carrera; ?></option>
							<option value="Sistema Computacionales">Sistemas Computacionales</option>
							<option value="Arquitectura">Arquitectura</option>
							<option value="Enfermeria">Enfermería</option>
							<option value="Pedagogia">Pedagogia</option>
							<option value="Contabilidad">Contabilidad</option>
							<option value="Administración">Administración</option>
							<option value="Administración de empresas turísticas">Administración de empresas turísticas</option>
							<option value="Criminologia">Criminologia</option>
							<option value="Marketing">Marketing</option>
							<option value="Nutrición">Nutrición</option>
						<?php }else{ ?>
							<option value="Sistema Computacionales">Sistemas Computacionales</option>
							<option value="Arquitectura">Arquitectura</option>
							<option value="Enfermeria">Enfermería</option>
							<option value="Pedagogia">Pedagogia</option>
							<option value="Contabilidad">Contabilidad</option>
							<option value="Administración">Administración</option>
							<option value="Administración de empresas turísticas">Administración de empresas turísticas</option>
							<option value="Criminologia">Criminologia</option>
							<option value="Marketing">Marketing</option>
							<option value="Nutrición">Nutrición</option>
						<?php } ?>
					</select>
				</div>
				<div class = "form-group">
					<label>Cuatrimestre:</label>
					<select name="Cuatri">
						<?php if ($accion=="Seleccionar") { ?>
							<option value="<?php echo $Cuatri; ?>"><?php echo $Cuatri; ?></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
						<?php }else{ ?>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
						<?php } ?>
						if ($accion=="Seleccionar") { ; ?>
					</select>
				</div>
				<div class = "form-group">
					<label>Modalidad:</label>
					<select name="Mod">
						<?php if ($accion=="Seleccionar") { ?>
							<option value="<?php echo $Mod; ?>"><?php echo $Mod; ?></option>
							<option value="Escolarizada">Escolarizada</option>
							<option value="Sabatina">Sabatina</option>
							<option value="Ejecutiva">Ejecutiva</option>
						<?php }else{ ?>
							<option value="Escolarizada">Escolarizada</option>
							<option value="Sabatina">Sabatina</option>
							<option value="Ejecutiva">Ejecutiva</option>
						<?php } ?>
					</select>				
				</div><br/><br/>
				<div class="input-data">
					<input type="text" class="form-control" required value="<?php echo $Tel; ?>" name="Tel" id="Tel">
					<div class="underline"></div>
					<label for="Tel">Ingrese el telefono del estudiante</label>
				</div>
				<div class = "form-group">
					<label for="Imagen">Subir foto de perfil: </label>
					<br/>
					<input type="file" class="form-control" id="Imagen" name="Imagen" multiple>
				</div>    
				<div class = "form-group">
					<button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value = "Agregar" class="btn btn-success"> Agregar </button>
					<button type="submit" name="accion" value = "Modificar" class="btn btn-warning"> Modificar </button>
					<button type="submit" name="accion" value = "Cancelar" class="btn btn-info"> Cancelar </button>
				</div>
			</form>
		</div>
		<div class="card-footer text-muted">
		</div>
    </div>
</div>
<div class="col-md+ -7">
	<table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Contraseña</th>
				<th>Turno</th>
				<th>Carrera</th>
				<th>Cuatrimestre</th>
				<th>Modalidad</th>
				<th>Telefono</th>
                <th>Fotos de perfil</th>
				<th>Imagen QR Entrada</th>
				<th>Imagen QR Salida</th>
				<th>Acciones</th>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($es as $as) { ?>
				<tr>
					<td><?php echo $as['ID_E']; ?></td>
					<td><?php echo $as['Nombre']; ?></td>
					<td><?php echo $as['Apellido']; ?></td>
					<td><?php echo $as['Correo']; ?></td>
					<td><?php echo $as['Contraseña']; ?></td>
					<td><?php echo $as['Turno']; ?></td>
					<td><?php echo $as['Carrera']; ?></td>
					<td><?php echo $as['Cuatrimestre']; ?></td>
					<td><?php echo $as['Modalidad']; ?></td>
					<td><?php echo $as['Telefono']; ?></td>
					<td>
						<?php echo '<img class="img-thumbnail rounded" src="data:image/png;base64,'.base64_encode($as['Imagen']).'" width="200" alt="Null" srcset="">'; ?>
					</td>
					<td>
						<?php echo '<img class="img-thumbnail rounded" src="data:image/png;base64,'.base64_encode($as['ImagenQRE']).'" width="200" alt="Null" srcset="">'; ?>
					</td>
					<td>
						<?php echo '<img class="img-thumbnail rounded" src="data:image/png;base64,'.base64_encode($as['ImagenQRS']).'" width="200" alt="Null" srcset="">'; ?>
					</td>
					<td>
						<form method="post">
							<input type="hidden" name="ID" id="ID" value="<?php echo $as['ID_E']; ?>"/>
							<input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
							<input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
						</form>
					</td>
			<?php } ?>
				</tr>
        </tbody>
    </table> 
</div>

<?php include ("../template/pie.php"); ?>