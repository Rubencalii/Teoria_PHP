<?php
$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("INSERT INTO categorias (nombre, descripcion) VALUES
        ('Citricos', 'Frutas ricas en vitamina C con un sabor acido caracteristico.'),
        ('Frutas Rojas', 'Frutas de color rojo o morado, ricas en antioxidantes.'),
        ('Tropicales', 'Frutas exoticas cultivadas en climas calidos.')");
    
    $pdo->exec("INSERT INTO productos (nombre, categoria_id, precio, stock, activo) VALUES
        ('Naranja', 1, 1.50, 100, 1),
        ('Limon', 1, 1.20, 80, 1),
        ('Mandarina', 1, 1.80, 120, 1),
        ('Fresa', 2, 4.50, 50, 1),
        ('Frambuesa', 2, 5.50, 40, 1),
        ('Arandano', 2, 6.00, 60, 1),
        ('Mango', 3, 2.50, 30, 1),
        ('Pina', 3, 3.00, 25, 1),
        ('Maracuya', 3, 2.80, 35, 1),
        ('Kiwi', 3, 2.10, 70, 1)");
    
    echo "Datos corectamente";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
