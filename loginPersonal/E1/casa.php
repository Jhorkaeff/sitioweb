<?php
session_start();
if (!isset($_SESSION['loggedin1'])) {
	header('Location: ../index.php');
	exit;
}
include ('../../template/Cabacera1.php');
?>
        <style>
        body{
            padding: 120px;
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
	<body class="loggedin">
		<table>
			<tr>
				<th><a href="E2/seccion/bdes.php">Base de datos de estudiantes</a></th>
				<th><a href="E2/seccion/bdpr.php">Base de datos de profesores</a></th>
				<th><a href="E2/seccion/bdpe.php">Base de datos de personal</a></th>
			</tr>
			<tr>
				<td>
					<a href="E2/codigo_qr/CrearE.php">Crear QR</a>
					<a href="E2/codigo_qr/CargarE.php">Cargar QR</a>
				</td>
				<td>
					<a href="E2/codigo_qr/CrearPr.php">Crear QR</a>
					<a href="E2/codigo_qr/CargarPr.php">Cargar QR</a>
				</td>
				<td>
					<a href="E2/codigo_qr/CrearP.php">Crear QR</a>
					<a href="E2/codigo_qr/CargarP.php">Cargar QR</a>
				</td>
			</tr>
		</table>
		<div class="content">
			<h2>Pagina Principal</h2>
			<p>Bienvenido, <?=$_SESSION['name']?>!</p>
		</div>
		<?php include ('../../template/PieU.php');?>
	</body>