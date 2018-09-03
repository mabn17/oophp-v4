<?php

/* namespace Mabn\Guess;

// Mini-game "Guess my number" Using $_GET
include(__DIR__ . "/config.php");
include(__DIR__ . "/../../vendor/autoload.php");

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

$info = "Guess a number between 1 and 100, {$game->tries()} you have left."; */
