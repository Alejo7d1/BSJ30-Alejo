<?php
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT id, nombre, email, password, tipo FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nombre'] = $user['nombre'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_tipo'] = $user['tipo'];
        
        header('Location: account.php');
        exit();
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Alojamientos</title>
    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <h1><a href="index.php" style="color:white;text-decoration:none;">Alojamientos</a></h1>
            <ul class="nav-links">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="register.php">Registrarse</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <div class="form-container">
            <h2>Iniciar Sesión</h2>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
            <p>Usuario de admin: admin@holasoyadmin.com</p>
            <p>Contraseña: holi123</p>
            
            <p style="margin-top: 1rem; text-align: center;">
                ¿No tienes cuenta? <a href="register.php">Regístrate aquí</a>
            </p>
        </div>
    </main>
</body>
</html>