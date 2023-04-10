<?php include("template/Cabacera.php"); ?>
<?php 
	include('phpqrcode/qrlib.php');
	if(isset($_POST['generar'])){
		$ID=$_POST['ID'];
		
		$path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		$path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);  

		$urle = "$path/add.php?ID=$ID";
		QRcode::png($urle, 'temp/QRE.png' , QR_ECLEVEL_L, 10, 3);
		echo '<img src="temp/QRE.png"/>';

		$urls = "$path/rec.php?ID=$ID";
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
		$mysqli->close();

		$mysqli = new mysqli('localhost','root','','sire');
		$result = "SELECT Apellido FROM estudiante WHERE ID_E = '$ID'";
		$resu = $mysqli->query($result);
		if ($result) {
			if (mysqli_num_rows($resu)) {
				$row = mysqli_fetch_assoc($resu);
				$Apellido = $row["Apellido"];
			}
		}
		$mysqli->close();

		$filesw = 'temp/QRE.png';
		$newfile = 'temp/QRE1.png';

		if (!copy($filesw, $newfile)) {
			echo "failed to copy";
		}

		$ha = rename($newfile, "temp/QRE".$ID."_".$Nombre."_".$Apellido.".png");

		echo $ha;

		$filesw = 'temp/QRS.png';
		$newfile = 'temp/QRS1.png';

		if (!copy($filesw, $newfile)) {
			echo "failed to copy";
		}

		$he = rename($newfile, "temp/QRS".$ID."_".$Nombre."_".$Apellido.".png");
		
		echo $he;

		$imh = $ID."_".$Nombre."_".$Apellido.".png";
		echo $imh;

		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "sire";

		$conn = new mysqli($servername, $username, $password, $db);
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE qr SET NombreQR = '$imh', ImagenQRE = LOAD_FILE('C:/xampp/htdocs/codigo_qr/temp/QRE.png'),  ImagenQRS = LOAD_FILE('C:/xampp/htdocs/codigo_qr/temp/QRS.png') WHERE ID_Q = '$ID'";

		if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
		} else {
		echo "Error updating record: " . $conn->error;
		}
		$conn->close();

	}
?>
<?php include("template/Pie.php"); ?>