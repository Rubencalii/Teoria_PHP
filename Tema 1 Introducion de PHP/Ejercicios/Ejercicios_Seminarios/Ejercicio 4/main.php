
<?php
function palindromo($cadena) {
    // Eliminar espacios y convertir a minúsculas
    $cadenaLimpia = strtolower(str_replace(' ', '', $cadena));
    // Comparar la cadena con su reverso
    return $cadenaLimpia === strrev($cadenaLimpia);
}
// Ejemplo de uso
$texto = "Anita lava la tina";
if (palindromo($texto)) {
    echo "\"$texto\" es un palíndromo.";
} else {
    echo "\"$texto\" no es un palíndromo.";
}
?>
