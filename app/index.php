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
        <p class="subtitle">Aplicacion desplegada con Docker, Nginx, PHP y MySQL</p>

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

        <?php
        $host     = 'mysql_db';
        $db       = 'devops_db';
        $user     = 'devops_user';
        $password = 'devops1234';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT * FROM proyectos ORDER BY fecha DESC");
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="proyectos">
            <h2>Proyectos desde MySQL</h2>
            <table>
                <thead>
                    <tr>
                        <th>Proyecto</th>
                        <th>Tecnologias</th>
                        <th>Descripcion</th>
                        <th>Status</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proyectos as $proyecto): ?>
                    <tr>
                        <td><?php echo $proyecto['nombre']; ?></td>
                        <td><?php echo $proyecto['tecnologias']; ?></td>
                        <td><?php echo $proyecto['descripcion']; ?></td>
                        <td><span class="status-badge"><?php echo $proyecto['status']; ?></span></td>
                        <td><?php echo $proyecto['fecha']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php
        } catch (PDOException $e) {
            echo '<div class="error">Error de conexion: ' . $e->getMessage() . '</div>';
        }
        ?>

    </div>
    <script src="script.js"></script>
</body>
</html>