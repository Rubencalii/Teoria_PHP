<?php
// Ejercicio 28 - Calculadora interactiva (usa readline si está disponible, si no simula entrada)
function calcular($a, $b, string $op) {
	if (!is_numeric($a) || !is_numeric($b)) return "Entrada no numérica";
	$a = $a + 0; $b = $b + 0; // forzar tipos numéricos
	return match ($op) {
		'+' => "$a + $b = " . ($a + $b),
		'-' => "$a - $b = " . ($a - $b),
		'*' => "$a * $b = " . ($a * $b),
		'/' => ($b == 0) ? "Error: división por cero" : "$a / $b = " . ($a / $b),
		default => "Operación no soportada",
	};
}

if (function_exists('readline')) {
	$a = readline('Introduce el primer número: ');
	$b = readline('Introduce el segundo número: ');
	$op = readline('Introduce la operación (+, -, *, /): ');
	echo calcular($a, $b, $op) . PHP_EOL;
} else {
	// Simulación
	$a = 10; $b = 5; $op = '*';
	echo "Simulado: Introduce el primer número: $a\n";
	echo "Simulado: Introduce el segundo número: $b\n";
	echo "Simulado: Operación: $op\n";
	echo calcular($a, $b, $op) . PHP_EOL;
}

