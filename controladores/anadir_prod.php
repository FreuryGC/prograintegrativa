<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos
include('conexion.php');  // Ajusta la ruta si el archivo de conexión está en otra carpeta

// Verificar si se recibieron los datos del formulario
if (isset($_POST['cIdProducto'], $_POST['cCantidad'], $_POST['cIdUsuario'])) {
    $cIdProducto = $_POST['cIdProducto'];
    $cCantidad = $_POST['cCantidad'];
    $cIdUsuario = $_POST['cIdUsuario'];

    // SQL para insertar en la tabla tCarrito
    $sql = "INSERT INTO tCarrito (cIdUsuario, cIdProducto, cCantidad)
            VALUES (?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);
    if ($stmt) {
        // Vincular los parámetros: i = entero, s = string, etc.
        // En este caso, los tres son enteros, así que el tipo es 'iii'
        $stmt->bind_param("iii", $cIdUsuario, $cIdProducto, $cCantidad);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a la página de productos después de añadir el producto al carrito
            header("Location: ../productos.php"); // Asegúrate de que la ruta sea correcta
            exit(); // Detener la ejecución del script después de la redirección
        } else {
            echo "Error al añadir el producto al carrito: " . $stmt->error;
        }
        
        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta.";
    }
} else {
    echo "Faltan datos necesarios.";
}

// Cerrar la conexión
$conexion->close();
?>
