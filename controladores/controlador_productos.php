<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['cIdUsu'])) {
    // Si no hay una sesión activa, redirigir al login o mostrar un mensaje
    echo "Debes estar logueado para añadir productos al carrito.";
    exit;
}

// Obtener el ID del usuario desde la sesión
$idUsuario = $_SESSION['cIdUsu'];

// Consulta para obtener los datos de los productos
$sql = "SELECT cIdProducto, cNombre, cPrecio, cStock, cImagen FROM tProductos";
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Recorrer los resultados y generar el HTML
    while ($fila = $resultado->fetch_assoc()) {
        echo '    <div class="producto">';
        echo '      <img src="' . $fila['cImagen'] . '" alt="">';
        echo '      <h4>' . htmlspecialchars($fila['cNombre']) . '</h4>';
        echo '      <p class="precio"><span>$ </span>' . htmlspecialchars($fila['cPrecio']) . '</p>';
        echo '      <p class="stock">' . htmlspecialchars($fila['cStock']) . ' <span>piezas en stock</span></p>';

        // Formulario para añadir al carrito
        echo '      <form method="POST" action="controladores/anadir_prod.php">';
        echo '        <input type="hidden" name="cIdProducto" value="' . $fila['cIdProducto'] . '">';
        echo '        <input type="hidden" name="cNombreProd" value="' . htmlspecialchars($fila['cNombre']) . '">';
        echo '        <input type="hidden" name="cCantidad" value="1">'; // Asumimos que se añade 1 producto
        echo '        <input type="hidden" name="cIdUsuario" value="' . $idUsuario . '">'; // ID del usuario desde la sesión
        echo '        <input type="submit" class="boton-añadir" value="Añadir al carrito">';
        echo '      </form>';

        echo '    </div>';
    }
} else {
    echo "No hay productos disponibles.";
}

// Cerrar la conexión
$conexion->close();
?>