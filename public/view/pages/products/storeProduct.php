<h5>Добавление товара</h5>
<form action="/storeProduct" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input name="title" type="text" class="form-control" id="title" aria-describedby="title" value="<?= $name ?? '' ?>">
        <?php if (isset($errors['title'])): ?>
        <div id="title" class="form-text" style="color: red;"><?= $errors['title'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <input name="description" type="text" class="form-control" id="description" aria-describedby="description" value="<?= $description ?? '' ?>">
        <?php if (isset($errors['description'])): ?>
        <div id="description" class="form-text" style="color: red;"><?= $errors['description'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена</label>
        <input name="price" type="text" class="form-control" id="price" aria-describedby="price" value="<?= $price ?? '' ?>">
        <?php if (isset($errors['price'])): ?>
        <div id="price" class="form-text" style="color: red;"><?= $errors['price'] ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
    <a type="button" href="/showProducts" class="btn btn-primary">Назад к товарам</a>
</form>
