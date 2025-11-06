<?php
// Ejercicio 19 - Eliminar vocales
function eliminarVocales(string $s): string {
	return str_replace(
		['a','e','i','o','u','A','E','I','O','U'],
		'',
		$s
	);
}

// Ejemplo
echo eliminarVocales("Hola Mundo") . PHP_EOL; // -> Hl Mnd
