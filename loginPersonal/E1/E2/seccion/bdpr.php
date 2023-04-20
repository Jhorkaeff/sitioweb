<?php include("../../../../config/db.php"); ?>

<?php
	$ID=(isset($_POST['ID']))?$_POST['ID']:"";
	$Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
	$Apellido=(isset($_POST['Apellido']))?$_POST['Apellido']:"";
	$Correo=(isset($_POST['Correo']))?$_POST['Correo']:"";
	$Contra=(isset($_POST['Contra']))?$_POST['Contra']:"";
	$Curso=(isset($_POST['Curso']))?$_POST['Curso']:"";
	$Tel=(isset($_POST['Tel']))?$_POST['Tel']:"";
	$accion=(isset($_POST['accion']))?$_POST['accion']:"";
	

	include("../../../../config/db.php");

		switch($accion){
			case "Agregar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$Foto = $_FILES["Imagen"]["tmp_name"];
				$Imagen = addslashes(file_get_contents($Foto));

				$result = "INSERT IGNORE INTO profesor(ID_Pr, Nombre, Apellido, Correo, Contraseña, Curso, Telefono, Imagen) VALUES ('$ID', '$Nombre', '$Apellido', '$Correo', '$Contra', '$Curso', '$Tel', '$Imagen');";
				$mysqli->query($result);

				header("Location:bdpr.php");
				break;

			case "Modificar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "UPDATE profesor SET Nombre = '$Nombre', Apellido = '$Apellido', Correo = '$Correo', Contraseña = '$Contra', Curso = '$Curso', Telefono = '$Tel'  WHERE ID_Pr = '$ID'";
				$mysqli->query($result);
				
				if(!empty($_FILES["Imagen"]["tmp_name"])) {
					$Foto = $_FILES["Imagen"]["tmp_name"];
					$Imagen = addslashes(file_get_contents($Foto));

					$mysqli = new mysqli($servername, $username, $password, $db);
					$result = "UPDATE profesor SET Imagen = '$Imagen' WHERE ID_Pr ='$ID'";
					$mysqli->query($result);
				}

				header("Location:bdpr.php");
				break;

			case "Cancelar":
				header("Location:bdpr.php");
				break;

			case "Seleccionar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "SELECT * FROM profesor WHERE ID_Pr = '$ID'";
				$mm = $mysqli->query($result);
				$as = $mm->fetch_assoc();
				if(isset($as)){
						$Nombre = $as['Nombre'];
						$Imagen = $as['Imagen'];
						$Apellido = $as['Apellido'];
						$Curso = $as['Curso'];
						$Correo = $as['Correo'];
						$Contra = $as['Contraseña'];
						$Tel = $as['Telefono'];
				}
				break;

			case "Borrar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "DELETE FROM profesor WHERE ID_Pr = '$ID'";
				$mysqli->query($result);

				header("Location:bdpr.php");
				break;
		}
		$mysqli = new mysqli($servername, $username, $password, $db);
		$resuk = "SELECT * FROM profesor";
		$es = $mysqli->query($resuk);
		$es -> fetch_all(MYSQLI_ASSOC);
?>

<?php include ('../../../../template/CabaceraE.php'); ?>
<style>
	body{
		padding: 140px;
		padding-left:0px;
	}
</style>
<body>
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
						<label for="Nombre">Ingrese el nombre profesor</label>
					</div><br><br>
					<div class="input-data">
						<input type="text" class="form-control" required value="<?php echo $Apellido; ?>" name="Apellido" id="Apellido">
						<div class="underline"></div>
						<label for="Apellido">Ingrese el apellido del profesor</label>
					</div><br><br>
					<div class="input-data">
						<input type="email" class="form-control" required value="<?php echo $Correo; ?>" name="Correo" id="Correo">
						<div class="underline"></div>
						<label for="Correo">Ingrese el correo del profesor</label>
					</div><br><br>
					<div class="input-data">
						<input type="text" class="form-control" required value="<?php echo $Contra; ?>" name="Contra" id="Contra">
						<div class="underline"></div>
						<label for="Contra">Ingrese la contraseña del profesor</label>
					</div><br>
					<div class = "form-group">
					<div class="input-data">
						<input type="text" class="form-control" required value="<?php echo $Curso; ?>" name="Curso" id="Curso">
						<div class="underline"></div>
						<label for="Curso">Curso:</label>
					</div><br>
					<div class="input-data">
						<input type="text" class="form-control" required value="<?php echo $Tel; ?>" name="Tel" id="Tel">
						<div class="underline"></div>
						<label for="Tel" >Ingrese el telefono del profesor</label>
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
					<th>Curso</th>
					<th>Telefono</th>
					<th>Imagenes</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($es as $as) { ?>
					<tr>
						<td><?php echo $as['ID_Pr']; ?></td>
						<td><?php echo $as['Nombre']; ?></td>
						<td><?php echo $as['Apellido']; ?></td>
						<td><?php echo $as['Correo']; ?></td>
						<td><?php echo $as['Contraseña']; ?></td>
						<td><?php echo $as['Curso']; ?></td>
						<td><?php echo $as['Telefono']; ?></td>
						<td>
							<?php echo '<img class="img-thumbnail rounded" src="data:image/png;base64,'.base64_encode($as['Imagen']).'" width="200" alt="Null" srcset="">'; ?>
						</td>
						<td>
							<form method="post">
								<input type="hidden" name="ID" id="ID" value="<?php echo $as['ID_Pr']; ?>"/>
								<input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
								<input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
							</form>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table> 
	</div>
</body>

<?php include ("../../../../template/pieU.php"); ?>