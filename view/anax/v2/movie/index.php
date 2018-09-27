<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if (!$res) {
    return;
}

//printTable($res)
?><div class="mt-5">
<div class="row mb-3">
    <div class="col-12 col-md-10 col-md-8">
        <form class="card card-sm" method="get">
            <input type="hidden" name="route" value="search">
            <div class="card-body row no-gutters align-items-center">
                <div class="col-auto">
                   <!--  <i class="fas fa-search h4 text-body"></i> -->
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="Sök på titel eller årtal">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-secondary btn-lg rounded" type="submit">Sök</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
<!--end of col-->
</div>
<table class="table table-responsive-sm border border-top-0 border-bottom-0 border-right-0">
    <thead class="thead-light">
        <tr class="first">
            <th>Id</th>
            <th>Bild</th>
            <th>Titel</th>
            <th>År</th>
            <th>Ta bort / Redigera</th>
        </tr>
    </thead>
<?php $id = -1; foreach ($res as $row) :
    $id++; ?>
    <tr>
        <td><?= $row->id ?></td>
        <td><img class="img-thumbnail" style="max-height: 115px;max-width: 115px;" src="<?= $row->image ?>"></td>
        <td><?= $row->title ?></td>
        <td><?= $row->year ?></td>
        <td>
            <a href="?route=delete&id=<?= $row->id ?>" class="mr-5 ml-2">&#128465;</a>
            <a href="?route=edit&id=<?= $row->id ?>">&#x270D;</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<a href="?route=add" class="btn btn-secondary btn-md active w-50 mt-2 mb-2" role="button" aria-pressed="true">Lägg till en film</a>
</div>
