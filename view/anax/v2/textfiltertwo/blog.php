<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if (!$res) {
    return;
}

?><div class="mt-5">
<article>

<?php foreach ($res as $row) : ?>
<section class="mb-2">
    <header>
        <h1><a href="?route=blog/<?= esc($row->slug) ?>"><?= esc($row->title) ?></a></h1>
        <p><i>Published: <time datetime="<?= esc($row->published_iso8601) ?>" pubdate><?= esc($row->published) ?></time></i></p>
    </header>
    <?= esc($row->data) ?>
</section>
<hr>
<?php endforeach; ?>

</article>
</div>