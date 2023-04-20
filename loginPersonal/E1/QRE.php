<?php
session_start();
if (!isset($_SESSION['loggedin1'])) {
	header('Location: ../index.html');
	exit;
}
$i = $_SESSION['id'];
include ('../../template/Cabacera1.php');
include("../../config/db.php");

$mysqli = new mysqli($servername, $username, $password, $db);
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}
$result = "SELECT ImagenQRE FROM qr WHERE ID_Q = '$i'";
$rese = "SELECT NombreQR FROM qr WHERE ID_Q = '$i'";
$resp = $mysqli->query($result);
$result=mysqli_fetch_array($resp);
$resy = $mysqli->query($rese);
$row = $resy->fetch_assoc();
if(isset($row['NombreQR'])){
    $Cont3 = $row['NombreQR'];
}
    echo "<div class='col-md-3'>";
        echo '<div class="card">';
        echo '<img src="data:image/png;base64,'.base64_encode($result['ImagenQRE']).'"/>';
            echo '<div class="card-body">';
                echo '<h4>'.$Cont3.'</h4>';
                echo '<a href="descargarQRE.php?ID='.$i.'" download="'.$Cont3.'">';
                    echo "<button> Descargar </button>";
                echo "</a>";
            echo '</div>';
        echo '</div>';
    echo '</div>';
?>