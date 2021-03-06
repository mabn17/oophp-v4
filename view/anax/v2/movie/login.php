<?php

namespace Anax\View;

/**
 * Templet file to render a view
 */

if ($res != null) {
    $app->session->set('username', $username);
}

if ($app->session->get('username')) {
    $app->response->redirect('movie');
}

?><div class="mt-4">
<h2>Du har inte tillgång till att editira databasen</h2>
<hr>
<form method="post">
    <div class="form-group row">
        <label for="user" class="col-2 col-form-label">Användarnamn</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" id="user" name="user">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-2 col-form-label">Lösenord</label>
        <div class="col-10">
            <input class="form-control" type="password" value="" id="password" name="password">
        </div>
    </div>
    <input class="btn btn-secondary btn-md btn-block w-25 mt-4" type="submit" name="login" value="Logga in" />
</form>
</div>