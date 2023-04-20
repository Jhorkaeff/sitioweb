<?php
session_start();
if (!isset($_SESSION['loggedin2'])) {
	header('Location: ../index.php');
	exit;
}
$i = $_SESSION['id'];

include("../../config/db.php");
include("../../template/CabaceraO.php");
$mysqli = new mysqli($servername, $username, $password, $db);
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}

$result = "SELECT Contraseña, Correo FROM profesor WHERE ID_Pr = '$i'";
$resp = $mysqli->query($result);

if ($resp->num_rows > 0){
    $row = $resp->fetch_assoc();
    $Contrap = $row['Contraseña'];
    $Correo = $row['Correo'];
}
?>
<style>
body{
    padding: 40px;
	padding-left:0px;
}
footer
{
    background-color: black;
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 40px;
    color: white;
}
</style>
		<div class="content">
			<h2>Perfil del usuario</h2>
			<div>
				<p>Destalles de tu cuenta son:</p>
				<table>
					<tr>
						<td>Nombre:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Contraseña:</td>
						<td><?=$Contrap?></td>
					</tr>
					<tr>
						<td>Correo:</td>
						<td><?=$Correo?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
	<?php include("../../template/PieO.php"); ?>
</html>