<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/sitioweb/CSS/css/bde.css">
  </head>
  <body> 
    <?php $url="http://".$_SERVER['HTTP_HOST']."/sitioweb"?>

        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#">Administrador del sitio web<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="perfil.php">Perfil</a>
                <a class="nav-item nav-link" href="bdes.php">Base de datos de estudiantes</a>
                <a class="nav-item nav-link" href="bdpr.php">Base de datos de profesores</a>
                <a class="nav-item nav-link" href="bdpe.php">Base de datos de personal</a>
                <a class="nav-item nav-link" href="cerrar.php">Salir</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>">Ver sitio web</a>
            </div>
        </nav>


  <div class="container">
  <br/>
    <div class="row">

