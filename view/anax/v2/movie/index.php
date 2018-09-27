<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if (!$res) {
    return;
}

?><div class="mt-4">
<table class="table table-responsive-sm">
    <thead class="thead-light">
        <tr class="first">
            <th>Rad</th>
            <th>Id</th>
            <th>Bild</th>
            <th>Titel</th>
            <th>År</th>
        </tr>
    </thead>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $id ?></td>
        <td><?= $row->id ?></td>
        <td><img class="img-thumbnail" style="max-height: 115px;max-width: 115px;" src="<?= $row->image ?>"></td>
        <td><?= $row->title ?></td>
        <td><?= $row->year ?></td>
    </tr>
<?php endforeach; ?>
</table>
</div>
