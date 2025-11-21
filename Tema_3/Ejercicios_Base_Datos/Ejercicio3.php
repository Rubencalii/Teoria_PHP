<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>A. Productos ordenados por precio (menor a mayor)</h2>";
    $stmt = $pdo->query("SELECT * FROM productos ORDER BY precio ASC");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nombre'] . " - " . $row['precio'] . "€<br>";
    }
    
    echo "<h2>B. Productos de categoría 1</h2>";
    $stmt = $pdo->query("SELECT * FROM productos WHERE categoria_id = 1");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nombre'] . "<br>";
    }
    
    echo "<h2>C. Productos con stock menor a 20</h2>";
    $stmt = $pdo->query("SELECT * FROM productos WHERE stock < 20");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nombre'] . " - Stock: " . $row['stock'] . "<br>";
    }
    
    echo "<h2>D. Total de productos</h2>";
    $stmt = $pdo->query("SELECT COUNT(*) AS total_productos FROM productos");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Total: " . $row['total_productos'];
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
