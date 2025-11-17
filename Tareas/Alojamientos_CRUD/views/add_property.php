<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../services/alojamientoServices.php';

requireAdmin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ubicacion = $_POST['ubicacion'];
    $imagen = $_POST['imagen']; // En una aplicación real, deberías subir archivos
    
    if (crearAlojamiento($nombre, $descripcion, $precio, $ubicacion, $imagen)) {
        $_SESSION['success'] = "Alojamiento creado exitosamente";
        header('Location: admin.php');
        exit();
    } else {
        $error = "Error al crear el alojamiento";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alojamiento - Alojamientos</title>
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
        <div class="form-container">
            <h2>Agregar Nuevo Alojamiento</h2>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nombre">Nombre del Alojamiento:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required style="width:100%;padding:0.5rem;border:1px solid #ddd;border-radius:4px;"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio por Noche:</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" required>
                </div>
                
                <div class="form-group">
                    <label for="imagen">URL de la Imagen:</label>
                    <input type="text" id="imagen" name="imagen" placeholder="https://ejemplo.com/imagen.jpg">
                </div>
                
                <button type="submit" class="btn">Crear Alojamiento</button>
                <a href="admin.php" class="btn" style="background: #666; margin-left: 1rem;">Cancelar</a>
            </form>
        </div>
    </main>
</body>
</html>