<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */


?><div class="mt-4">
<form method="get">
    <input type="hidden" value="add" name="route">
    <div class="form-group row">
        <label for="title" class="col-2 col-form-label">Title</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" id="title" name="title">
        </div>
    </div>
    <input class="btn btn-secondary btn-md active w-50 mt-2 mb-2" type="submit" name="add" value="yes" />
</form>
</div>
