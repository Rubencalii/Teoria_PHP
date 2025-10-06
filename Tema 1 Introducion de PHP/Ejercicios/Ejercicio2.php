<?php
// Ejercicio 2: Sitio Web Modular con includes
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/header.php';

$page = $_GET['page'] ?? 'inicio';

// Lista de páginas válidas
$valid_pages = array_keys($nav);

if (!in_array($page, $valid_pages)) {
    http_response_code(404);
    echo '<div class="alert alert-danger">Página no encontrada.</div>';
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

// Contenido simple por página
switch($page) {
    case 'inicio':
        echo '<h1>Bienvenido</h1><p>Esta es la página de inicio del sitio modular.</p>';
        break;
    case 'acerca':
        echo '<h1>Acerca</h1><p>Información sobre este sitio y su autor.</p>';
        break;
    case 'contacto':
        echo '<h1>Contacto</h1><p>Formulario de contacto (simulado).</p>';
        break;
    case 'servicios':
        echo '<h1>Servicios</h1><p>Listado de servicios ofrecidos.</p>';
        break;
}

require_once __DIR__ . '/includes/footer.php';
