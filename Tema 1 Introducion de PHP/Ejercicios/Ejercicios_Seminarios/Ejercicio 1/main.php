<?php
// Función que devuelve el número máximo de un array de números
function maximoArray($array) {
	if (empty($array)) {
		return null; // O lanzar una excepción si se prefiere
	}
	$max = $array[0];
	foreach ($array as $num) {
		if ($num > $max) {
			$max = $num;
		}
	}
	return $max;
}

// Ejemplo
$numeros = [3, 7, 2, 9, 4, 1];
$maximo = maximoArray($numeros);
echo "El número máximo es: $maximo";
?>
