<?php
    // Procesador_texto.php
    function analizarTexto($texto) {
        $texto = strtolower($texto);
        $texto = preg_replace("/[^\w\s]/u", "", $texto);
        $palabras = preg_split("/\s+/", $texto, -1, PREG_SPLIT_NO_EMPTY);
        
        // Contar palabras
        $conteoPalabras = array_count_values($palabras);

        // Frecuencia de caracteres
        $caracteres = str_split(str_replace(" ", "", $texto));
        $frecuenciaCaracteres = array_count_values($caracteres);

        // Longitud promedio
        $longitudes = array_map('strlen', $palabras);
        $longitudPromedio = count($longitudes) ? array_sum($longitudes) / count($longitudes) : 0;       
        return [
            'conteo_palabras' => $conteoPalabras,
            'frecuencia_caracteres' => $frecuenciaCaracteres,
            'longitud_promedio' => $longitudPromedio
        ];

        // Identificar n-gramas(secuencuas de n palabras) y detectar frases comunes en el texto
        function obtenerNGramas($texto, $n) {
            $texto = strtolower($texto);
            $texto = preg_replace("/[^\w\s]/u", "", $texto);
            $palabras = preg_split("/\s+/", $texto, -1, PREG_SPLIT_NO_EMPTY);
            $ngrams = [];
            for ($i = 0; $i <= count($palabras) - $n; $i++) {
                $ngram = implode(" ", array_slice($palabras, $i, $n));
                if (isset($ngrams[$ngram])) {
                    $ngrams[$ngram]++;
                } else {
                    $ngrams[$ngram] = 1;
                }
            }
            return $ngrams;
        }
        function detectarFrasesComunes($texto) {
            $ngrams = obtenerNGramas($texto, 3);
            $frasesComunes = array_filter($ngrams, fn($count) => $count > 1);
            return $frasesComunes;
        }
        // Ejemplos de uso
        $textoEjemplo = "Este es un ejemplo de texto. Este texto es solo un ejemplo.";
        $analisis = analizarTexto($textoEjemplo);
        print_r($analisis);
        $ngrams = obtenerNGramas($textoEjemplo, 2);
        print_r($ngrams);
        $frasesComunes = detectarFrasesComunes($textoEjemplo);
        print_r($frasesComunes);
        }
?>