<?php
//adquiere todos los alojamientos
function getAlojamientos() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM alojamientos WHERE activo = TRUE ORDER BY fecha_creacion DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Adquirir registro de alojamiento de la db
function getAlojamientosUsuario($usuario_id) {
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT a.*, ua.id as seleccion_id 
        FROM alojamientos a 
        INNER JOIN usuario_alojamientos ua ON a.id = ua.alojamiento_id 
        WHERE ua.usuario_id = ? 
        ORDER BY ua.fecha_seleccion DESC
    ");
    $stmt->execute([$usuario_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Aniadir alojamiento a la db
function agregarAlojamientoUsuario($usuario_id, $alojamiento_id) {
    global $pdo;
    
    // Verificar seleccion
    $stmt = $pdo->prepare("SELECT id FROM usuario_alojamientos WHERE usuario_id = ? AND alojamiento_id = ?");
    $stmt->execute([$usuario_id, $alojamiento_id]);
    
    if ($stmt->fetch()) {
        return false;
    }
    
    $stmt = $pdo->prepare("INSERT INTO usuario_alojamientos (usuario_id, alojamiento_id) VALUES (?, ?)");
    return $stmt->execute([$usuario_id, $alojamiento_id]);
}

//borra alojamineto registro de alojamineto de un usuario
function eliminarAlojamientoUsuario($seleccion_id, $usuario_id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM usuario_alojamientos WHERE id = ? AND usuario_id = ?");
    return $stmt->execute([$seleccion_id, $usuario_id]);
}

//Crea un alojamiento
function crearAlojamiento($nombre, $descripcion, $precio, $ubicacion, $imagen = '') {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO alojamientos (nombre, descripcion, precio, ubicacion, imagen) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$nombre, $descripcion, $precio, $ubicacion, $imagen]);
}

//Eliminar un alojamiento
function eliminarAlojamientoSistema($alojamiento_id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM usuario_alojamientos WHERE alojamiento_id = ?");
        $stmt->execute([$alojamiento_id]);
        
        $stmt = $pdo->prepare("DELETE FROM alojamientos WHERE id = ?");
        return $stmt->execute([$alojamiento_id]);
    } catch (PDOException $e) {
        error_log("Error eliminando alojamiento: " . $e->getMessage());
        return false;
    }
}
?>