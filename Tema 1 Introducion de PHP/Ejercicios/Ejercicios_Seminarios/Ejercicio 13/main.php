<?php
// Convierte una cadena Emmet simple en etiqueta HTML con clase e id
function ToHtml($emmet) {
	$pattern = '/^(\w+)(?:\.([\w-]+))?(?:#([\w-]+))?$/';
	if (preg_match($pattern, $emmet, $matches)) {
		$tag = $matches[1];
		$class = isset($matches[2]) ? $matches[2] : '';
		$id = isset($matches[3]) ? $matches[3] : '';
		$attrs = '';
		if ($class) {
			$attrs .= ' class="' . $class . '"';
		}
		if ($id) {
			$attrs .= ' id="' . $id . '"';
		}
		return "<$tag$attrs></$tag>";
	}
	return '';
}

// Ejemplos de uso
echo ToHtml('a') . "\n"; 
echo ToHtml('div.oferta') . "\n"; 
echo ToHtml('div.coche#VWPolo') . "\n"; 
?>
