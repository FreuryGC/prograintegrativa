<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['cIdUsu'])) {
    echo "Debes estar logueado para añadir productos al carrito.";
    exit;
}

$idUsuario = $_SESSION['cIdUsu'];

// Iniciar la consulta base
$sql = "SELECT p.cIdProducto, p.cNombre, p.cIdMarca, p.cPrecio, p.cStock, p.cImagen, m.cNombreMarca 
        FROM tProductos p 
        JOIN tMarca m ON p.cIdMarca = m.cIdMarca";

// Añadir condiciones de filtrado
$condiciones = [];
if (isset($_GET['busqueda']) && !empty($_GET['busqueda'])) {
    $busqueda = $conexion->real_escape_string($_GET['busqueda']);
    $condiciones[] = "p.cNombre LIKE '%$busqueda%'";
}

if (isset($_GET['marcas']) && !empty($_GET['marcas'])) {
    $marcas = array_map('intval', $_GET['marcas']);
    $condiciones[] = "p.cIdMarca IN (" . implode(',', $marcas) . ")";
}

// Si hay condiciones, añadirlas a la consulta
if (!empty($condiciones)) {
    $sql .= " WHERE " . implode(' AND ', $condiciones);
}

$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo '    <div class="info-producto">';
        echo '      <div class="imagen-producto">';
        echo '        <img src="' . htmlspecialchars($fila['cImagen']) . '" alt="">';
        echo '      </div>';
        echo '      <div class="info">';
        echo '        <div>';
        echo '          <h3>' . htmlspecialchars($fila['cNombre']) . '</h3>';
        echo '        </div>';
        echo '        <div class="marca">';
        echo '          <p>Por: <span>' . htmlspecialchars($fila['cNombreMarca']) . '</span></p>'; // Mostrar nombre de la marca
        echo '        </div>';
        echo '        <div class="cantidad-precio">';
        echo '          <p>Disponibles: <span>' . htmlspecialchars($fila['cStock']) . '</span></p>';
        echo '          <div class="precio">';
        echo '            <p><span>$</span>' . htmlspecialchars($fila['cPrecio']) . '</p>';
        echo '          </div>';
        echo '        </div>';

        // Formulario para añadir al carrito
        echo '        <form method="POST" action="controladores/anadir_prod.php">';
        echo '          <input type="hidden" name="cIdProducto" value="' . $fila['cIdProducto'] . '">';
        echo '          <input type="hidden" name="cNombreProd" value="' . htmlspecialchars($fila['cNombre']) . '">';
        echo '          <input type="hidden" name="cCantidad" value="1">';
        echo '          <input type="hidden" name="cIdUsuario" value="' . $idUsuario . '">';
        echo '          <input type="submit" class="boton-anadir" value="Añadir al carrito">';
        echo '        </form>';
        echo '        <hr>';
        echo '      </div>';
        echo '    </div>';
    }
} else {
    echo "No hay productos disponibles.";
}

$conexion->close();
?>
