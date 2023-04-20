<?php include("../../../../config/db.php"); ?>
<?php
session_start();
if (!isset($_SESSION['loggedin1'])) {
	header('Location: ../index.php');
	exit;
}

	$ID=(isset($_POST['ID']))?$_POST['ID']:"";
	$Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
	$Apellido=(isset($_POST['Apellido']))?$_POST['Apellido']:"";
	$Correo=(isset($_POST['Correo']))?$_POST['Correo']:"";
	$Contra=(isset($_POST['Contra']))?$_POST['Contra']:"";
	$Turno=(isset($_POST['Turno']))?$_POST['Turno']:"";
	$Puesto=(isset($_POST['Puesto']))?$_POST['Puesto']:"";
	$Departamento=(isset($_POST['Departamento']))?$_POST['Departamento']:"";
	$Tel=(isset($_POST['Tel']))?$_POST['Tel']:"";
	$accion=(isset($_POST['accion']))?$_POST['accion']:"";
	

	include("../../../../config/db.php");

		switch($accion){
			case "Agregar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$Foto = $_FILES["Imagen"]["tmp_name"];
				$Imagen = addslashes(file_get_contents($Foto));

				$result = "INSERT IGNORE INTO personal(ID_P, Nombre, Apellido, Correo, Contraseña, Turno, Puesto, Departamento, Telefono, Imagen) VALUES ('$ID', '$Nombre', '$Apellido', '$Correo', '$Contra', '$Turno', '$Puesto', '$Departamento', '$Tel', '$Imagen');";
				$mysqli->query($result);

				header("Location:bdpe.php");
				break;

			case "Modificar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "UPDATE personal SET Nombre = '$Nombre', Apellido = '$Apellido', Correo = '$Correo', Contraseña = '$Contra', Turno = '$Turno', Puesto = '$Puesto', Departamento = '$Departamento', Telefono = '$Tel'  WHERE ID_P = '$ID'";
				$mysqli->query($result);
				
				if(!empty($_FILES["Imagen"]["tmp_name"])) {
					$Foto = $_FILES["Imagen"]["tmp_name"];
					$Imagen = addslashes(file_get_contents($Foto));

					$mysqli = new mysqli($servername, $username, $password, $db);
					$result = "UPDATE personal SET Imagen = '$Imagen' WHERE ID_P ='$ID'";
					$mysqli->query($result);
				}

				header("Location:bdpe.php");
				break;

			case "Cancelar":
				header("Location:bdpe.php");
				break;

			case "Seleccionar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "SELECT * FROM personal WHERE ID_P = '$ID'";
				$mm = $mysqli->query($result);
				$as = $mm->fetch_assoc();
				if(isset($as)){
						$Nombre = $as['Nombre'];
						$Imagen = $as['Imagen'];
						$Apellido = $as['Apellido'];
						$Correo = $as['Correo'];
						$Contra = $as['Contraseña'];
						$Turno = $as['Turno'];
						$Carrera = $as['Puesto'];
						$Cuatri = $as['Departamento'];
						$Tel = $as['Telefono'];
				}
				break;

			case "Borrar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				$result = "DELETE FROM personal WHERE ID_P = '$ID'";
				$mysqli->query($result);

				header("Location:bdpe.php");
				break;
		}
		$mysqli = new mysqli($servername, $username, $password, $db);
		$resuk = "SELECT * FROM personal";
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
						<label for="Nombre">Ingrese el nombre personal</label>
					</div><br><br>
					<div class="input-data">
						<input type="text" class="form-control" required value="<?php echo $Apellido; ?>" name="Apellido" id="Apellido">
						<div class="underline"></div>
						<label for="Apellido">Ingrese el apellido del personal</label>
					</div><br><br>
					<div class="input-data">
						<input type="email" class="form-control" required value="<?php echo $Correo; ?>" name="Correo" id="Correo">
						<div class="underline"></div>
						<label for="Correo">Ingrese el correo del personal</label>
					</div><br><br>
					<div class="input-data">
						<input type="text" class="form-control" required value="<?php echo $Contra; ?>" name="Contra" id="Contra">
						<div class="underline"></div>
						<label for="Contra">Ingrese la contraseña del personal</label>
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
						<label>Puesto:</label>
						<select name="Puesto">
							<?php if ($accion=="Seleccionar") { ?>
								<option value="<?php echo $Puesto; ?>"><?php echo $Puesto; ?></option>
								<option value="Coordinador">Coordinador</option>
								<option value="Cafeteria">Cafeteria</option>
								<option value="Seguridad">Seguridad</option>
								<option value="Conserje">Conserje</option>
							<?php }else{ ?>
								<option value="Coordinador">Coordinador</option>
								<option value="Cafeteria">Cafeteria</option>
								<option value="Seguridad">Seguridad</option>
								<option value="Conserje">Conserje</option>
							<?php } ?>
						</select>
					</div>
					<div class = "form-group">
						<label>Departamento:</label>
						<select name="Departamento">
							<?php if ($accion=="Seleccionar") { ?>
								<option value="<?php echo $Departamento; ?>"><?php echo $Departamento; ?></option>
								<option value="Sistemas computacionales">Sistemas computacionales</option>
								<option value="Seguridad">Seguridad</option>
								<option value="Cafeteria">Cafeteria</option>
							<?php }else{ ?>
								<option value="Sistemas computacionales">Sistemas computacionales</option>
								<option value="Seguridad">Seguridad</option>
								<option value="Cafeteria">Cafeteria</option>
							<?php } ?>
							if ($accion=="Seleccionar") { ; ?>
						</select>
					</div><br/>
					<div class="input-data">
						<input type="text" class="form-control" required value="<?php echo $Tel; ?>" name="Tel" id="Tel">
						<div class="underline"></div>
						<label for="Tel">Ingrese el telefono del personal</label>
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
					<th>Puesto</th>
					<th>Departamento</th>
					<th>Telefono</th>
					<th>Imagenes</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($es as $as) { ?>
					<tr>
						<td><?php echo $as['ID_P']; ?></td>
						<td><?php echo $as['Nombre']; ?></td>
						<td><?php echo $as['Apellido']; ?></td>
						<td><?php echo $as['Correo']; ?></td>
						<td><?php echo $as['Contraseña']; ?></td>
						<td><?php echo $as['Turno']; ?></td>
						<td><?php echo $as['Puesto']; ?></td>
						<td><?php echo $as['Departamento']; ?></td>
						<td><?php echo $as['Telefono']; ?></td>
						<td>
							<?php echo '<img class="img-thumbnail rounded" src="data:image/png;base64,'.base64_encode($as['Imagen']).'" width="200" alt="Null" srcset="">'; ?>
						</td>
						<td>
							<form method="post">
								<input type="hidden" name="ID" id="ID" value="<?php echo $as['ID_P']; ?>"/>
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