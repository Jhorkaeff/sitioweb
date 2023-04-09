<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.html');
	exit;
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
				<h1>Sire QR</h1>
				<a href="perfil.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="salir.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a href="QRE.php"><i class="fas fa-sign-out-alt"></i>Mi QR</a>
				<a href="QRS.php"><i class="fas fa-sign-out-alt"></i>Mi QR</a>
				<a href="E2/inicio.php"><i></i>Inicio</a>
			</div>
		</nav>
		<div class="content">
			<h2>Pagina Principal</h2>
			<p>Bienvenido, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>