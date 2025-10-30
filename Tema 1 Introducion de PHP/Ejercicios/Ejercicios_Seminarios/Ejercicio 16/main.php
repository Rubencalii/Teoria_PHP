
<?php
// Calcula el producto de todos los elementos de un array
function productoArray(array $arr) {
    // Convención: producto vacío = 1
    $prod = 1;
    foreach ($arr as $v) {
        $prod *= $v;
    }
    return $prod;
}

// Ejemplo de uso
$arr = [2, 3, 4];
echo "El producto es: " . productoArray($arr);
?>