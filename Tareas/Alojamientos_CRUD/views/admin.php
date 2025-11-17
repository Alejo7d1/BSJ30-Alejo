<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../services/alojamientoServices.php';
requireAdmin();

// Procesar eliminación de alojamiento
if (isset($_GET['eliminar'])) {
    $alojamiento_id = $_GET['eliminar'];
    if (eliminarAlojamientoSistema($alojamiento_id)) {
        $_SESSION['success'] = "Alojamiento eliminado exitosamente";
    } else {
        $_SESSION['error'] = "Error al eliminar el alojamiento";
    }
    header('Location: admin.php');
    exit();
}
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
        
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
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
                            <?php if (!empty($alojamiento['imagen'])): ?>
                                <img src="<?php echo $alojamiento['imagen']; ?>" 
                                     alt="<?php echo htmlspecialchars($alojamiento['nombre']); ?>" 
                                     style="width:100%;height:100%;object-fit:cover;">
                            <?php else: ?>
                                <div style="width:100%;height:100%;background:#ddd;display:flex;align-items:center;justify-content:center;color:#666;">
                                    Imagen no disponible
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="alojamiento-content">
                            <h3><?php echo htmlspecialchars($alojamiento['nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($alojamiento['descripcion']); ?></p>
                            <div class="alojamiento-precio">$<?php echo number_format($alojamiento['precio'], 2); ?> / noche</div>
                            <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($alojamiento['ubicacion']); ?></p>
                            <p><strong>ID:</strong> <?php echo $alojamiento['id']; ?></p>
                            
                            <!-- BOTÓN PARA ELIMINAR ALOJAMIENTO -->
                            <div style="margin-top: 1rem;">
                                <a href="admin.php?eliminar=<?php echo $alojamiento['id']; ?>" 
                                   class="btn btn-danger" 
                                   onclick="return confirm('¿ESTÁS SEGURO de que quieres ELIMINAR permanentemente este alojamiento? Esta acción no se puede deshacer.')">
                                    Eliminar Alojamiento
                                </a>
                            </div>
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