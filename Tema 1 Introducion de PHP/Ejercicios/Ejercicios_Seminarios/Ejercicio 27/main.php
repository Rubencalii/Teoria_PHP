<?php
// Ejercicio 27 - Acceso seguro a propiedades con nullsafe operator
function obtenerCodigoPostal(object $usuario): string {
	// Utilizamos el operador nullsafe (?->) sobre objetos
	$cp = $usuario->direccion?->codigoPostal ?? null;
	if ($cp === null) return "Código postal no disponible";
	return "Código postal: $cp";
}

// Ejemplo: simulamos el usuario con stdClass
$usuario = (object) [
	'nombre' => 'Ana',
	'direccion' => (object) [
		'calle' => 'Gran Vía',
		'ciudad' => 'Madrid',
		// 'codigoPostal' => '28013' // intente activar para ver el otro caso
	]
];

echo obtenerCodigoPostal($usuario) . PHP_EOL;
