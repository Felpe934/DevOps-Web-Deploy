 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOps Web Deploy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>DevOps Web Deploy</h1>
        <p class="subtitle">Aplicacion desplegada con Docker, Nginx y PHP</p>

        <div class="badges">
            <span class="badge">Docker</span>
            <span class="badge">Nginx</span>
            <span class="badge">PHP</span>
            <span class="badge">MySQL</span>
            <span class="badge">Linux</span>
        </div>

        <div class="info">
            <p>Servidor: <span><?php echo php_uname(); ?></span></p>
            <p>PHP Version: <span><?php echo phpversion(); ?></span></p>
            <p>Fecha: <span><?php echo date('d/m/Y H:i:s'); ?></span></p>
            <p>Contenedor: <span><?php echo gethostname(); ?></span></p>
        </div>

        <div class="status">
            <p id="status-text">Verificando conexion...</p>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
