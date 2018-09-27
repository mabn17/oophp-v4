<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

?><div class="mt-4">
<h2>Lägg till en ny Film</h2>
<hr>
<form method="get">
    <input type="hidden" value="add" name="route">
    <div class="form-group row">
        <label for="titel" class="col-2 col-form-label">Titel</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" id="titel" name="title">
        </div>
    </div>
    <div class="form-group row">
        <label for="year" class="col-2 col-form-label">År</label>
        <div class="col-10">
            <input class="form-control" type="number" value="" id="year" name="year">
        </div>
    </div>
    <div class="form-group row">
        <label for="img" class="col-2 col-form-label">Bild Namn</label>
        <div class="col-10">
            <input class="form-control" type="text" value="noimage.png" id="img" name="img">
        </div>
    </div>
    <input class="btn btn-secondary btn-md btn-block w-25 mt-4" type="submit" name="add" value="Lägg till" />
</form>
</div>
