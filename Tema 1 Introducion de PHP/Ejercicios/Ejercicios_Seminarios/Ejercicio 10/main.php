<?php
// Devuelve el término n-ésimo de Fibonacci (definición: F(0)=0, F(1)=1)
function fibonacciTerm($n) {
    $n = (int)$n;
    if ($n < 0) return null;
    if ($n === 0) return 0;
    if ($n === 1) return 1;
    $a = 0; $b = 1;
    for ($i = 2; $i <= $n; $i++) {
        $tmp = $a + $b;
        $a = $b;
        $b = $tmp;
    }
    return $b;
}
// Ejemplo de uso
$numero = 10;
echo "El término Fibonacci número $numero es: " . fibonacciTerm($numero);
?>
