CREATE DATABASE alojamientos_db;
USE alojamientos_db;

-- Crear usuario
CREATE USER IF NOT EXISTS 'app_user'@'127.0.0.1' IDENTIFIED BY '123456';
GRANT SELECT, INSERT, UPDATE, DELETE ON alojamientos_db.* TO 'app_user'@'127.0.0.1';
FLUSH PRIVILEGES;

-- Tablas
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo ENUM('usuario', 'admin') DEFAULT 'usuario',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE alojamientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    ubicacion VARCHAR(200) NOT NULL,
    imagen VARCHAR(255),
    activo BOOLEAN DEFAULT TRUE,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuario_alojamientos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    alojamiento_id INT,
    fecha_seleccion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (alojamiento_id) REFERENCES alojamientos(id) ON DELETE CASCADE
);

-- Insertar usuario administrador
INSERT INTO usuarios (nombre, email, password, tipo) 
VALUES ('Administrador', 'admin@holasoyadmin.com', '$2y$10$7oVTnz.5/JPA6UygFjc4xuiyJ03CPXXrix.r5Z2H9w8MGr5gokexK', 'admin');

-- Insertar algunos alojamientos de ejemplo
INSERT INTO alojamientos (nombre, descripcion, precio, ubicacion, imagen) VALUES
('Casa bonita nita', 'Linda casa, con vista a uan ventana', 65.00, 'Morazan', 'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80'),
('Cabaña de araña', 'Es una cabaña con una araña', 80.00, 'Nuevo San Salvador', 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80'),
('Casota no muy bonita', '¿Qué importa si es fea? Es grande', 120.00, 'Ayutuxtepeque', 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80'),
('Casa', 'Es una casa', 95.00, 'en algun lugar', 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80');

UPDATE usuarios 
SET password = '$2y$10$7oVTnz.5/JPA6UygFjc4xuiyJ03CPXXrix.r5Z2H9w8MGr5gokexK' 
WHERE email = 'admin@holasoyadmin.com';

select * from usuarios;