<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['cIdUsu'])) {
    // Redirigir al formulario de login si no ha iniciado sesión
    header("Location: login.php");
    exit();
}

// Si está logueado, puedes acceder al ID del usuario
$cIdUsu = $_SESSION['cIdUsu'];
?>