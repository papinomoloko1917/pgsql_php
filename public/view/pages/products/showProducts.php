<h5>Список товаров:</h5>
<?php
if (!empty($products)):
    ?>
    <ol class="list-group list-group-numbered">
        <?php
        foreach ($products as $product):
            ?>
            <div class="row align-items-center mt-3">
                <div class="col">
                    <li class="list-group-item flex-grow-1">
                        <?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8') . ' ₽' ?>
                    </li>
                </div>
                <div class="col-auto">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="/editProductIndex?id=<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?>" type="button"
                            class="btn btn-success">Редактировать</a>
                        <form action="/deleteProduct" class="d-inline-block" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8') ?>" id="id">
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        endforeach;
    ?>
    </ol>
<?php else:
    ?>
    <h5>Список товаров пуст</h5>
    <?php
endif;
?>
<a class="btn btn-primary mt-5" href="/storeProduct" role="button">Добавить товар</a>

<style>
    .btn-group > form {
    margin: 0;
    display: inline-block;
}
.btn-group > form > .btn {
    border-radius: 0;
}
</style>
