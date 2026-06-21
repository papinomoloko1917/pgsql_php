<h5>Редактирование товара</h5>
<form action="/updateProduct" method="POST">
    <input name="id" type="hidden" class="form-control" id="id" aria-describedby="id" value="<?= htmlspecialchars($product['id'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input name="title" type="text" class="form-control" id="title" aria-describedby="title" value="<?= htmlspecialchars($product['title'] ?? '', ENT_QUOTES, 'UTF-8')   ?>">
        <?php if (isset($errors['title'])): ?>
        <div id="title" class="form-text" style="color: red;"><?= htmlspecialchars($errors['title'], ENT_QUOTES, 'UTF-8')  ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание</label>
        <input name="description" type="text" class="form-control" id="description" aria-describedby="description" value="<?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8')  ?>">
        <?php if (isset($errors['description'])): ?>
        <div id="description" class="form-text" style="color: red;"><?= htmlspecialchars($errors['description'], ENT_QUOTES, 'UTF-8')  ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Цена</label>
        <input name="price" type="text" class="form-control" id="price" aria-describedby="price" value="<?= htmlspecialchars($product['price'] ?? '', ENT_QUOTES, 'UTF-8')  ?>">
        <?php if (isset($errors['price'])): ?>
        <div id="price" class="form-text" style="color: red;"><?= htmlspecialchars($errors['price'], ENT_QUOTES, 'UTF-8')  ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    <a type="button" href="/showProducts" class="btn btn-primary">Назад к товарам</a>
</form>
