<!-- eliminar.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreServidor = "sql303.infinityfree.com"; 
    $nombreUsuario = "if0_37364789";        
    $contrasena = "IOLqa8CFZEV";             
    $nombreBaseDatos = "if0_37364789_practica3";

    $conn = new mysqli($nombreServidor,$nombreUsuario,$contrasena,$nombreBaseDatos);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $id_producto = $_POST['id_producto'];

    $sql = "DELETE FROM productos WHERE id_producto='$id_producto'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar producto" . $conn->error;
    }

    $conn->close();
}
?>
