
<?php
// Función que devuelve la sumatoria de un array de números
function sumatoriaArray($array) {
	$suma = 0;
	foreach ($array as $num) {
		$suma += $num;
	}
	return $suma;
}

// Ejemplo de uso
$numeros = [3, 7, 2, 9, 4, 1];
$sumatoria = sumatoriaArray($numeros);
echo "La sumatoria es: $sumatoria";

