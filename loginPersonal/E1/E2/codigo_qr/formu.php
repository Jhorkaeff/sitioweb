<html>
    <head>
        <style>
        table{
            border-style:solid;
            border-width:2px;
            border-color:pink;
        }
        </style>
    </head>
    <body bgcolor="#EEFDEF">
        <table border='1'>
            <tr>;
                <?php
                $mysqli = new mysqli('localhost','root','','sire');

                $re = $mysqli->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'sire' AND TABLE_NAME = 'horario_salida'");
                

                for($i=0; $i < $re->num_rows; $i++){
                    $fila_usuario = $re->fetch_assoc();
                    if ($i == 0) {
                        continue;
                    }
                    $ka = $fila_usuario['COLUMN_NAME'];
                    echo "<th>".$ka."</th>";
                    }
                ?>
            </tr>
            <?php    
            $mysqli = new mysqli('localhost','root','','sire');
            $sql = $mysqli->query ("SELECT * FROM horario_salida");
            while ($row = mysqli_fetch_row($sql)){
                unset($row[0]); 
                $ke = implode('</td><td>', $row);
                echo "<tr>";
                echo "<td>".$ke."</td>";
                echo "</tr>";
            }
            $mysqli->close();
            ?>
        </table>
    </body>
</html>