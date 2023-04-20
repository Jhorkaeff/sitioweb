<?php include("../../../../template/CabaceraR.php"); ?>
<link rel="stylesheet" href="../../../../CSS/css/Cargar.css">
		<div class="fondo-animado">	
		<section class="main">
			<form action="CrearE.php" method="post" enctype="multipart/form-data">
				<div class = "contenidou">
					<h3>Crear QR</h3>
					<h4>IMPORTANTE: <span><font color="white">Agregue los datos del estudiante</font></span></h4>
					<li>Calidad H de imagen: <span><font color="white">se le dara la mas alta calidad posible a las imagenes qr</font></span></li>
					<li>Tamaño 10: <span><font color="white">Calidad H de imagen: el tamaño proporcional que se le dara a las qr</font></span></li>
					<div class="form-group">
						<label>ID: </label>
						<select name="ID">
							<option value="1">Selecciona la ID:</option>
							<?php
							$mysqli = new mysqli('localhost','root','','sire');
							$query = "SELECT ID_E FROM estudiante";
							$resu = $mysqli->query($query);
							if($resu != false){
								$sql = "SELECT ID_E FROM estudiante";
							}else{
								echo 'La consulta a ocurrido un error';
							}
							for($i=0; $i < $resu->num_rows; $i++){
								$fila_usuario = $resu->fetch_assoc();
								echo '<option>'.$fila_usuario['ID_E'].'</option>';
							}
							$mysqli->close();
							?>
						</select>
					</div>
					<div class="form-group">
						<label>QR de: </label>
						<select name="qrd">
							<option value="1">Seleccione cual QR quiere cargar</option>
							<option value="entrada">Entrada</option>
							<option value="salida">Salida</option>
						</select>
					</div>
					<button type="submit" value="Generar" name="generar">Guardar</button>
				</div>
			</form>
		</section>
		</div>
		<?php
		include('phpqrcode/qrlib.php');
		if(isset($_POST['generar'])){
			$ID=$_POST['ID'];

			$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
			$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);

			switch($_POST['qrd']){
				case "entrada":
					$urle = "../../mostrar/entradaE.php?ID=$ID";
					QRcode::png($urle, 'temp/QRE.png' , QR_ECLEVEL_L, 10, 3);
					echo '<img src="temp/QRE.png"/>';

					$mysqli = new mysqli('localhost','root','','sire');
					$result = "SELECT Nombre FROM estudiante WHERE ID_E = '$ID'";
					$resu = $mysqli->query($result);
					if ($result) {
						if (mysqli_num_rows($resu)) {
							$row = mysqli_fetch_assoc($resu);
							$Nombre = $row["Nombre"];
						}
					}
		
					$resultp = "SELECT Apellido FROM estudiante WHERE ID_E = '$ID'";
					$resud = $mysqli->query($resultp);
					if ($resultp) {
						if (mysqli_num_rows($resud)) {
							$row = mysqli_fetch_assoc($resud);
							$Apellido = $row["Apellido"];
						}
					}
		
					$imh = $ID."_".$Nombre."_".$Apellido.".png";

					$sql = "INSERT IGNORE INTO qr (ID_Q, NombreQR, ImagenQRE) VALUES ('$ID', '$imh', LOAD_FILE('C:/xampp/htdocs/sitioweb/loginPersonal/E1/E2/codigo_qr/temp/QRE.png'))";
					$mysqli->query($sql);
					$mysqli->close();
					break;

				case "salida":
					$urls = "../../mostrar/salidaE.php?ID=$ID";
					QRcode::png($urls, 'temp/QRS.png' , QR_ECLEVEL_L, 10, 3);
					echo '<img src="temp/QRS.png"/>';

					$mysqli = new mysqli('localhost','root','','sire');
					$result = "SELECT Nombre FROM estudiante WHERE ID_E = '$ID'";
					$resu = $mysqli->query($result);
					if ($result) {
						if (mysqli_num_rows($resu)) {
							$row = mysqli_fetch_assoc($resu);
							$Nombre = $row["Nombre"];
						}
					}
		
					$resultp = "SELECT Apellido FROM estudiante WHERE ID_E = '$ID'";
					$resud = $mysqli->query($resultp);
					if ($resultp) {
						if (mysqli_num_rows($resud)) {
							$row = mysqli_fetch_assoc($resud);
							$Apellido = $row["Apellido"];
						}
					}
		
					$imh = $ID."_".$Nombre."_".$Apellido.".png";

					$sql = "INSERT IGNORE INTO qr (ID_Q, NombreQR, ImagenQRS) VALUES ('$ID', '$imh', LOAD_FILE('C:/xampp/htdocs/sitioweb/loginPersonal/E1/E2/codigo_qr/temp/QRS.png'))";
					$mysqli->query($sql);
					$mysqli->close();
					break;
			}
		}
		?>
		<?php include("../../../../template/PieA.php"); ?> 
	</body>
</html>