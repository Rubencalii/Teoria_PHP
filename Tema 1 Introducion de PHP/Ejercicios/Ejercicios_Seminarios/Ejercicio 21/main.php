<?php
// Ejercicio 21 - Invertir cadena
function invertirCadena(string $s): string {
	return strrev($s);
}

// Ejemplo
echo invertirCadena('hola') . PHP_EOL; // aloh
