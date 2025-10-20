
<?php
function numeroCapicua($numero) {
    $numeroStr = strval($numero);
    $longitud = strlen($numeroStr);
    for ($i = 0; $i < $longitud / 2; $i++) {
        if ($numeroStr[$i] !== $numeroStr[$longitud - 1 - $i]) {
            return false;
        }
    }
    return true;
}