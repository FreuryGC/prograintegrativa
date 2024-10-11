<?php
// Consulta para obtener los datos de los productos
$sql = "SELECT cNombre, cPrecio, cStock, cImagen FROM tProductos";
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
        echo '      <input type="button" class="boton-añadir" value="Añadir al carrito">';
        echo '    </div>';
    }

    echo '  </div>';
} else {
    echo "No hay productos disponibles.";
}

// Cerrar la conexión
$conexion->close();
?>