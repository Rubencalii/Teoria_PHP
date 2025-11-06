<?php
// Ejercicio 29 - Conversor de temperaturas con constantes mágicas y constantes de fórmulas
const FORMULA_C_TO_F = '(C × 9/5) + 32';
const FORMULA_C_TO_K = 'C + 273.15';
const FORMULA_F_TO_C = '(F - 32) × 5/9';
const FORMULA_K_TO_C = 'K - 273.15';

function convertirTemperatura(float $valor, string $origen, string $destino): float {
	$o = strtolower($origen);
	$d = strtolower($destino);
	// Depuración mínima
	echo __FUNCTION__ . " (line " . __LINE__ . ") - convertir de $o a $d usando valores: $valor\n";

	// Normalizamos todo a Celsius como paso intermedio
	$c = match ($o) {
		'celsius', 'c' => $valor,
		'fahrenheit', 'f' => ($valor - 32) * 5 / 9,
		'kelvin', 'k' => $valor - 273.15,
		default => throw new InvalidArgumentException('Unidad origen no soportada')
	};

	return match ($d) {
		'celsius', 'c' => $c,
		'fahrenheit', 'f' => ($c * 9 / 5) + 32,
		'kelvin', 'k' => $c + 273.15,
		default => throw new InvalidArgumentException('Unidad destino no soportada')
	};
}

// Ejemplo
echo "25 C a F -> " . convertirTemperatura(25, 'celsius', 'fahrenheit') . PHP_EOL; // 77

