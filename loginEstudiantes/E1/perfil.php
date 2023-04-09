<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
}
$i = $_SESSION['id'];

include("../../config/db.php");
$mysqli = new mysqli($servername, $username, $password, $db);
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}

$result = "SELECT Contraseña, Correo FROM estudiante WHERE ID_E = '$i'";
$resp = $mysqli->query($result);

if ($resp->num_rows > 0){
    $row = $resp->fetch_assoc();
    $Contrap = $row['Contraseña'];
    $Correo = $row['Correo'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Sire QR </h1>
				<a href="casa.php"><i class="fas fa-user-circle"></i>Inicio</a>
				<a href="salir.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
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
</html>