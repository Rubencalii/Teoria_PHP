<?php
function sumaDigitos($numeros) {
    $suma = 0;
    foreach ($numeros as $summando) {
        $suma += array_sum(str_split($summando));
    }
    return $suma;
}
// Ejemplo de uso
$numeros = [123, 456, 789];
$resultado = sumaDigitos($numeros);
echo "La suma de los dígitos es: $resultado"; // Salida: La suma de los dígitos es: 45
?>