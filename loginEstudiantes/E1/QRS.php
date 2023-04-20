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
$result = "SELECT ImagenQRS FROM qr WHERE ID_Q = '$i'";
$rese = "SELECT NombreQR FROM qr WHERE ID_Q = '$i'";
$resp = $mysqli->query($result);
$result=mysqli_fetch_array($resp);
$resy = $mysqli->query($rese);
$row = $resy->fetch_assoc();
if(isset($row['NombreQR'])){
    $Cont3 = $row['NombreQR'];
}
    include("../../template/CabaceraU.php");
    echo "<style>
    body{
        padding: 80px;
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
    </style>";
    echo "<div class='col-md-3'>";
        echo '<div class="card">';
        echo '<img src="data:image/png;base64,'.base64_encode($result['ImagenQRS']).'"/>';
            echo '<div class="card-body">';
                echo '<h4>'.$Cont3.'</h4>';
                echo '<a href="descargarQRS.php?ID='.$i.'" download="'.$Cont3.'">';
                    echo "<button> Descargar </button>";
                echo "</a>";
            echo '</div>';
        echo '</div>';
    echo '</div>';
    include("../../template/PieU.php");
?>