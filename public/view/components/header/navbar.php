<?php
$navmenu = [
  'Главная' => '/',
  'Товары' => '/showProducts',
  'О нас' => '/about'
];
$currentPath = $currentPath ?? '/';
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= $navmenu['Главная'] ?>">Мой MVP проект</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav nav-underline">
        <?php foreach ($navmenu as $key => $value):?>
            <li class="nav-item">
              <a class="nav-link <?= ($currentPath === $value) ? 'active' : '' ?>" <?= ($currentPath === $value) ? 'aria-current="page"' : '' ?> href="<?= $value ?>"><?= $key ?></a>
            </li>
        <?php
        endforeach
?>
      </ul>
      <div class="ms-auto">
        <a href="/register" class="btn btn-sm btn-outline-dark">Регистрация</a>
      </div>
    </div>
  </div>
</nav>
