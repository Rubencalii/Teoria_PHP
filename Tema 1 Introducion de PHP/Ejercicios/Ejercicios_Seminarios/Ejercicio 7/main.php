<?php
function primeraMayuscula($cadena) {
    if (strlen($cadena) === 0) {
        return $cadena;
    }
    $primeraLetra = strtoupper($cadena[0]);
    $restoCadena = substr($cadena, 1);
    return $primeraLetra . $restoCadena;
}
// Ejemplo de uso
$texto = "hola mundo";
$textoConPrimeraMayuscula = primeraMayuscula($texto);
echo $textoConPrimeraMayuscula; // Salida: "Hola mundo"
?>