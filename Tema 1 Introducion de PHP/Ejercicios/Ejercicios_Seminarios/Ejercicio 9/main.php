<?php
function maximoDivisorComun($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

// Ejemplo de uso
$num1 = 48;
$num2 = 18;
$resultado = maximoDivisorComun($num1, $num2);
echo "El máximo divisor común de $num1 y $num2 es: $resultado";
?>  
