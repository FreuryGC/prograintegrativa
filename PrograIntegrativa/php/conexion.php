<?php
// Parámetros de conexión
$host = 'localhost';  // Cambia esto si tu servidor es diferente
$dbname = 'HFME'; // Nombre de tu base de datos
$username = 'root';  // Usuario de la base de datos
$password = '';      // Contraseña de la base de datos

try {
    // Crear una nueva conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el modo de error de PDO para que lance excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}

?>
