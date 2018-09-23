<?php
/**
 * Guess game specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing Guess my number with $_POST, rendered within the standard page layout.
 */
$app->router->any(["GET", "POST"], "dice100/start", function () use ($app) {
    $title = "Dice 100";
    $currRoll = "";

    $app->session->set('game', ($app->session->has('game') ? $app->session->get('game') : new \Mabn\Dice\DiceGame()));
    $app->session->set('game', $app->request->getPost('game', $app->session->get('game')));

    $game = $app->session->get('game');
    $player = ($game->currentPlayer() == 0) ? "Player1's " : "Computer's ";

    $data = [
        "game" => $game,
        "player" => $player,
        "currRoll" => $currRoll,
        "title" => $title,
    ];
    $app->page->add("anax/v2/dice/start", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
