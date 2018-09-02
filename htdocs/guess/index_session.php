<?php
/**
 * Mini-game "Guess my number" Using $_SESSION 
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

// Setting up
$title = "Guess my number (SESSION)";

// Starting SESSION
session_name("mabn17");
session_start();


// Setting up
$title = "Guess my number (SESSION)";
$response = "";
$err = "";


$_SESSION["number"] = (isset($_SESSION["number"]) ? $_SESSION["number"] : -1);
$_SESSION["tries"] = (isset($_SESSION["tries"]) ? $_SESSION["tries"] : 6);
/* $_SESSION["guess"] = (isset($_SESSION["guess"]) ? $_SESSION["guess"] : null); */

// Get variables
$_SESSION["number"] = (isset($_POST["number"]) ? $_POST["number"] : $_SESSION["number"]);
$_SESSION["tries"] = (isset($_POST["tries"]) ? $_POST["tries"] : $_SESSION["tries"]);

$guess = (isset($_POST["guess"]) ? $_POST["guess"] : null);
$number = $_SESSION["number"];
$tries = $_SESSION["tries"];


// Starting the game
$game = new Guess($number, $tries);

// Makes the guess
if (isset($_POST["makeGuess"])) {
    $err = "";

    try {
        $response = $game->makeGuess($guess);
        $_SESSION["tries"] = $game->tries();
    } catch (GuessException $e) {
        $err = "You can only guess a number between 1 and 100.";
    }
}

// Displays the answer
if (isset($_POST["showCheat"])) {
    $response = "Cheat: $number";
}

if (isset($_POST["reset"])) {
    $_SESSION = [];

    // If its desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not only the data!
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

    // And now, destorys the session.
    session_destroy();
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
    .r { margin-left: -0px !important; }
    a { font-weight: bold; }
    a:visited { color: blue; }
</style>
<div>
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