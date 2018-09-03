<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<div class="mt-4">
<h1><?= $title ?></h1>
<p><?= $info ?></p>
<p><?= $response ?></p>
<hr>
<form method="post">
<div class="form-group">
<?php if ($game->tries() != 0) {?>
    <label for="guess">Guess:</label>
    <input id="guess" type="number" name="guess" class="form-text text-muted form-control form-control-sm">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <br>
    <input class="btn btn-primary btn-sm btn-block" type="submit" name="makeGuess" value="Guess">
    <input class="btn btn-secondary btn-sm btn-block" type="submit" name="showCheat" value="Cheat">
<?php } else { ?>
<form action="post">
    <input class="btn btn-success btn-sm btn-block" type="submit" name="reset" value="Reset" />
</form>
<p>Right number was <?= $game->number() ?></p>
<?php } ?>
</div>
</form>
<p><?= $err ?></p>
</div>
