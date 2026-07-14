<?php
$targetPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$navItems = [
    'Домашняя страница' => '/',
    'Тесты' => '/tests'
];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <main>
        <header>
            <?php require APP_PATH . '/public/components/navbar.php' ?>
        </header>
        <div class="container">
            <?php
            /**
             * @var string $content
             */
            ?>
            <?= $content ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </main>
</body>

</html>