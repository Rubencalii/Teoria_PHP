<?php
// Suma los dígitos de un número (ej: 245 -> 2+4+5 = 11)
function sumaDigitosNumero($n) {
    $n = abs((int)$n);
    $suma = 0;
    foreach (str_split((string)$n) as $d) {
        $suma += (int)$d;
    }
    return $suma;
}
// Ejemplo de uso
$numero = 245;
echo "La suma de los dígitos de $numero es: " . sumaDigitosNumero($numero);
?>