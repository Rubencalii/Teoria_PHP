<?php
// Ejercicio 18 - Número primo
function esPrimo(int $n): bool {
	if ($n <= 1) return false;
	if ($n <= 3) return true;
	if ($n % 2 == 0) return false;
	$limite = (int) sqrt($n);
	for ($i = 3; $i <= $limite; $i += 2) {
		if ($n % $i === 0) return false;
	}
	return true;
}

// Ejemplo de uso
$nums = [1, 2, 3, 4, 17, 20, 97];
foreach ($nums as $v) {
	echo "$v -> " . (esPrimo($v) ? 'primo' : 'no primo') . PHP_EOL;
}

