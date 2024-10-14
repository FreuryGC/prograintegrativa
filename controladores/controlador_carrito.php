<?php
// Iniciar la sesión si no se ha iniciado ya
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conectar a la base de datos
function getDBConnection() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'hfme';

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

// Eliminar producto del carrito
function eliminarProducto($conn, $idCliente, $idProducto) {
    $sqlEliminar = "DELETE FROM tCarrito WHERE cIdUsuario = ? AND cIdProducto = ?";
    $stmtEliminar = $conn->prepare($sqlEliminar);
    $stmtEliminar->bind_param("ii", $idCliente, $idProducto);
    
    if ($stmtEliminar->execute()) {
        // Evitar errores de redirección debido a salida previa
        header("Location: carrito.php"); 
        exit; // Es importante después de la redirección
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
}

// Obtener los productos del carrito
function obtenerCarrito($conn, $idCliente) {
    $sql = "SELECT p.cImagen, p.cNombre, c.cCantidad, p.cPrecio, p.cIdProducto
            FROM tCarrito c
            INNER JOIN tProductos p ON c.cIdProducto = p.cIdProducto
            WHERE c.cIdUsuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idCliente);
    $stmt->execute();
    return $stmt->get_result();
}

// ID del cliente (usado desde la sesión)
$idCliente = isset($_SESSION['cIdUsu']) ? $_SESSION['cIdUsu'] : null;

// Verificar si el usuario está logueado
if (!$idCliente) {
    echo "Cliente no autenticado o ID de cliente no disponible.";
    exit;
}

// Conectar a la base de datos
$conn = getDBConnection();

// Verificar si se solicita eliminar un producto del carrito
if (isset($_GET['eliminar'])) {
    $idProducto = intval($_GET['eliminar']);
    eliminarProducto($conn, $idCliente, $idProducto);
}

// Obtener los productos del carrito
$result = obtenerCarrito($conn, $idCliente);

// Inicializar variables para el total de productos y el precio total
$cantidadTotal = 0;
$totalPrecio = 0;
$productos = [];

// Recorrer los productos del carrito
while ($row = $result->fetch_assoc()) {
    $cantidadTotal += $row['cCantidad'];
    $totalPrecio += $row['cCantidad'] * $row['cPrecio'];
    $productos[] = $row;
}

// Cerrar la conexión
$conn->close();

// Mostrar los productos en el carrito
foreach ($productos as $producto) {
    ?>
    <div class="productos-carrito">
        <img src="<?= htmlspecialchars($producto['cImagen']) ?>" alt="<?= htmlspecialchars($producto['cNombre']) ?>">
        <div class="info-producto">
            <div class="nombre-producto">
                <p><?= htmlspecialchars($producto['cNombre']) ?></p>
            </div>
            <div class="cantidad">
                <p>Cantidad: <span><?= htmlspecialchars($producto['cCantidad']) ?></span></p>
            </div>
            <div class="precio-producto">
                <p><span>$</span><?= number_format($producto['cPrecio'] * $producto['cCantidad'], 2) ?></p>
            </div>
            <div class="boton-producto">
                <a href="carrito.php?eliminar=<?= $producto['cIdProducto'] ?>">Eliminar</a>
            </div>
        </div>
        <hr>
    </div>
    <?php
}

// Si no hay productos en el carrito
if ($cantidadTotal === 0) {
    echo "<p>Tu carrito está vacío.</p>";
}
?>
