<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if (!$res) {
    return;
}

?><div class="mt-4">
<h2>Redigera</h2>
<hr>
<?php foreach ($res as $row) : ?>
    <?php $image = subStr($row->image, 4); ?>
<form method="get">
    <input type="hidden" value="edit" name="route">
    <div class="form-group row">
        <label for="id" class="col-2 col-form-label">Id</label>
        <div class="col-10">
            <input class="form-control" type="number" value="<?= $row->id ?>" id="id" readonly="readonly" name="id">
        </div>
    </div>
    <div class="form-group row">
        <label for="title" class="col-2 col-form-label">title</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?= $row->title ?>" id="title" name="title">
        </div>
    </div>
    <div class="form-group row">
        <label for="year" class="col-2 col-form-label">År</label>
        <div class="col-10">
            <input class="form-control" type="number" value="<?= $row->year ?>" id="year" name="year">
        </div>
    </div>
    <div class="form-group row">
        <label for="img" class="col-2 col-form-label">Bild Namn</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?= $image ?>" id="img" name="img">
        </div>
    </div>
    <input class="btn btn-secondary btn-md active w-50 mt-2 mb-2" type="submit" name="edit" value="Klar" />
</form>
<?php endforeach; ?>
</div>
