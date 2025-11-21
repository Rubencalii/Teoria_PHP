<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>Desactivar producto con id 3</h2>";
    $stmt = $pdo->exec("UPDATE productos SET activo = 0 WHERE id = 3");
    echo "Productos desactivados: " . $stmt . "<br>";
    
    echo "<h2>Productos activos</h2>";
    $stmt = $pdo->query("SELECT * FROM productos WHERE activo = 1");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nombre'] . "<br>";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
