<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Bienvenido Sitio </title>
        <link rel="stylesheet" href="../../CSS/css/Cabecera.css">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,500&display=swap" rel="stylesheet">
        
    <?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb"?>

    </head>
        <header class="header">
            <div class="container logo-nav">
                <img class="logo1" src="../../CSS/img/sirelogo">
                <nav class="navigation">
                    <ul>
                        <li><a href="<?php echo $url;?>">Inicio</a></li>
                        <li><a href="E2/codigo_qr/Crear.php">Crear QR</a></li>
                        <li><a href="E2/codigo_qr/Cargar.php">Cargar QR</a></li>
                        <li><a href="perfil.php">Perfil</a></li>
                        <li><a href="E2/seccion/bdes.php">Base de datos de estudiantes</a></li>
                        <li><a href="E2/seccion/bdpr.php">Base de datos de profesores</a></li>
                        <li><a href="E2/seccion/bdpe.php">Base de datos de personal</a></li>
                        <li><a href="cerrar.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </header>