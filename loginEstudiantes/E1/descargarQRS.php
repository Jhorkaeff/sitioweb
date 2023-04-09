<?php
include("../../config/db.php");

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
    $url = "https://";   
}else{
$url = "http://";    
$url.= $_SERVER['HTTP_HOST'];     
$url.= $_SERVER['REQUEST_URI'];     
$parts = parse_url($url);
$output = [];
parse_str($parts['query'], $output);
$I = $output['ID'];
}

$mysqli = new mysqli($servername, $username, $password, $db);
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}

$result = "SELECT ImagenQRS FROM qr WHERE ID_Q = '$I'";
$resp = $mysqli->query($result);
$row = mysqli_fetch_assoc($resp);
header("Content-type: image/png");
echo $row["ImagenQRS"];
?>