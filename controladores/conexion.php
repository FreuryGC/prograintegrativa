<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'HFME');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}