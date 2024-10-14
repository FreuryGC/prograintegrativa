<?php
include('conexion.php');

// Consulta para obtener todas las marcas de la tabla tMarca
$consultaMarcas = "SELECT cIdMarca, cNombreMarca FROM tMarca";
$resultMarcas = $conexion->query($consultaMarcas);

// Mostrar los checkboxes con las marcas disponibles
while ($marca = $resultMarcas->fetch_assoc()) {
    $checked = '';
    if (isset($_GET['marcas']) && in_array($marca['cIdMarca'], $_GET['marcas'])) {
        $checked = 'checked';
    }
    echo '<label><input type="checkbox" name="marcas[]" value="' . $marca['cIdMarca'] . '" ' . $checked . ' onchange="filtrarProductos()"> ' . htmlspecialchars($marca['cNombreMarca']) . '</label><br>';
}
?>
