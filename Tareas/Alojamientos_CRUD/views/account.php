<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../services/alojamientoServices.php';

requireLogin();

// Agregar alojamiento a la cuenta del usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['alojamiento_id'])) {
    $alojamiento_id = $_POST['alojamiento_id'];
    if (agregarAlojamientoUsuario($_SESSION['user_id'], $alojamiento_id)) {
        $_SESSION['success'] = "Alojamiento agregado a tu cuenta";
    } else {
        $_SESSION['error'] = "El alojamiento ya está en tu cuenta";
    }
    header('Location: account.php');
    exit();
}

// Eliminar alojamiento de la cuenta del usuario
if (isset($_GET['eliminar'])) {
    $seleccion_id = $_GET['eliminar'];
    if (eliminarAlojamientoUsuario($seleccion_id, $_SESSION['user_id'])) {
        $_SESSION['success'] = "Alojamiento eliminado de tu cuenta";
    } else {
        $_SESSION['error'] = "Error al eliminar el alojamiento";
    }
    header('Location: account.php');
    exit();
}

$misAlojamientos = getAlojamientosUsuario($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta - Alojamientos</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <h1>Alojamientos</h1>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="account.php">Mi Cuenta</a></li>
                <?php if (isAdmin()): ?>
                    <li><a href="admin.php">Administración</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_nombre']); ?></h2>
        
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <h3>Mis Alojamientos Seleccionados</h3>
        
        <?php if (empty($misAlojamientos)): ?>
            <p>No has seleccionado ningún alojamiento aún. <a href="../index.php">Explora nuestros alojamientos</a>.</p>
        <?php else: ?>
            <div class="alojamientos-grid">
                <?php foreach ($misAlojamientos as $alojamiento): ?>
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
                            <a href="account.php?eliminar=<?php echo $alojamiento['seleccion_id']; ?>" 
                               class="btn btn-danger" 
                               onclick="return confirm('¿Estás seguro de que quieres eliminar este alojamiento?')">
                                Eliminar
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>