<!-- insertar.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreServidor = "localhost"; 
    $nombreUsuario = "root";        
    $contrasena = "090322eduardo090322E";             
    $nombreBaseDatos = "practica3";

    $conn = new mysqli($nombreServidor,$nombreUsuario,$contrasena,$nombreBaseDatos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $stock_producto = $_POST['stock_producto'];

    $sql = "INSERT INTO productos (id_producto, nombre_producto, precio_producto, stock_producto)
            VALUES ('$id_producto', '$nombre_producto', '$precio_producto', '$stock_producto')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
