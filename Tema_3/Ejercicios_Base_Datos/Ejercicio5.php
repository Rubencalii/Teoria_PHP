<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>A. Aumentar precio 10% a categoría 2</h2>";
    $stmt = $pdo->exec("UPDATE productos SET precio = precio * 1.10 WHERE categoria_id = 2");
    echo "Productos actualizados: " . $stmt . "<br>";
    
    echo "<h2>B. Reducir stock del producto 1 en 5 unidades</h2>";
    $stmt = $pdo->exec("UPDATE productos SET stock = stock - 5 WHERE id = 1");
    echo "Productos actualizados: " . $stmt . "<br>";
    
    echo "<h2>C. Reducir stock sin permitir negativos</h2>";
    $stmt = $pdo->exec("UPDATE productos SET stock = GREATEST(stock - 5, 0) WHERE id = 1");
    echo "Productos actualizados: " . $stmt . "<br>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
