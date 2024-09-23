<!-- eliminar.php -->
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

    $sql = "DELETE FROM productos WHERE id_producto='$id_producto'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar producto" . $conn->error;
    }

    $conn->close();
}
?>
