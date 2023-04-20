<?php include("../config/db.php"); ?>
<?php 
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else  
        $url = "http://";    
    $url.= $_SERVER['HTTP_HOST'];     
    $url.= $_SERVER['REQUEST_URI'];     
    $parts = parse_url($url);
    $output = [];
    parse_str($parts['query'], $output);
    $I = $output['ID'];
    
?>
<?php
    date_default_timezone_set("America/Cancun");
    $d = date("d_m_Y");

    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "ALTER TABLE horario_entrada ADD COLUMN IF NOT EXISTS `".$d."` datetime";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
?>
<?php
    date_default_timezone_set("America/Cancun");
    $d = date("d_m_Y");

    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT IGNORE INTO horario_entrada (ID_HE) VALUES ('$I')";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
?>
<?php include("../template/Cabacera2.php"); ?>
    <link rel="stylesheet" href="../CSS/css/add.css">
    <div class="color-fondo">
        <div class="contenedor1">
            <div class ="contenedor2">
                <form>
                    <div class="picture">
                        <div class="logo-gtup">
                            <img class="alinear" src="../CSS/img/logotec.png">
                        </div>
                        <?php
                            $conn = new mysqli($servername, $username, $password, $db);
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT Imagen From personal WHERE ID_P = '$I'";

                            $sth = $conn->query($sql);
                            $result=mysqli_fetch_array($sth);
                            echo '<img src="data:image/png;base64,'.base64_encode($result['Imagen']).'"/>';
                            $conn->close();
                        ?>
                    </div>
                    <div class="grid2">
                        <div class="n-estudiante">
                            <?php
                                $conn = new mysqli($servername, $username, $password, $db);
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT Nombre From personal WHERE ID_P = '$I'";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo $row['Nombre'];
                                    }
                                }
                                $conn->close();
                            ?>
                        </div>
                        <div class="a-estudiante">
                            <?php
                                $conn = new mysqli($servername, $username, $password, $db);
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT Apellido From personal WHERE ID_P = '$I'";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo $row['Apellido'];
                                    }
                                }
                                $conn->close();
                            ?>
                        </div>
                    </div>
                    <div class="texto-todo">
                        <div class="matricula">
                            <?php
                                $conn = new mysqli($servername, $username, $password, $db);
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT ID_P From personal WHERE ID_P = '$I'";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "Matricula: " .$row['ID_P'];
                                    }
                                }
                                $conn->close();
                            ?>
                        </div>
                        <div class="t-estudiante">
                            <?php
                                $conn = new mysqli($servername, $username, $password, $db);
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT Turno From personal WHERE ID_P = '$I'";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "Turno: " .$row['Turno'];
                                    }
                                }
                                $conn->close();
                            ?>
                        </div>
                        <div class="c-estudiante">
                            <?php
                                $conn = new mysqli($servername, $username, $password, $db);
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT Puesto From personal WHERE ID_P = '$I'";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "Puesto: " .$row['Puesto'];
                                    }
                                }
                                $conn->close();
                            ?>
                        </div>
                        <div claxcss="cuatri">
                            <?php
                                $conn = new mysqli($servername, $username, $password, $db);
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "SELECT Departamento From personal WHERE ID_P = '$I'";

                                $result = $conn->query($sql);
                                if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "Departamento: " .$row['Departamento'];
                                    }
                                }
                                $conn->close();
                            ?>
                        </div>
                        <div class="movil">
                            <?php
                            $conn = new mysqli($servername, $username, $password, $db);
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT Telefono From personal WHERE ID_P = '$I'";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "Telefono: " .$row['Telefono'];
                                }
                            }
                            $conn->close();
                            ?>
                        </div>
                        <div class="succesfully-error">
                            <?php
                                $conn = new mysqli($servername, $username, $password, $db);
                                if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                                }
                                $sql = "UPDATE horario_entrada SET `".$d."` = now()";
                                $conn->query($sql);
                                $conn->close();
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <?php include("../template/Pie1.php"); ?>
    </body>
</html>