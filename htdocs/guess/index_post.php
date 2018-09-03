<?php

/* namespace Mabn\Guess;

// Mini-game "Guess my number" Using $_POST 
include(__DIR__ . "/config.php");
include(__DIR__ . "/../../vendor/autoload.php");

// Setting up
$title = "Guess my number (POST)";
$response = "";
$err = "";

// Get variables
$number = (isset($_POST["number"]) ? $_POST["number"] : -1);
$tries = (isset($_POST["tries"]) ? $_POST["tries"] : 6);
$guess = (isset($_POST["guess"]) ? $_POST["guess"] : null);


// Starting the game
$game = new Guess($number, $tries);

// Makes the guess
if (isset($_POST["makeGuess"])) {
    $err = "";

    try {
        $response = $game->makeGuess($guess);
    } catch (GuessException $e) {
        $err = "You can only guess a number between 1 and 100.";
    }
}

// Displays the answer
if (isset($_POST["showCheat"])) {
    $response = "Cheat: $number";
}

if (isset($_POST["reset"])) {
    $game->random();
}

$info = "Guess a number between 1 and 100, {$game->tries()} you have left."; */
