<?php
// Pone en mayúscula la primera letra de cada palabra (soporte multibyte)
function capitalizarPalabras($texto) {
    return mb_convert_case($texto, MB_CASE_TITLE, "UTF-8");
}
// Ejemplo de uso
$texto = "hola mundo";
echo capitalizarPalabras($texto); // Salida: "Hola Mundo"
?>