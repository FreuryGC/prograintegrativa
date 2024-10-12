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
    <link rel="stylesheet" href="css/style_registro.css">

    <title>HFME</title>
</head>
<body>
      <header> 
      <nav>
      <a href="index.php">Inicio</a>
      <a href="index.php" class="logo">HFME</a>
      </nav>
    </header>

    <section class="zona1">
      <div class="hero">
      </div>
    </section>
    
    <section class="zona-registro">
    <div class="contenedor">
    <h2 style="text-align: center">Favor de introducir tus datos</h2><br>
    <form action="controladores/controlador_registro.php" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" class="form-control" id="correo" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button><br><br>
        <a href="inicio_sesion.php">Iniciar Sesión</a>
    </form>
</div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>