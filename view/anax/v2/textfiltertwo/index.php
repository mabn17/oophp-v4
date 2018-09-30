<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

$c = new \Mabn\TextFilterTwo\TextFilterTwo();
$text = file_get_contents(__DIR__ . "/../../../../content/om.md");

$html = $c->parse($text, "markdown");

?><div class="mt-4">
<table class="table table-responsive-sm border border-top-0 border-bottom-0 border-right-0">
    <thead class="thead-light">
        <tr class="first">
            <th>Id</th>
            <th>Title</th>
            <th>Path</th>
            <th>Slug</th>
            <th>type</th>
            <th>Published</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
        </tr>
    </thead>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->path ?></td>
        <td><?= $row->slug ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
    </tr>
<?php endforeach; ?>
</table>
</div>
