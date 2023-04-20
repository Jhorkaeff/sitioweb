<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Bienvenido Sitio </title>
        <link rel="stylesheet" href="../../../../CSS/css/Cabecera.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,500&display=swap" rel="stylesheet">
        
    <?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb"?>

    </head>
        <header class="header">
            <div class="container logo-nav">
                <img class="logo1" src="../../../../CSS/img/sirelogo">
                <nav class="navigation">
                    <ul>
                        <li><a href="../../QRE.php">QR Entrada</a></li>
                        <li><a href="../../QRS.php">QR Salida</a></li>
                    </ul>
                </nav>
                <nav class="navigation">
                    <ul>
                        <li><a href="<?php echo $url;?>">Pagina Inicio</a></li>
                        <li><a href="../../inicio.php">Inico</a></li>
                        <li><a href="../../casa.php">Administracion</a></li>
                        <li><a href="../../perfil.php">Perfil</a></li>
                        <li><a href="../../salir.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </header>