<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir el archivo de conexión a la base de datos
include('conexion.php');

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
        echo '        <input type="hidden" name="cIdUsuario" value="1">'; // Ajusta a tu lógica de usuario
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
