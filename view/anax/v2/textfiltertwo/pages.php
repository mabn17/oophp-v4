<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if (!$res) {
    return;
}

?><div class="mt-4">
    <table class="table table-responsive-sm border border-top-0 border-bottom-0 border-right-0">
    <thead class="thead-light">
        <tr class="first">
            <th>Id</th>
            <th>Title</th>
            <th>Type</th>
            <th>Status</th>
            <th>Published</th>
            <th>Deleted</th>
        </tr>
    </thead>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><a href="?route=<?= $row->path ?>"><?= $row->title ?></a></td>
        <td><?= $row->type ?></td>
        <td><?= $row->status ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->deleted ?></td>
    </tr>
<?php endforeach; ?>
</table>
</div>

