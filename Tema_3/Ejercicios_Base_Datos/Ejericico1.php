<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS tienda_frutas");
    $pdo->exec("USE tienda_frutas");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS categorias (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL,
        descripcion TEXT
    )");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        categoria_id INT,
        precio DECIMAL(10, 2) NOT NULL,
        stock INT DEFAULT 0,
        activo TINYINT DEFAULT 1,
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
    )");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
        contrasena VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE
    )");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS pedidos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario_id INT,
        fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        total DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    )");
    
    echo "Base de datos y tablas creadas";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}