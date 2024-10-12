<?php
// Inicia la sesión para acceder a las variables de sesión
session_start();
?>

<!-- Lógica para mostrar los enlaces de sesión -->
<?php if (!isset($_SESSION['cIdUsu'])): ?>
    <!-- Mostrar el enlace de inicio de sesión si el usuario NO está logueado -->
    <li><a href="inicio_sesion.php"><i class="fa-solid fa-right-to-bracket"></i> Iniciar sesión</a></li>
<?php else: ?>
    <!-- Mostrar el enlace de cerrar sesión si el usuario ESTÁ logueado -->
    <li><a href="controladores/logout.php">Cerrar sesión</a></li>
<?php endif; ?>