<div class="p-5">

<h2>Edit news item</h2>
<form action="/news/edit" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label class="form-label" for="title">Title</label>
    <input class="form-text" type="input" name="title" value="<?= esc($news['title']) ?>">
    <br>

    <input type="hidden" name="id" value="<?= esc($news['id']) ?>">
    <label class="form-label" for="body">Text</label>
    <textarea class="form-floating" name="body" cols="45" rows="4"><?= esc($news['body']) ?></textarea>
    <br>

    <label for="image">Change Image?</label>
    <input class="form-control" type="file" name="image" value="<?= esc($news['img']) ?>>" accept=".png, .jpg, .jpeg">
    <br>
    <input class="form-control" type="hidden" name="image-old" value="<?= esc($news['img']) ?>">
    <img src="/images/<?= esc($news['img']) ?>" alt="" style="height: 100px; width: auto">
    <input type="checkbox" id="image-delete" name="image-delete" value="yes"> <label for="image-delete">Delete Image?</label>
    <br>
    <br>

    <input class="btn btn-dark"  type="submit" name="submit" value="Edit item">
</form>
</div>