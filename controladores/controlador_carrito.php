<?php
// carrito.php

// Iniciar la sesión para acceder a las variables de sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conectar a la base de datos
$host = 'localhost'; // Cambia esto con tu host de base de datos
$user = 'root';   // Cambia esto con tu usuario de base de datos
$password = ''; // Cambia esto con tu contraseña de base de datos
$dbname = 'hfme'; // Cambia esto con el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// ID del cliente, obténlo desde la sesión si el usuario está logueado
$idCliente = isset($_SESSION['cIdUsu']) ? $_SESSION['cIdUsu'] : null;  // Usar la sesión para obtener el ID del usuario

if (!$idCliente) {
    echo "Cliente no autenticado o ID de cliente no disponible.";
    exit;
}

// Verificar si se solicita eliminar un producto del carrito
if (isset($_GET['eliminar'])) {
    $idProducto = intval($_GET['eliminar']); // Asegurarse de que el ID del producto es un número entero

    // Preparar la consulta para eliminar el producto del carrito
    $sqlEliminar = "DELETE FROM tCarrito WHERE cIdUsuario = ? AND cIdProducto = ?";
    $stmtEliminar = $conn->prepare($sqlEliminar);
    $stmtEliminar->bind_param("ii", $idCliente, $idProducto); // Vincular los parámetros

    if ($stmtEliminar->execute()) {
        // Redirigir al carrito tras la eliminación para refrescar la lista
        header("Location: carrito.php");
        exit;
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
}

// Ejecutar la consulta para obtener los productos del carrito
$sql = "SELECT p.cImagen, p.cNombre, c.cCantidad, p.cPrecio, p.cIdProducto
        FROM tCarrito c
        INNER JOIN tProductos p ON c.cIdProducto = p.cIdProducto
        WHERE c.cIdUsuario = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idCliente); // Vincular el parámetro ID cliente
$stmt->execute();
$result = $stmt->get_result();

// Inicializar variables para el total de productos y el precio total
$cantidadTotal = 0;
$totalPrecio = 0;

// Comenzamos a mostrar los productos en el carrito
while ($row = $result->fetch_assoc()) {
    $cantidadTotal += $row['cCantidad'];
    $totalPrecio += $row['cCantidad'] * $row['cPrecio'];
    ?>
    <div class="productos-carrito">
        <img src="<?= htmlspecialchars($row['cImagen']) ?>" alt="<?= htmlspecialchars($row['cNombre']) ?>">
        <div class="info-producto">
            <div class="nombre-producto">
                <p><?= htmlspecialchars($row['cNombre']) ?></p>
            </div>
            <div class="cantidad">
                <p>Cantidad: <span><?= htmlspecialchars($row['cCantidad']) ?></span></p>
            </div>
            <div class="precio-producto">
                <p><span>$</span><?= number_format($row['cPrecio'] * $row['cCantidad'], 2) ?></p>
            </div>
            <div class="boton-producto">
                <!-- Añadir enlace para eliminar el producto del carrito -->
                <a href="carrito.php?eliminar=<?= $row['cIdProducto'] ?>">Eliminar</a>
            </div>
        </div>
        <hr>
    </div>
    <?php
}

// Si no hay productos en el carrito
if ($cantidadTotal === 0) {
    echo "<p>Tu carrito está vacío.</p>";
} else {
    ?>
    <!-- Precio total del carrito -->
    <div class="precio-total">
        <hr>
        <p>Subtotal (<span><?= $cantidadTotal ?></span> productos): <span>$<?= number_format($totalPrecio, 2) ?></span></p>
    </div>
    <?php
}

// Cerrar la conexión
$conn->close();
?>
