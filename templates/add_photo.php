
<div class="container">
    <h1 class="mt-5">Добавить фото в альбом</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Фото</label>
            <input type='file' name='image' id='image'>
        </div>
        <button type="submit" name='add' class="btn btn-primary">Добавить</button>
    </form>
</div>