<!doctype html>
<html>
    <body>
        <form action="sumaProductos.php" method="post">
            <div>
                <h1> Tienda </h1>
            </div>
            <div>
                <h3>
                    <p>Los<font color="red"> precios </font>de los productos son: </p>
                    <li>Para camisas el precio de las camisas son <font color="black"> $129 </font></li>
                    <li>Para pantalones el precio de los pantalones son <font color="black"> $239 </font></li>
                    <li>Para chamarras el precio de las chamarras son <font color="black"> $300 </font></li>
                </h3>
            </div>
            <div>
                <label for="">Ingrese la cantidad de camisas: </label>
                <input type="number" min="0" pattern="[1-9]" name="suma1"> 
            </div>
            <div>
                <label for="">Ingrese la cantidad de pantalones: </label>
                <input type="number" min="0" pattern="[1-9]" name="suma2"> 
            </div>
            <div>
                <label for="">Ingrese la cantidad de chamarras: </label>
                <input type="number" min="0" pattern="[1-9]" name="suma3"> 
            </div>
            <div>
                <input type="submit" name="suma3" value="Realizar">
            </div>
        </form>
    </body>
</html>