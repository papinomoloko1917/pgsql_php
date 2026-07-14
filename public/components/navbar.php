<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Портал тестирования</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <?php foreach ($navItems as $navTitle => $navPath): ?>
          <li class="nav-item">
            <a class="nav-link <?= $targetPath === $navPath ? 'active' : '' ?>" aria-current="page" href="<?= htmlspecialchars($navPath, ENT_QUOTES,'UTF-8') ?>"><?= htmlspecialchars($navTitle, ENT_QUOTES, 'UTF-8') ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
</nav>