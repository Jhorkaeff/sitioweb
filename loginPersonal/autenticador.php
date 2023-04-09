<?php
session_start();
if(isset($_POST['iniciar'])){
    if ( !isset($_POST['nombre'], $_POST['contra']) ) {
        exit('¡Por favor! Llene los campos');
    }
    
    $username = $_POST['nombre'];
    $password = $_POST['contra'];
    
    $mysqli = new mysqli('localhost','root','','sire');
    $result = "SELECT ID_P, NombrePersonal, ContraseñaPersonal FROM personal WHERE (LOWER(REPLACE(NombrePersonal, ' ', '')) = '".strtolower(str_replace(' ', '',$username))."' OR LOWER(REPLACE(CorreoPersonal, ' ', '')) = '".strtolower(str_replace(' ', '',$username))."') AND ContraseñaPersonal = '$password'";

    $ress = $mysqli->query($result);    
    $row = mysqli_fetch_array($ress, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($ress);

    if($count == 1){  
        echo "Login successful </br>";  
    }
    else{
        echo "Login failed. Invalid username or password </br>";  
    }

    $resl = $mysqli->query($result); 
    if ($resl->num_rows > 0){
        
        $Cont1 = $row['ContraseñaPersonal'];
        $Cont2 = $row['ID_P'];
        $Cont3 = $row['NombrePersonal'];
        if ($_POST['contra'] === $Cont1){
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $Cont3;
            $_SESSION['id'] = $Cont2;
            header('Location: E1/inicio.php');
        }else{
            echo 'Incorrect username and/or password!';
        }
    }else{
        echo 'Incorrect username and/or password!';
    }
    $mysqli->close();
    }   
?>