<div class="p-5">

<h2>Edit news item</h2>
<form action="/news/edit" method="post">
    <?= csrf_field() ?>

    <label class="form-label" for="title">Title</label>
    <input class="form-text" type="input" name="title" value="<?= esc($news['title']) ?>">
    <br>

    <input type="hidden" name="id" value="<?= esc($news['id']) ?>">
    <label class="form-label" for="body">Text</label>
    <textarea class="form-floating" name="body" cols="45" rows="4"><?= esc($news['body']) ?></textarea>
    <br>

    <input class="btn btn-dark"  type="submit" name="submit" value="Edit item">
</form>
</div>