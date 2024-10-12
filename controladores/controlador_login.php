<?php
session_start();

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

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar los datos del formulario
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT cIdUsu, cPassword FROM tUsuarios WHERE cCorreo = :correo";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':correo' => $correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['cPassword'])) {
        // Guardar el ID del usuario en la sesión
        $_SESSION['cIdUsu'] = $usuario['cIdUsu'];

        // Redirigir al usuario a la página principal (index.php)
        header("Location: ../index.php");
        exit();
    } else {
        // Si las credenciales no son correctas, mostrar un mensaje de error
        echo "Correo o contraseña incorrectos.";
    }
}
?>