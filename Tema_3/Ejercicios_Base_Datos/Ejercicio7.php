<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $usuario_id = 1;
    $producto_id = 4;
    $cantidad = 3;
    
    echo "<h2>Simulacion de compra </h2>";
    
    $pdo->beginTransaction();
    
    $stmt = $pdo->prepare("SELECT stock, precio FROM productos WHERE id = ?");
    $stmt->execute([$producto_id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($producto && $producto['stock'] >= $cantidad) {
        $total = $producto['precio'] * $cantidad;
        
        $stmt = $pdo->prepare("INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)");
        $stmt->execute([$usuario_id, $total]);
        
        $stmt = $pdo->prepare("UPDATE productos SET stock = stock - ? WHERE id = ?");
        $stmt->execute([$cantidad, $producto_id]);
        
        $pdo->commit();
        echo "Compra echo, total: " . $total . "€";
    } else {
        $pdo->rollBack();
        echo "Stock insuficiente";
    }
    
} catch(PDOException $e) {
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
