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
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Dots:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>HFME</title>
</head>
<body>
    <header> 
      <a href="index.php" class="logo">HFME</a>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="productos.php">Productos</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Sobre nosotros</a></li>
          <li><a href="#">Contacto</a></li>
          <?php include ("controladores/menu_sesion.php"); ?>
        </ul>
      </nav>
    </header>


    <section class="zona1">
      <div class="hero">
        <div class="contenido-hero">
          <div class="titulo">
            <h2>EL MAXIMO ECOSISTEMA DE INNOVACION Y EMPRENDIMIENTO</h2> <br>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam rem beatae, laudantium cupiditate ad alias molestiae quibusdam dicta blanditiis labore, sunt illo aperiam nobis doloremque optio. Aperiam porro a delectus.</p>
          </div>
          <div class="imagen-inicial">
            <img src="https://blog.nfon.com/hubfs/Estas%20son%20las%207%20caracter%C3%ADsticas%20de%20una%20oficina%20inteligente.jpg" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="zona2">
      <h2> Sobre nosotros</h2>
      <div class="img1" data-aos="fade-right">
        <img src="https://www.entelgy.com/media/k2/items/cache/f137dcece48070a913d9f960d76f0319_XL.jpg" alt="">
      </div>
      <div class="parrafo1">
        <h3>Nuestra historia</h3> <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, sunt sit deleniti delectus vero dicta, dolorem blanditiis placeat reiciendis, facilis ipsa eos similique sapiente dignissimos quisquam tenetur nesciunt magni beatae.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae fuga id impedit ratione libero amet quidem esse ipsa. Odio consectetur blanditiis modi debitis facere libero molestias harum praesentium odit ipsa.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo commodi nesciunt magni eaque? Sit, voluptates, hic esse commodi, quo maiores a error quaerat amet velit optio quos molestiae reprehenderit ab.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid odio assumenda quisquam nobis officiis impedit praesentium quia velit obcaecati laborum officia incidunt minus, temporibus recusandae dicta voluptatum deserunt provident ex.
        </p>
      </div>
    </section>

    <script src="https://kit.fontawesome.com/0749ca1eb4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
</body>
</html>