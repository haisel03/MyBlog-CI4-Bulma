<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ." | MyBlog"?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <?= $this->renderSection('css') ?>
</head>
<body>
  <?= $this->include('Front/layout/header') ?>
  <?= $this->renderSection('content') ?>
  <?= $this->include('Front/layout/footer') ?>
</body>
</html>