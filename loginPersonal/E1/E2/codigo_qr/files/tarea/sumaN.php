<!doctype html>
<html>
    <body>
        <form action="sumaN.php" method="post">
            <div>
                <label for="">Ingrese el primer numero: </label>
                <input type="number" min="1" pattern="[1-9]" name="suma1"> 
            </div>
            <div>
                <label for="">Ingrese el segundo numero: </label>
                <input type="number" min="1" pattern="[1-9]" name="suma2"> 
            </div>
            <div>
                <select name="op">
                    <option value="Sumarnt">Sumar</option>
                    <option value="Restar">Restar</option>
                    <option value="Multiplicar">Multiplicar</option>
                    <option value="Dividir">Dividir</option>
                </select>
            </div>
            <div>
                <input type="submit" name="suma3" value="Realizar"> 
            </div>
        </form>
    </body>
</html>
<?php
	if(isset($_POST["suma3"])){
        $num1 = $_POST['suma1'];
        $num2 = $_POST['suma2'];
        switch($_POST['op']){
            case "Sumarnt":
                $suma = $num1 + $num2;
                echo "La suma de los numeros naturales ".$num1." + ".$num2." es ".$suma;
                break;
            case "Restar":
                if ($num1 > $num2) {
                    $resta = $num1 - $num2;
                    echo "La resta de los numeros naturales ".$num1." - ".$num2." es ".$resta;
                    break;
                }
                elseif ($num1 < $num2){
                    $resta = $num2 - $num1;
                    echo "La resta de los numeros naturales ".$num2." - ".$num1." es ".$resta;
                    break;
                }
                else{
                    echo "La resta no se puede realizar porque el resultado da 0, vuelva a intentarlo";
                    break;
                }
            case "Multiplicar":
                $Mul = $num1 * $num2;
                echo "La multiplicacion de los numeros naturales".$num1." * ".$num2." es ".$Mul;
                break;
            case "Dividir":
                if ($num1 > $num2) {
                    $d = intdiv($num1, $num2);
                    $r = fmod($num1, $num2);
                    echo "La division de los numeros naturales ".$num1." / ".$num2." es ".$d. " y el residuo es: ". $r;
                break;
                }
                else if ($num1 < $num2) {
                    $d = intdiv($num2, $num1);
                    $r = fmod($num2, $num1);
                    echo "La division de los numeros naturales ".$num2." / ".$num1." es ".$d." y el residuo es: ". $r;
                    break;
                }
                else{
                    $d = intdiv($num1, $num2);
                    echo "La division de los numeros naturales ".$num1." / ".$num2." es ".$d;
                }
        }
    }
?>

<td><?php print_r ($es['ID_E']); ?></td>
<td><?php print_r ($es['Nombre']); ?></td>