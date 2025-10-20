
<?php

function millasAKilometros($millas) {
    $kilometros = $millas * 1.60934;
    return $kilometros;
}

// Ejemplo de uso
$millas = 10;
$kilometros = millasAKilometros($millas);
echo "$millas millas son $kilometros kilómetros";