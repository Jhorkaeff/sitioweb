<?php
session_start();
if (!isset($_SESSION['loggedin1'])) {
	header('Location: ../index.php');
	exit;
}
include ('../../template/Cabacera1.php');
?>
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
                        <a class="btn btn-primary btn-lg" href="seccion</productos.php" role="button">Base de datos</a>
                    </p>
                </div>
            </div>
        </body>
<?php include ('../../template/Pie1.php');?>     
