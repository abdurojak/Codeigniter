<div class="p-5">
<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/news/create" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="p-1">
    <label for="title">Title</label>
    <input type="input" name="title" value="<?= set_value('title') ?>">
    </div>
    <div class="p-1">
    <label for="body">Text</label>
    <textarea name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
    </div>

    <div class="p-1">
    <label for="image">Image Upload</label>
    <input class="form-control" type="file" name="image" value="<?= set_value('image') ?>" accept=".png, .jpg, .jpeg">
    </div>

    <input class="btn btn-dark" type="submit" name="submit" value="Create news item">
</form>
</div>