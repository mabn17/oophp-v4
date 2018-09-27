<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if (!$res) {
    return;
}

?><div class="mt-4">
<h2>Är du säker att du vill ta bort?</h2>
<hr>
<?php foreach ($res as $row) : ?>
<form method="get">
    <div class="form-group row">
        <label for="id" class="col-2 col-form-label">Id</label>
        <div class="col-10">
            <input class="form-control" type="number" value="<?= $row->id ?>" id="id" readonly="readonly">
        </div>
    </div>
    <div class="form-group row">
        <label for="titel" class="col-2 col-form-label">Titel</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?= $row->title ?>" id="titel" readonly="readonly">
        </div>
    </div>
    <div class="form-group row">
        <label for="year" class="col-2 col-form-label">År</label>
        <div class="col-10">
            <input class="form-control" type="number" value="<?= $row->year ?>" id="year" readonly="readonly">
        </div>
    </div>
    <a href="?route=delete&id=<?= $row->id ?>&delete=yes" class="btn btn-secondary btn-md active w-50 mt-2 mb-2" role="button" aria-pressed="true">Ta bort</a>
</form>
<?php endforeach; ?>
</div>
