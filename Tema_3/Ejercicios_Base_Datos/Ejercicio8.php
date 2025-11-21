<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>A. Productos con bajo stock (menor a 50)</h2>";
    $stmt = $pdo->query("SELECT nombre, stock FROM productos WHERE stock < 50 ORDER BY stock ASC");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nombre'] . " - Stock: " . $row['stock'] . "<br>";
    }
    
    echo "<h2>B. Total de productos por categoría</h2>";
    $stmt = $pdo->query("SELECT c.nombre AS categoria, COUNT(p.id) AS total 
                         FROM categorias c 
                         LEFT JOIN productos p ON c.id = p.categoria_id 
                         GROUP BY c.id");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['categoria'] . ": " . $row['total'] . " productos<br>";
    }
    
    echo "<h2>C. Valor total del inventario por categoría</h2>";
    $stmt = $pdo->query("SELECT c.nombre AS categoria, SUM(p.precio * p.stock) AS valor_total 
                         FROM categorias c 
                         JOIN productos p ON c.id = p.categoria_id 
                         GROUP BY c.id");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['categoria'] . ": " . number_format($row['valor_total'], 2) . "€<br>";
    }
    
    echo "<h2>D. Precio promedio por categoría</h2>";
    $stmt = $pdo->query("SELECT c.nombre AS categoria, AVG(p.precio) AS precio_promedio 
                         FROM categorias c 
                         JOIN productos p ON c.id = p.categoria_id 
                         GROUP BY c.id");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['categoria'] . ": " . number_format($row['precio_promedio'], 2) . "€<br>";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
