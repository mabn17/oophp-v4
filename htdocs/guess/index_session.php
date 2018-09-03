<?php

/* namespace Mabn\Guess;

// Mini-game "Guess my number" Using $_SESSION
include(__DIR__ . "/config.php");
include(__DIR__ . "/../../vendor/autoload.php");

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
// $_SESSION["guess"] = (isset($_SESSION["guess"]) ? $_SESSION["guess"] : null);

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

$info = "Guess a number between 1 and 100, {$game->tries()} you have left."; */
