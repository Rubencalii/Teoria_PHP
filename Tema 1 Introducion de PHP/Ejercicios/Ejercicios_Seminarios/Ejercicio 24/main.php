<?php
// Ejercicio 24 - Calculadora de descuentos con constantes
const DESCUENTO_ESTUDIANTE = 0.15;
const DESCUENTO_JUBILADO = 0.20;
const DESCUENTO_VIP = 0.25;

function calcularPrecioFinal(float $precio, string $tipoCliente): float {
	$tipo = strtolower(trim($tipoCliente));
	$descuento = match ($tipo) {
		'estudiante' => DESCUENTO_ESTUDIANTE,
		'jubilado' => DESCUENTO_JUBILADO,
		'vip' => DESCUENTO_VIP,
		default => 0.0,
	};
	return $precio * (1 - $descuento);
}

// Ejemplo
echo "Precio final (100, 'estudiante') -> " . calcularPrecioFinal(100, 'estudiante') . PHP_EOL; // 85
