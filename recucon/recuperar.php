<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
        
        $sql = "SELECT Correo FROM estudiante WHERE LOWER(Correo) = '".strtolower($e)."'";

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
        
        require 'C:\xampp\htdocs\sitioweb\recucon\PHPMailer\src\Exception.php';
        require 'C:\xampp\htdocs\sitioweb\recucon\PHPMailer\src\PHPMailer.php';
        require 'C:\xampp\htdocs\sitioweb\recucon\PHPMailer\src\SMTP.php';

        try {
            $mail = new PHPMailer(TRUE);
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com";
            $mail->Port = "587";
            $mail->Username = "contranuev@gmail.com";
            $mail->Password = "may123abc";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPDebug = 2;
            $mail->setFrom('contranuev@gmail.com', 'Kevin Peraza');
            $mail->addAddress('kevinazorga237@gmail.com', 'Jhorkaeff Mayorga');
            $mail->addCC('tup2397@tecplayacar.edu.mx');
            $mail->addBCC('tup2397@tecplayacar.edu.mx', 'Kevin Jhorkaeff Peraza Mayorga');
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->isHTML(true);
            $mail->Subject = 'Recuperar contraseña';
            $mail->Body ='
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
            $mail->AltBody = 'El texto como elemento de texto simple';
            $mail->send();
        } catch (Exception $e) {
                echo "Mailer Error: ".$mail->ErrorInfo;
        }
    }
?>