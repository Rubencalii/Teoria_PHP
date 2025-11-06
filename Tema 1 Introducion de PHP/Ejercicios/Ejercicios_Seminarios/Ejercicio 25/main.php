<?php
// Ejercicio 25 - Clasificador de notas con match (PHP 8)
function clasificarNota(int $nota): string {
	if ($nota < 0 || $nota > 10) return 'Nota fuera de rango';
	return match (true) {
		$nota >= 9 => 'Sobresaliente',
		$nota >= 7 => 'Notable',
		$nota >= 5 => 'Aprobado',
		default => 'Suspenso',
	};
}

// Ejemplo
echo "8 -> " . clasificarNota(8) . PHP_EOL; // Notable

