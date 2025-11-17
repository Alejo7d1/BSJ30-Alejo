<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../services/alojamientoServices.php';
requireAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Alojamientos</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <h1>Alojamientos - Administración</h1>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="account.php">Mi Cuenta</a></li>
                <li><a href="admin.php">Administración</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <h2>Panel de Administración</h2>
        <p>Bienvenido, Administrador <?php echo htmlspecialchars($_SESSION['user_nombre']); ?></p>
        
        <div style="margin: 2rem 0;">
            <a href="add_property.php" class="btn">Agregar Nuevo Alojamiento</a>
        </div>
        
        <h3>Alojamientos Existentes</h3>
        <?php
        $alojamientos = getAlojamientos();
        if ($alojamientos): ?>
            <div class="alojamientos-grid">
                <?php foreach ($alojamientos as $alojamiento): ?>
                    <div class="alojamiento-card">
                        <div class="alojamiento-img">
                            <?php echo $alojamiento['imagen'] ? 
                                '<img src="'.$alojamiento['imagen'].'" alt="'.$alojamiento['nombre'].'" style="width:100%;height:100%;object-fit:cover;">' : 
                                'Imagen no disponible'; ?>
                        </div>
                        <div class="alojamiento-content">
                            <h3><?php echo htmlspecialchars($alojamiento['nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($alojamiento['descripcion']); ?></p>
                            <div class="alojamiento-precio">$<?php echo number_format($alojamiento['precio'], 2); ?> / noche</div>
                            <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($alojamiento['ubicacion']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No hay alojamientos registrados.</p>
        <?php endif; ?>
    </main>
</body>
</html>