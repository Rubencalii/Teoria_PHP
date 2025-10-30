<?php
// Genera el mosaico numérico solicitado:
// Para n = 6 imprime:
// 1
// 22
// 333
// 4444
// 55555
// 666666
function mosaicoNumerico($n) {
    $n = (int)$n;
    if ($n <= 0) return '';
    $out = '';
    for ($i = 1; $i <= $n; $i++) {
        $out .= str_repeat((string)$i, $i) . PHP_EOL;
    }
    return $out;
}
// Ejemplo de uso
echo mosaicoNumerico(6);
?>