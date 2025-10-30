
<?php 
    function filtrarNumerosPares(array $array) {
        return array_filter($array, fn($n) => $n % 2 === 0);
    
    }

// Ejemplo 
    $array = [1, 2, 3, 4, 5, 6];
    $pares = filtrarNumerosPares($array);
    echo "Los numeros pares son: " . implode (", ", $pares);

?>