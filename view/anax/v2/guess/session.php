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
<?php if ($game->tries() != 0) {?>
    Guess: <input type="number" name="guess">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <br>
    <input class="g" type="submit" name="makeGuess" value="Guess">
    <input class="c" type="submit" name="showCheat" value="Cheat">
<?php } else { ?>
<form action="post">
    <input type="submit" name="reset" value="Reset" />
</form>
<p>Right number was <?= $game->number() ?></p>
<?php } ?>
</form>
<p><?= $err ?></p>
</div>
