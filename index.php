<html>
<head>
    <title>Ventas - Lista de productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Lista de productos</h1>

    <form method="POST" action="insertar.php">
        <h2>Ingresa el id del producto</h2>
        <input type="number" name="id_producto" required><br>

        <h2>Ingresa el nombre del producto</h2>
        <input type="text" name="nombre_producto" required><br>

        <h2>Ingresa el precio</h2>
        <input type="number" step="0.01" name="precio_producto" required><br>

        <h2>Ingresa el stock</h2>
        <input type="number" name="stock_producto" required><br><br>

        <input type="submit" value="Registrar producto">
    </form>

    <h2>Lista de productos</h2>
    <table border="1">
        <tr>
            <th>ID producto</th>
            <th>Nombre del producto</th>
            <th>Precio</th>
            <th>Existencia</th>
            <th>Acciones</th>
        </tr>

        <?php
        $nombreServidor = "sql303.infinityfree.com"; 
        $nombreUsuario = "if0_37364789";        
        $contrasena = "IOLqa8CFZEV";             
        $nombreBaseDatos = "if0_37364789_practica3";
    
        $conn = new mysqli($nombreServidor,$nombreUsuario,$contrasena,$nombreBaseDatos);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id_producto"] . "</td>
                        <td>" . $row["nombre_producto"] . "</td>
                        <td>" . $row["precio_producto"] . "</td>
                        <td>" . $row["stock_producto"] . "</td>
                        <td>
                            <form method='POST' action='eliminar.php' style='display:inline;'>
                                <input type='hidden' name='id_producto' value='" . $row["id_producto"] . "'>
                                <input type='submit' value='Eliminar'>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay productos</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
