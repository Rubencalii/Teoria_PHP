<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>Productos y su categoria</h2>";
    $stmt = $pdo->query("SELECT p.nombre AS producto, p.precio, c.nombre AS categoria 
                         FROM productos p 
                         INNER JOIN categorias c ON p.categoria_id = c.id");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['producto'] . " - " . $row['precio'] . "€ - " . $row['categoria'] . "<br>";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
