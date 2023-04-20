<?php
session_start();
if (!isset($_SESSION['loggedin2'])) {
	header('Location: ../index.php');
	exit;
}
?>
<?php include("../../template/CabaceraO.php"); ?>
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
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Sire QR</h1>
			</div>
		</nav>
		<div class="content">
			<h2>Pagina Principal</h2>
			<p>Bienvenido, <?=$_SESSION['name']?>!</p>
		</div>
		<?php include("../../template/PieO.php"); ?>
	</body>
</html>