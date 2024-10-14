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

    // Verificar si el producto ya está en el carrito
    $sql_verificar = "SELECT cCantidad FROM tCarrito WHERE cIdUsuario = ? AND cIdProducto = ?";
    $stmt_verificar = $conexion->prepare($sql_verificar);
    if ($stmt_verificar) {
        $stmt_verificar->bind_param("ii", $cIdUsuario, $cIdProducto);
        $stmt_verificar->execute();
        $resultado = $stmt_verificar->get_result();

        if ($resultado->num_rows > 0) {
            // Si el producto ya está en el carrito, actualizamos la cantidad
            $fila = $resultado->fetch_assoc();
            $nuevaCantidad = $fila['cCantidad'] + $cCantidad;

            $sql_actualizar = "UPDATE tCarrito SET cCantidad = ? WHERE cIdUsuario = ? AND cIdProducto = ?";
            $stmt_actualizar = $conexion->prepare($sql_actualizar);
            if ($stmt_actualizar) {
                $stmt_actualizar->bind_param("iii", $nuevaCantidad, $cIdUsuario, $cIdProducto);
                if ($stmt_actualizar->execute()) {
                    // Redirigir a la página de productos después de actualizar el carrito
                    header("Location: ../productos.php");
                    exit();
                } else {
                    echo "Error al actualizar la cantidad: " . $stmt_actualizar->error;
                }
                $stmt_actualizar->close();
            } else {
                echo "Error en la preparación de la consulta de actualización.";
            }
        } else {
            // Si el producto no está en el carrito, lo insertamos
            $sql_insertar = "INSERT INTO tCarrito (cIdUsuario, cIdProducto, cCantidad)
                             VALUES (?, ?, ?)";
            $stmt_insertar = $conexion->prepare($sql_insertar);
            if ($stmt_insertar) {
                $stmt_insertar->bind_param("iii", $cIdUsuario, $cIdProducto, $cCantidad);
                if ($stmt_insertar->execute()) {
                    // Redirigir a la página de productos después de añadir el producto al carrito
                    header("Location: ../productos.php");
                    exit();
                } else {
                    echo "Error al añadir el producto al carrito: " . $stmt_insertar->error;
                }
                $stmt_insertar->close();
            } else {
                echo "Error en la preparación de la consulta de inserción.";
            }
        }
        $stmt_verificar->close();
    } else {
        echo "Error en la preparación de la consulta de verificación.";
    }
} else {
    echo "Faltan datos necesarios.";
}

// Cerrar la conexión
$conexion->close();
?>
