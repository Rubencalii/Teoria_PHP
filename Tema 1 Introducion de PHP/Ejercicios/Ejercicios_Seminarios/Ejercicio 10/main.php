<?php
function fibonacci($n) {
    if ($n <= 0) {
        return [];
    } elseif ($n == 1) {
        return [0];
    } elseif ($n == 2) {
        return [0, 1];
    }

    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}
// Ejemplo de uso
$numeroTerminos = 10;
$secuenciaFibonacci = fibonacci($numeroTerminos);
echo "Los primeros $numeroTerminos términos de la secuencia de Fibonacci son: " .   
implode(", ", $secuenciaFibonacci);
?>
                    