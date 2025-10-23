
<?php
function comparar(array $a, array $b): array {
	$resultado = [];
	$max = max(count($a), count($b));
	for ($i = 0; $i < $max; $i++) {
		$resultado[] = (isset($a[$i], $b[$i]) && $a[$i] === $b[$i]);
	}
	return $resultado;
}

// Ejemplo de uso
$arr1 = [1, 2, 3];
$arr2 = [1, 2, 4];
$comparacion = comparar($arr1, $arr2);
var_export($comparacion);
?>
