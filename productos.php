<?php
  include("controladores/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Dots:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_productos.css">
    <title>HFME</title>
</head>
<body>
    <header> 
      <a href="index.php" class="logo">HFME</a>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="#">Productos</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Sobre nosotros</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="carrito.php"><i class="bi bi-cart-fill"></i></a></li>
          <?php include ("controladores/menu_sesion.php"); ?>
        </ul>
      </nav>
    </header>


    <section class="zona1">
      <div class="hero">
        <div class="contenido-hero">
          <div class="titulo">
            <h2>Conoce nuestra variedad de productos</h2> <br>
            <p>Busca la mejor opcion para tu uso personal o negocio y lleva el desempeño al maximo</p>
          </div>
        </div>
      </div>
    </section>

    <section class="zona-productos">
      <div class="contenedor-filtros">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi voluptatem dolore dolorum repellat atque quam nemo, eligendi ex possimus, perferendis eius inventore officia aperiam totam quod iusto. Mollitia, optio ut.</p>
      </div>
      <div class="contenedor-productos">
        <div class="info-producto">
          <div class="imagen-producto">
            <img src="https://images.samsung.com/is/image/samsung/p6pim/mx/2401/gallery/mx-galaxy-s24-sm-s921bzalltm-thumb-539298545" alt="">
          </div>
          <div class="info">
            <div>
              <h3>Samsung Galaxy S24 MARBLE GREY 128GB lore</h3>
            </div>
            <div class="marca">
              <p>Por <span>Samsung</span></p>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </section>

    <footer>
      <p style="text-align: center">Todos los derechos reservados a Freury Golpe.</p>
    </footer>

    <script src="https://kit.fontawesome.com/0749ca1eb4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
</body>
</html>