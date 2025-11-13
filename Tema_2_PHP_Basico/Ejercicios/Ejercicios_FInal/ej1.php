<?php
    function calcular($numero1, $numero2, $operacion) {
        return match ($operacion) {
            'suma' => $numero1 + $numero2,
            'resta' => $numero1 - $numero2,
            'multiplicacion' => $numero1 * $numero2,
            'division' => $numero2 != 0 ? $numero1 / $numero2 : 'Error: División por cero',
            'potencia' => pow ($numero1, $numero2),
            'raiz' => sqrt ($numero1),
            'modulo' => $numero1 % $numero2,
            default => 'Operación no válida',
            };
        }
    // Ejemplos de uso
    echo calcular(10, 5, 'suma') . "\n";            // 15
    echo calcular(10, 5, 'resta') . "\n";          // 5
    echo calcular(10, 5, 'multiplicacion') . "\n"; // 50
    echo calcular(10, 5, 'division') . "\n";       // 2
    echo calcular(2, 3, 'potencia') . "\n";        // 8
    echo calcular(16, 0, 'raiz') . "\n";          // 4
    echo calcular(10, 3, 'modulo') . "\n";      // 1
    echo calcular(10, 0, 'division') . "\n";       // Error: División por cero
    echo calcular(10, 5, 'invalida') . "\n";      // Operación no válida
?>