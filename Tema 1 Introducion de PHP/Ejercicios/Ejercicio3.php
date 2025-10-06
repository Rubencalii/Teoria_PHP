<?php
// Ejercicio 3: Sistema de Navegación Dinámico (opcional)
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page = $_GET['page'] ?? 'inicio';

// Validar existencia de la página
if (!array_key_exists($page, $nav)) {
	echo '<div class="alert alert-warning">La página solicitada no existe. Mostrando inicio por defecto.</div>';
	$page = 'inicio';
}

// Simular contenido de páginas con más detalle y navegación activa
echo '<div class="card">';
echo '<div class="card-body">';
echo '<h2>' . htmlentities($nav[$page]) . '</h2>';

if ($page === 'inicio') {
	echo '<p>Bienvenido al sistema de navegación dinámico. Usa la barra para cambiar de sección.</p>';
} elseif ($page === 'acerca') {
	echo '<p>Este proyecto demuestra includes, navegación y validación con PHP puro.</p>';
} elseif ($page === 'contacto') {
	echo '<p>Puedes simular enviar un mensaje con un simple formulario HTML.</p>';
	echo '<form method="post" action="?page=contacto">';
	echo '<div class="mb-3"><label class="form-label">Nombre</label><input name="nombre" class="form-control"></div>';
	echo '<div class="mb-3"><label class="form-label">Mensaje</label><textarea name="mensaje" class="form-control"></textarea></div>';
	echo '<button class="btn btn-primary">Enviar</button>';
	echo '</form>';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$nombre = trim($_POST['nombre'] ?? '');
		$mensaje = trim($_POST['mensaje'] ?? '');
		if ($nombre === '' || $mensaje === '') {
			echo '<div class="alert alert-danger mt-3">Rellena todos los campos.</div>';
		} else {
			echo '<div class="alert alert-success mt-3">Gracias, ' . htmlentities($nombre) . '. Tu mensaje ha sido recibido (simulado).</div>';
		}
	}
} elseif ($page === 'servicios') {
	echo '<p>Servicios: Desarrollo web, Consultoría y Soporte.</p>';
}

echo '</div>';
echo '</div>';

require_once __DIR__ . '/includes/footer.php';

