<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'hfme';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar que el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar y ejecutar la inserción en la base de datos
    $sql = "INSERT INTO tUsuarios (cNombre, cApellido, cCorreo, cPassword) VALUES (:nombre, :apellido, :correo, :password)";
    $stmt = $conn->prepare($sql);
    
    try {
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':password' => $hashed_password
        ]);
        // Redirigir al usuario a la página de inicio de sesión después del registro
        header("Location: ../inicio_sesion.php");
        exit();
    } catch (PDOException $e) {
        die("Error al insertar los datos: " . $e->getMessage());
    }
}
?>