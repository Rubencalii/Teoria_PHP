<?php
// Ejercicio 23 - Número Armstrong
function esArmstrong(int $n): bool {
	if ($n < 0) return false;
	$digitos = str_split((string) $n);
	$pot = count($digitos);
	$suma = 0;
	foreach ($digitos as $d) $suma += (int) $d ** $pot;
	return $suma === $n;
}

// Ejemplo
echo "153 -> " . (esArmstrong(153) ? 'Armstrong' : 'No Armstrong') . PHP_EOL;
