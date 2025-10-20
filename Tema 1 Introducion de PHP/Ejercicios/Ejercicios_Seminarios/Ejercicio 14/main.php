<?php
function mosaicoNumerico($filas , $columnas) {
    $mosaico = " ";
    for ( $i = 0; $i < $filas; $i++) {
        for ( $j = 0; $j < $columnas; $j++) {
            $mosaico .= rand(0, 9) . " ";
        }
        $mosaico .= "\n";
    }
    return $mosaico;
}