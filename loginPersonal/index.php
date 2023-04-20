        <?php include("../template/Cabacera2.php"); ?>
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
        <form action = "autenticador.php" method = "post" enctype = "multipart/form-data">
            <div>
                <h2>Welcome</h2>
                <div>
                    <label>Ingrese su usuario o correo</label>
                    <input type="text" name="nombre" id="Nombre" required>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="contra" id="Contra" required>
                </div>
                <div>
                    <div>
                        <a href="/sitioweb/recucon/recuperarContra.html">Olvide mi contrasena</a>
                    </div>
                </div>
                <button type="submit" name="iniciar"> Inicar Sesion </button>
            </div>
        </form>
        <?php include("../template/Pie1.php"); ?>
        