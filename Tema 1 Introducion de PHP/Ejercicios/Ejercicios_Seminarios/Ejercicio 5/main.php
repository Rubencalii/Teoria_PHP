<?php
function ocurrenciasPalabra($texto, $palabra) {
    // Convertir todo a minúsculas para una comparación insensible a mayúsculas/minúsculas
    $texto = strtolower($texto);
    $palabra = strtolower($palabra);
    
    // Dividir el texto en palabras
    $palabras = str_word_count($texto, 1);
    
    // Contar las ocurrencias de la palabra
    $contador = 0;
    foreach ($palabras as $p) {
        if ($p === $palabra) {
            $contador++;
        }
    }
    
    return $contador;
}   
// Ejemplo de uso
$texto = "PHP es un lenguaje de programación. Me gusta programar en PHP porque PHP es muy versátil.";
$palabra = "PHP";
$ocurrencias = ocurrenciasPalabra($texto, $palabra);
echo "La palabra '$palabra' aparece $ocurrencias veces en el texto.";
?>