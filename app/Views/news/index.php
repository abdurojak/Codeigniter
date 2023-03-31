<h2><?= esc($title) ?></h2>


<?php if (!empty($news) && is_array($news)) : ?>

    <?php 
        $no = 1;
        ?>
    <table border=1>
    <tr>    
    <th>
No
        </th>
    <th>
Title
        </th>
        <th>
Body
        </th>
        <th>
Link
        </th>
    </tr>

        <?php foreach ($news as $news_item) : ?>
            <tr>

            <td>
                <?=$no++?>
            </td>
                <td>
                    <?= esc($news_item['title']) ?>
                </td>

                <td>
                    <?= esc($news_item['body']) ?>
                </td>
                <td>
                    <a href="/news/<?= esc($news_item['slug'], 'url') ?>">View article</a>
                </td>

            </tr>
        <?php endforeach ?>

    </table>

<?php else : ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>