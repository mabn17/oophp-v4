<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());


?><nav class="navbar justify-content-around navbar-extend-lg navbar-light border border-top-0 border-left-0 border-right-0 sticky-top">
<?php foreach ($navbar ?? [] as $item) : ?>
    <a class="nav-link text-dark" href="<?= url($item["url"]) ?>" title="<?= $item["title"] ?>"><?= $item["text"] ?></a>
<?php endforeach; ?>
</nav>
