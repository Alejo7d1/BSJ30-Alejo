<?php
require_once 'includes/config.php';
require_once 'services/alojamientoServices.php';

$alojamientos = getAlojamientos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos - Inicio</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <h1>Alojamientos</h1>
            <ul class="nav-links">
                <li><a href="index.php">Inicio</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="views/account.php">Mi Cuenta</a></li>
                    <?php if (isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] === 'admin'): ?>
                        <li><a href="views/admin.php">Administración</a></li>
                    <?php endif; ?>
                    <li><a href="views/logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="views/login.php">Iniciar Sesión</a></li>
                    <li><a href="views/register.php">Registrarse</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h2>Alojate donde más quieras y prefieras</h2>
            <p>Debes iniciar sesión para reservar alguna de nuestras fabulosas localidades</p>
        </div>
    </section>

    <main class="container">
        <h2>Alojamientos Disponibles</h2>
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
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_tipo'] === 'usuario'): ?>
                            <form action="views/account.php" method="POST" style="margin-top: 1rem;">
                                <input type="hidden" name="alojamiento_id" value="<?php echo $alojamiento['id']; ?>">
                                <button type="submit" class="btn">Reservar</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>