CREATE DATABASE pedidos_db;

CREATE USER 'pedidos-userDB'@'localhost' IDENTIFIED BY '123456';
GRANT SELECT, INSERT, UPDATE, DELETE,
       CREATE, ALTER, INDEX, DROP
ON pedidos_db.* TO 'pedidos-userDB'@'localhost';
GRANT ALL PRIVILEGES ON pedidos_db.* TO 'pedidos-userDB'@'localhost';
FLUSH PRIVILEGES;
