<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

$c = new \Mabn\TextFilterTwo\TextFilterTwo();

?><div class="mt-4">
<article>
    <header>
        <h1><?= esc($res->title) ?></h1>
        <p><i>Latest update: <time datetime="<?= esc($res->modified_iso8601) ?>" pubdate><?= esc($res->modified) ?></time></i></p>
    </header>
    <?= $c->parse($res->data, $res->filter) ?>
    <hr>
</article>
</div>
