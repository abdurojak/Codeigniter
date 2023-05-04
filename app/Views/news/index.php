<div class="p-5">
    <h2><?= esc($title) ?></h2>


    <?php if (!empty($news) && is_array($news)) : ?>

        <button class="btn btn-dark" onclick="location='/news/create'">Create</button>

        <?php
        $no = 1;
        ?>
        <table class="table">
            <tr>
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
                        <?= esc($news_item['body']) ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="../news/update/<?= esc($news_item['id'], 'url') ?>">Edit</a>
                        ||
                        <a class="btn btn-danger" href=" <?php echo base_url("../news/delete/") . $news_item['id']; ?>" onclick="return confirm('Delete entry?')">Delete</a>
                    </td>

                </tr>
            <?php endforeach ?>

        </table>

    <?php else : ?>

        <h3>No News</h3>

        <p>Unable to find any news for you.</p>

    <?php endif ?>
</div>
</body>