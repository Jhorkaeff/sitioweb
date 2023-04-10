<?php include ("../template/cabecera.php"); ?>
<?php include("../../../../config/db.php"); ?>
<div>
	<div>
		<h1>
			Datos e informacion de la base de datos
		</h1>
	</div>
	<div>
		<form method="POST" enctype="multipart/form-data">
			<div>
				<label for="ID">ID:</label>
				<input type="number" min="1" pattern="[1-9]" name="ID" id="ID" placeholder="Ingrese la ID" required>
			</div>
			<div>
				<label for="Nombre">Nombre:</label>
				<input type="text" required name="Nombre" id="Nombre" placeholder="Ingrese el nombre del estudiante">
			</div>
			<div>
				<label for="Nombre">Subir foto de perfil: </label>
				<br/>
				<input type="file" class="form-control" id="Image" name="Image" multiple>
			</div>    
			<div>
				<button type="submit" name="accion" value = "Agregar" class="btn btn-success"> Agregar </button>
				<button type="submit" name="accion" value = "Modificar" class="btn btn-warning"> Modificar </button>
				<button type="submit" name="accion" value = "Cancelar" class="btn btn-info"> Cancelar </button>
			</div>
		</form>
    </div>
</div>
<div>
	<table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagenes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
			<?php
			$mysqli = new mysqli($servername, $username, $password, $db);
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}
				$resultpt = "SELECT * FROM estudiante";
				$sql = $mysqli->query ($resultpt);
			?>
			<?php foreach ($sql as $es) { ?>
				<tr>
					<td><?php echo $es['ID_E']; ?></td>
					<td><?php echo $es['Nombre']; ?></td>
					<td>
						<?php echo '<img src="data:image/png;base64,'.base64_encode($es['Imagen']).'"/>'; ?>
					</td>
					<td>
						<form method="post">
							<input type="hidden" name="txtID" id="txtID" value="<?php echo $es['ID_E']; ?>" />
							<input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
							<input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
						</form>
					</td>
				</tr>
			<?php } ?>
        </tbody>
    </table> 
</div>
<?php
if (isset($_POST['accion'])){
	$ID=(isset($_POST['ID']))?$_POST['ID']:"";
	$Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
	$txtID = isset($_POST['txtID']);

		switch($_POST["accion"]){
			case "Agregar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}

				$result = "INSERT IGNORE INTO estudiante(ID_E, Nombre, Imagen) VALUES ('$ID', '$Nombre', '$img');";
				if ($mysqli->query($result) === TRUE) {
					echo "<h4 class='tex'>Registro insertado con éxito</h4>";
				} else {
					echo "<h4 class='tex'>Error al insertar registro: </h4>" . $mysqli->error;
				}
				$mysqli->close();

				break;

			case "Modificar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}
				$result = "UPDATE estudiantes SET nombre = $Nombre WHERE ID_E= $ID";
				$sentenciaSQL->bindParam(':nombre',$txtNombre);       
				$sentenciaSQL->bindParam(':id',$txtID);  
				$sentenciaSQL->execute();
				
				if($txtImagen!=""){

					$fecha= new DateTime();
					$nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
					$tmpImagen=$_FILES["txtImagen"]["tmp_name"];

					move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

					$sentenciaSQL= $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
					$sentenciaSQL->bindParam(':id',$txtID);
					$sentenciaSQL->execute();
					$libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

					if(isset($libro["imagen"])&&($libro["imagen"]!="imagen.jpg") ){
						if(file_exists("../../img/".$libro["imagen"])){
							unlink("../../img/".$libro["imagen"]);
						}
	
					}					
					$sentenciaSQL= $conexion->prepare("UPDATE libros SET imagen=:imagen WHERE id=:id");
					$sentenciaSQL->bindParam(':imagen',$nombreArchivo); 
					$sentenciaSQL->bindParam(':id',$txtID);        
					$sentenciaSQL->execute();
				}
				header("Location:productos.php");
				break;

			case "Cancelar":
				header("Location:productos.php");
				break;

			case "Seleccionar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}
				$result = "SELECT * FROM estudiante WHERE ID_E = '$txtID'";
				$resud = $mysqli->query($result);
				if ($result) {
					if (mysqli_num_rows($resud)) {
						$row = mysqli_fetch_assoc($resud);
						$Nombre = $row["Apellido"];
						$Imagen = $row['imagen'];
					}
				}
				break;

			case "Borrar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}
				$result = "DELETE FROM estudiante WHERE ID_E = '$txtID'";
				$mysqli->query($result);
				break;
		}

}

?>

<?php include ("../template/pie.php"); ?>

<?php include ("../template/cabecera.php"); ?>
<div class="col-md-5">
	<div class="card">
        <div class="card-header">
            Datos e informacion de la base de datos
        </div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<div class = "form-group">
					<label for="txtID">ID:</label>
					<input type="text" required class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
				</div>
				<div class = "form-group">
					<label for="txtNombre">Nombre:</label>
					<input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del libro">
				</div>
				<div class = "form-group">
					<label for="txtNombre">Subir imagen: </label>
					<br/> 
					<?php if($txtImagen!=""){ ?>
						<img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="50" alt="" srcset="">
					<?php } ?>
					<input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre del libro">
				</div>    
				<div class="btn-group" role="group" aria-label="">
					<button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
					<button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
					<button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
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
                <th>id</th>
                <th>nombre</th>
                <th>imagenes</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($listaLibros as $libro) { ?>
			<tr>
				<td><?php echo $libro['id']; ?></td>
				<td><?php echo $libro['nombre']; ?></td>
				<td>
					<img class="img-thumbnail rounded" src="../../img/<?php echo $libro['imagen']; ?>" width="50" alt="" srcset="">
				</td>
				<td>
					<form method="post">
						<input type="hidden" name="txtID" id="txtID" value="<?php echo $libro['id']; ?>" />
						<input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
						<input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
					</form>
				</td>
			</tr>
			<?php } ?>
        </tbody>
    </table>
    
</div>
<?php

	$ID=(isset($_POST['txtID']))?$_POST['txtID']:"";
	$Nombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
	$Imagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
	$accion=(isset($_POST['accion']))?$_POST['accion']:"";


	include("../../../../config/db.php");

		switch($accion){
			case "Agregar":
				$mysqli = new mysqli($servername, $username, $password, $db);
				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}

				$tmpImagen=$_FILES["txtImagen"]["tmp_name"];

				$result = "INSERT INTO estudiantes(Nombre, Imagen) VALUES ($Nombre, $Imagen);";
				if ($mysqli->query($result) === TRUE) {
					echo "<h4 class='tex'>Registro insertado con éxito</h4>";
				} else {
					echo "<h4 class='tex'>Error al insertar registro: </h4>" . $mysqli->error;
				}
				$mysqli->close();

				header("Location:productos.php");
				break;

			case "Modificar":

				$sentenciaSQL= $conexion->prepare("UPDATE libros SET nombre=:nombre WHERE id=:id");
				$sentenciaSQL->bindParam(':nombre',$txtNombre);       
				$sentenciaSQL->bindParam(':id',$txtID);  
				$sentenciaSQL->execute();
				
				if($txtImagen!=""){

					$fecha= new DateTime();
					$nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
					$tmpImagen=$_FILES["txtImagen"]["tmp_name"];

					move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

					$sentenciaSQL= $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
					$sentenciaSQL->bindParam(':id',$txtID);
					$sentenciaSQL->execute();
					$libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

					if(isset($libro["imagen"])&&($libro["imagen"]!="imagen.jpg") ){
						if(file_exists("../../img/".$libro["imagen"])){
							unlink("../../img/".$libro["imagen"]);
						}
	
					}					
					$sentenciaSQL= $conexion->prepare("UPDATE libros SET imagen=:imagen WHERE id=:id");
					$sentenciaSQL->bindParam(':imagen',$nombreArchivo); 
					$sentenciaSQL->bindParam(':id',$txtID);        
					$sentenciaSQL->execute();
				}
				header("Location:productos.php");
				break;

			case "Cancelar":
				header("Location:productos.php");
				break;

			case "Seleccionar":

				$sentenciaSQL= $conexion->prepare("SELECT * FROM libros WHERE id=:id");
				$sentenciaSQL->bindParam(':id',$txtID);
				$sentenciaSQL->execute();
				$libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
				$txtNombre=$libro['nombre'];
				$txtImagen=$libro['imagen'];
				break;

			case "Borrar":

				$sentenciaSQL= $conexion->prepare("SELECT imagen FROM libros WHERE id=:id");
				$sentenciaSQL->bindParam(':id',$txtID);
				$sentenciaSQL->execute();
				$libro=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

				if (isset($libro["imagen"]) && ($libro["imagen"]!="imagen.jpg") ){
				
					if(file_exists("../../img/".$libro["imagen"])){

						unlink("../../img/".$libro["imagen"]);
					}

				}
				$sentenciaSQL= $conexion->prepare("DELETE FROM libros WHERE id=:id");
				$sentenciaSQL->bindParam(':id',$txtID);
				$sentenciaSQL->execute();
				header("Location:productos.php");
				break;
		}

	$sentenciaSQL= $conexion->prepare("SELECT * FROM libros");
	$sentenciaSQL->execute();
	$listaLibros=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include ("../template/pie.php"); ?>