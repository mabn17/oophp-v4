<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if (!$res) {
    return;
}

?><div class="mt-4">
<h2>Edit</h2>
<hr>
<?php foreach ($res as $row) : ?>
<form method="post">
    <input type="hidden" value="edit" name="route">
    <div class="form-group row">
        <label for="id" class="col-2 col-form-label">Id</label>
        <div class="col-10">
            <input class="form-control" type="number" value="<?= $row->id ?>" id="id" readonly="readonly" name="id">
        </div>
    </div>
    <div class="form-group row">
        <label for="title" class="col-2 col-form-label">Title</label>
        <div class="col-10">
            <input class="form-control" type="text" name="title" value="<?= $row->title ?>"/>
        </div>
    </div>
    <div class="form-group row">
        <label for="path" class="col-2 col-form-label">Path</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?= $row->path ?>" id="path" name="path">
        </div>
    </div>
    <div class="form-group row">
        <label for="slug" class="col-2 col-form-label">Slug</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?= $row->slug ?>" id="slug" name="slug">
        </div>
    </div>
    <div class="form-group row">
        <label for="data" class="col-2 col-form-label">Data</label>
        <div class="col-10">
            <textarea class="form-control" type="text" id="data" name="data" rows="5"><?= $row->data ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="type" class="col-2 col-form-label">Type</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?= $row->type ?>" id="type" name="type">
        </div>
    </div>
    <div class="form-group row">
        <label for="filter" class="col-2 col-form-label">Filter</label>
        <div class="col-10">
            <input class="form-control" type="text" value="<?= $row->filter ?>" id="filter" name="filter">
        </div>
    </div>
    <div class="form-group row">
        <label for="published" class="col-2 col-form-label">Published</label>
        <div class="col-10">
            <input class="form-control" type="datetime" value="<?= $row->published ?>" id="published" name="published">
        </div>
    </div>  
    <input class="btn btn-secondary btn-md active w-50 mt-2 mb-2" type="submit" name="edit" value="yes" />
</form>
<?php endforeach; ?>
</div>
