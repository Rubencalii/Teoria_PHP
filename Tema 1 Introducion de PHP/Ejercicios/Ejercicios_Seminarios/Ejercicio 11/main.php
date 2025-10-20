<?php
function numerosPrimosRelativos($num1, $num2) {
    // Función para calcular el máximo común divisor (MCD)
    function mcd($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    // Si el MCD es 1, los números son primos relativos
    return mcd($num1, $num2) === 1;
}
// Ejemplo de uso
$numero1 = 15;
$numero2 = 28;
if (numerosPrimosRelativos($numero1, $numero2)) {
    echo "$numero1 y $numero2 son números primos relativos.";
} else {
    echo "$numero1 y $numero2 no son números primos relativos.";
}
?>