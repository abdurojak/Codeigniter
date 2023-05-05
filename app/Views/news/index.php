<div class="p-5">
    <h2><b><?= esc($title) ?></b></h2>


    <?php if (!empty($news) && is_array($news)) : ?>

        <?php
        $no = 1;
        ?>
        <table class="table table-dark">
            <tr class="">
                <th>
                    No
                </th>
                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Body
                </th>
                <th>
                    Show
                </th>
                <th>
                    Action
                </th>
            </tr>

            <?php foreach ($news as $news_item) : ?>
                <tr>

                    <td>
                        <?= $no++ ?>
                    </td>
                    <td>
                        <img src="/images/<?= esc($news_item['img']) ?>" alt="" style="height: auto; width: 100px">
                    </td>
                    <td>
                        <?= esc($news_item['title']) ?>
                    </td>

                    <td>
                        <?= character_limiter(esc($news_item['body']), 50) ?>
                    </td>
                    <td>
                        <a class="btn btn-outline-info btn-lg m-1" href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-warning btn-sm m-1 col-9" href="../news/update/<?= esc($news_item['id'], 'url') ?>">Edit</a>
                        <button class="btn btn-outline-danger btn-sm m-1 col-9" data-toggle="modal" data-target="#alertModal<?= esc($news_item['id']) ?>" >Delete</button>
                    </td>
                    <div class="modal fade" id="alertModal<?= esc($news_item['id']) ?>" tabindex="-1" aria-labelledby="<?= esc($news_item['id']) ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="<?= esc($news_item['id']) ?>">Are You Sure Want to Delete This Items?</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-secondary">
                                    <h5><?= esc($news_item['title']) ?></h5><br>
                                    <?= esc($news_item['body']) ?>
                                    <div class="text-center m-3">
                                    <img src="/images/<?= esc($news_item['img']) ?>" alt="Broken Image" style="height: auto; width: 400px">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a class="btn btn-danger" href="/news/delete/<?= esc($news_item['id']) ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            <?php endforeach ?>

        </table>

    <?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any news for you.</p>

    <?php endif ?>
</div>

</body>