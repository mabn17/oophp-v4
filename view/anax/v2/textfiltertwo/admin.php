<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */


?><div class="mt-4">
<table class="table table-responsive-sm border border-top-0 border-bottom-0 border-right-0">
    <thead class="thead-light">
        <tr class="first">
            <th>Id</th>
            <th>Title</th>
            <th>type</th>
            <th>Published</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Action</th>
        </tr>
    </thead>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><?= $row->title ?></td>
        <td><?= $row->type ?></td>
        <td><?= $row->published ?></td>
        <td><?= $row->created ?></td>
        <td><?= $row->updated ?></td>
        <td><?= $row->deleted ?></td>
        <td>
            <a href="?route=delete&id=<?= $row->id ?>" class="mr-5 ml-2">&#128465;</a>
            <a href="?route=edit&id=<?= $row->id ?>">&#x270D;</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
</div>
