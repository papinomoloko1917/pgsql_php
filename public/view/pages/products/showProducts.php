<h5>Список товаров:</h5>
<?php
if (!empty($products)):
    ?>
    <ol class="list-group list-group-numbered">
        <?php
            foreach ($products as $product):
                ?>
            <li class="list-group-item"><?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8') . ' ₽' ?></li>
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
