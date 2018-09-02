<?php
/**
 * Mini-game "Guess my number" Using $_GET 
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

// Setting up
$title = "Guess my number (GET)";
$response = "";
$err = "";

// Get variables
$number = (isset($_GET["number"]) ? $_GET["number"] : -1);
$tries = (isset($_GET["tries"]) ? $_GET["tries"] : 6);
$guess = (isset($_GET["guess"]) ? $_GET["guess"] : null);


// Starting the game
$game = new Guess($number, $tries);

// Makes the guess
if (isset($_GET["makeGuess"])) {
    $err = "";

    try {
        $response = $game->makeGuess($guess);
    } catch (GuessException $e) {
        $err = "You can only guess a number between 1 and 100.";
    }
}

// Displays the answer
if (isset($_GET["showCheat"])) {
    $response = "Cheat: $number";
}

if (isset($_GET["reset"])) {
    $game->random();
}

$info = "Guess a number between 1 and 100, {$game->tries()} you have left.";
?>

<!doctype html>
<title></title>
<style>
    body { width: 80%; font-size: 1.2rem;}
    input[type=number] { margin-left:15px; width: 40%; height: 20px; text-align:center; cursor:pointer;
    display:block; }
    input[type=submit] { margin-top: 5px; margin-left:72px; width: 12%; height: 38px; }
    div { margin-left: 15%; margin-top: 5%;}
    .c { border-radius: 15px 30px 30px 15px; }
    .g { border-radius: 15px 30px 30px 15px; }
    a { font-weight: bold; }
    a:visited { color: blue; }
</style>
<div>
<h1><?= $title ?></h1>
<p><?= $info ?></p>
<p><?= $response ?></p>
<hr>
<form method="get">
<?php if ($game->tries() != 0) {?>
    Guess: <input type="number" name="guess">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <br>
    <input class="g" type="submit" name="makeGuess" value="Guess">
    <input class="c" type="submit" name="showCheat" value="Cheat">
<?php } else { ?>
<p>You are out of guesses click <a href="?reset">here</a> to restart</p>
<p>Right number was <?= $game->number() ?></p>
<?php } ?>
</form>
<p><?= $err ?></p>
</div>