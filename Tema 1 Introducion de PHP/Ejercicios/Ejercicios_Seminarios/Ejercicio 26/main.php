<?php
// Ejercicio 26 - Validador de datos con operador null coalescing
function validarDatos(array $datos): array {
	return [
		'nombre' => $datos['nombre'] ?? 'Anónimo',
		'email'  => $datos['email'] ?? 'sin-email@example.com',
		'edad'   => $datos['edad'] ?? 18,
		'ciudad' => $datos['ciudad'] ?? 'Desconocida',
	];
}

// Ejemplo
$entrada = ['nombre' => 'Juan', 'edad' => 25];
print_r(validarDatos($entrada));
