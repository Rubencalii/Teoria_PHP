<?php
// Cuenta cuántas veces aparece una letra en un texto (insensible a mayúsculas y multibyte)
function contarLetra($texto, $letra) {
    $texto = mb_strtolower($texto, 'UTF-8');
    $letra = mb_strtolower($letra, 'UTF-8');
    // Separar en caracteres multibyte
    $chars = preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY);
    $count = 0;
    foreach ($chars as $c) {
        if ($c === $letra) $count++;
    }
    return $count;
}
// Ejemplo de uso
$texto = "PHP es un lenguaje de programación. Me gusta programar en PHP porque PHP es muy versátil.";
$letra = "p";
$ocurrencias = contarLetra($texto, $letra);
echo "La letra '$letra' aparece $ocurrencias veces en el texto.";
?>