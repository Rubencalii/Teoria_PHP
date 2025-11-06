<?php
// Ejercicio 22 - Número perfecto
function esPerfecto(int $n): bool {
	if ($n <= 1) return false;
	$suma = 1; // 1 siempre es divisor propio
	$lim = (int) ($n / 2);
	for ($i = 2; $i <= $lim; $i++) {
		if ($n % $i === 0) $suma += $i;
	}
	return $suma === $n;
}

// Ejemplo
echo "6 -> " . (esPerfecto(6) ? 'perfecto' : 'no perfecto') . PHP_EOL; // perfecto
