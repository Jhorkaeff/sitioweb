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
        </style>
        <body>
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3"> Bienvenido, 
                        <?php echo $_SESSION['name'] ?>
                    </h1>
                    <p class="lead">
                        ¿Como estas hoy?
                    </p>
                    <hr class="my-2">
                    <p>
                        Nada nuevo
                    </p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="casa.php" role="button">Administracion de los qr y base de datos</a>
                    </p>
                </div>
            </div>
        <?php include ('../../template/PieU.php');?>
        </body>
