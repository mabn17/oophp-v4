<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

if (isset($_POST["reset"])) {
    $_SESSION = [];
    $_POST = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
    $game = new \Mabn\Dice\DiceGame();
}
if (isset($_POST["roll"])) {
    $game->players()[$game->currentPlayer()]->roll();
    $game->addToPot($game->players()[$game->currentPlayer()]->values());
    $currRoll = "Dices: " .
        implode(", ", $game->players()[$game->currentPlayer()]->values()) .
        "<br>" . "Total pot: " . array_sum($game->dicePot()) . "<br>";
    if ($game->currentPlayer() == 1) {
        $game->simulateComputerTurn();
    } else {
        if (!in_array(1, $game->dicePot())) {
            ;
        } else {
            $game->changeCurrentPlayer();
        }
    }
}
// Save the points anc changes the player
if (isset($_POST["save"])) {
    $game->players()[$game->currentPlayer()]->setPoints($game->dicePot());
    $game->changeCurrentPlayer();
    $game->isDone();
}

?><div class="mt-4">
    <div class="Score">
        <div class="row">
        <hr>
        <div class="col-8">
        <h5>Player 1</h5>
        <p><?= $game->players()[0]->points() ?></p>
        <h5>Computer</h5>
        <p><?= $game->players()[1]->points() ?></p>
        <hr>
        <h4><?= $player ?> last roll</h4>
        <p><?= $currRoll ?></p>
        </div>
        <div class="col border border-top-0 border-bottom-0 border-right-0">
        <h4><?= $player ?> previous dice rolls</h4>
        <pre><?= $game->players()[$game->currentPlayer()]->dices()[0]->printHistogram() ?></pre>
        </div>
    </div>
    <?php if ($game->isDone()) { ?>
        <p><?= $game->isDone() ?></p>
        <form method="post">
        <div class="form-group">
            <input class="btn btn-success btn-sm btn-block" type="submit" name="reset" value="Reset" />
        </div>
    </form>
    <?php } else { ?>
        <form method="post">
            <div class="form-group w-50">
                <?php if ($game->currentPlayer() == 0) { ?>
                    <input class="btn btn-primary btn-sm btn-block" type="submit" name="roll" value="Roll">
                    <input class="btn btn-secondary btn-sm btn-block" type="submit" name="save" value="Save">
                <?php } else { ?>
                    <pre><?= $game->newStats ?></pre>
                    <input class="btn btn-primary btn-sm btn-block" type="submit" name="roll" value="Sumulate PC">                    
                <?php } ?>
                <input class="btn btn-success btn-sm btn-block mt-4" type="submit" name="reset" value="Reset" />
            </div>
        </form>
    <?php } ?>
</div>
