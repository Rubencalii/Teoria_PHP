<?php
// Ejercicio 20 - Factorial
function factorial(int $n): ?int {
	if ($n < 0) return null; // no definido para negativos
	$res = 1;
	for ($i = 2; $i <= $n; $i++) $res *= $i;
	return $res;
}

// Ejemplo
echo "5! = " . factorial(5) . PHP_EOL; // 120
