<?php
if (!isset($siteTitle)) $siteTitle = 'Sitio';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlentities($siteTitle); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="?page=inicio"><?php echo htmlentities($siteTitle); ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <?php foreach($nav as $key => $label): ?>
            <?php $active = (isset($_GET['page']) && $_GET['page'] === $key) || (!isset($_GET['page']) && $key === 'inicio'); ?>
            <li class="nav-item">
              <a class="nav-link <?php echo $active ? 'active' : ''; ?>" href="?page=<?php echo $key; ?>"><?php echo htmlentities($label); ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container py-4">
