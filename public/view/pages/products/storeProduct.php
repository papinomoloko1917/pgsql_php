<form action="/storeProduct" method="POST">
  <div class="mb-3">
    <label for="title" class="form-label">Название</label>
    <input name="title" type="text" class="form-control" id="title" aria-describedby="title">
    <!-- <div id="title" class="form-text">We'll never share your text with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Описание</label>
    <input name="description" type="text" class="form-control" id="description" aria-describedby="description">
    <!-- <div id="title" class="form-text">We'll never share your text with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Цена</label>
    <input name="price" type="text" class="form-control" id="price" aria-describedby="price">
    <!-- <div id="title" class="form-text">We'll never share your text with anyone else.</div> -->
  </div>

  <button type="submit" class="btn btn-primary">Добавить</button>
</form>
