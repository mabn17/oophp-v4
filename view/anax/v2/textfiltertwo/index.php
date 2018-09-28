<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

$c = new \Mabn\TextFilterTwo\TextFilterTwo();
$text = file_get_contents(__DIR__ . "/../../../../content/om.md");

$html = $c->parse($text, "markdown");

?><div class="mt-4">
    <h1>Showing off Markdown</h1>

    <h2>Markdown source in sample.md</h2>
    <pre><?= $text ?></pre>

    <h2>Text formatted as HTML source</h2>
    <pre><?= htmlentities($html) ?></pre>

    <h2>Text displayed as HTML</h2>
    <?= $html ?>
</div>