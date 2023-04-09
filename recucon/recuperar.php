<?php
    if(isset($_POST["enviar"])){
        $e=$_POST["emailN"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "sire";

        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT Correo From estudiante WHERE LOWER(Correo) = '".strtolower($e)."'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $Correo = $row['Correo'];
        echo $Correo;

        $codigo = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $pass = array(); 
        $combLen = strlen($codigo) - 1; 
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $codigo[$n];
        }
        $k = implode($pass);

        $para = '"'.$Correo.'"';
        $asunto = 'Nueva Contraseña para QR';
        $cuerpo = '
        <html>
            <head>
                <title> Recuperar contraseña </title> 
            </head> 
            <body> 
                <h1>Hola amigos!</h1> 
                <p>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje </p> 
            </body> 
        </html>
        ';

        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: Jhorkaeff Peraza <tup2397@tecplayacar.edu.mx>\r\n"; 

        mail($para, $asunto, $cuerpo, $headers);
    }
?>