<?php
function ocurrenciasSubcadena($cadena, $subcadena){
    $contador = 0;
    $longitudSubcadena = strlen($subcadena);
    $longitudcadena = strlen ($cadena);
    for ($i = 0; $i <= $longitudcadena - $longitudSubcadena; $i++){
        if (substr($cadena, $i, $longitudSubcadena) === $subcadena){
            $contador++;
        }
    }
    return $contador;   
}
// Ejemplo de uso
$cadena = "abababab";
$subcadena = "aba";        
$ocurrencias = ocurrenciasSubcadena($cadena, $subcadena);
echo "La subcadena '$subcadena' aparece $ocurrencias veces en la cadena '$cadena'.";
?>