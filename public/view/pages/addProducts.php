<form action="/add_product" method="POST">
    <div class="mb-3">
        <label for="nameProduct" class="form-label">Название товара</label>
        <input name="name" type="text" class="form-control" id="nameProduct">
        <label for="priceProduct" class="form-label">Цена</label>
        <input name="price" type="text" class="form-control" id="priceProduct">
        <label for="stockProduct" class="form-label">Количество</label>
        <input name="stock" type="text" class="form-control" id="stockProduct">
    </div>
    <button type="submit" class="btn btn-primary">Добавить товар</button>
</form>
