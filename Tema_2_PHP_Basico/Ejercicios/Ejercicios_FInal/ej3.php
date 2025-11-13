<?php
    $productos = [
        ["id" => 1, "nombre" => "Laptop", "precio" =>  899.99, "stock" => 10],        
        ["id" => 2, "nombre" => "Smartphone", "precio" => 499.99, "stock" => 25],
        ["id" => 3, "nombre" => "Tablet", "precio" => 299.99, "stock" => 15],
        ["id" => 4, "nombre" => "Monitor", "precio" => 199.99, "stock" => 8],
        ["id" => 5, "nombre" => "Teclado", "precio" => 49.99, "stock" => 50],
    ];

    // Filtrar productos con precio mayor a 400
    $caros = array_filter($productos, fn($producto) => $producto['precio'] > 400);

    // Ordenar productos por precio ascendente
    usort($productos, fn($a, $b) => $a['precio'] <=> $b['precio']);

    // Calcular el valor total del inventario
    $valorTotal = array_reduce($productos, fn($total, $producto) => $total + ($producto['precio'] * $producto['stock']), 0);

    // Busqueda de un producto por Nombre usando coincidencia parciales
    function buscarProductoPorNombre($productos, $nombre) {
        return array_filter($productos, fn($producto) => stripos($producto['nombre'], $nombre) !== false);
    }
    // Ejemplos de uso
    echo "Productos con precio mayor a 400:\n";
    print_r($caros);
    echo "\nProductos ordenados por precio:\n";
    print_r($productos);
    echo "\nValor total del inventario: $" . number_format($valorTotal, 2) . "\n";
    echo "\nBúsqueda de productos que contienen 'top':\n";
    $resultadosBusqueda = buscarProductoPorNombre($productos, 'top');
    print_r($resultadosBusqueda);

?>