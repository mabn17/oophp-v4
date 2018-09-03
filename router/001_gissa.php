<?php
/**
 * Guess game specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing Guess my number with $_POST, rendered within the standard page layout.
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    // Mini-game "Guess my number" Using $_POST
    // Setting up
    $title = "Guess my number (POST)";
    $response = "";
    $err = "";
    // Get variables
    $number = (isset($_POST["number"]) ? $_POST["number"] : -1);
    $tries = (isset($_POST["tries"]) ? $_POST["tries"] : 6);
    $guess = (isset($_POST["guess"]) ? $_POST["guess"] : null);
    // Starting the game
    $game = new \Mabn\Guess\Guess($number, $tries);

    // Makes the guess
    if (isset($_POST["makeGuess"])) {
        $err = "";
        try {
            $response = $game->makeGuess($guess);
        } catch (Mabn\Guess\GuessException $e) {
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

    $info = "Guess a number between 1 and 100, {$game->tries()} you have left.";
    $data["game"] = $game;
    $data["info"] = $info;
    $data["response"] = $response;
    $data["err"] = $err;
    $data["title"] = $title;

    $app->page->add("anax/v2/guess/post", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
 * Showing Guess my number with $_GET, rendered within the standard page layout.
 */
$app->router->get("gissa/get", function () use ($app) {
    // Setting up
    $title = "Guess my number (GET)";
    $response = "";
    $err = "";
    // Get variables
    $number = (isset($_GET["number"]) ? $_GET["number"] : -1);
    $tries = (isset($_GET["tries"]) ? $_GET["tries"] : 6);
    $guess = (isset($_GET["guess"]) ? $_GET["guess"] : null);
    // Starting the game
    $game = new \Mabn\Guess\Guess($number, $tries);

    // Makes the guess
    if (isset($_GET["makeGuess"])) {
        $err = "";
        try {
            $response = $game->makeGuess($guess);
        } catch (Mabn\Guess\GuessException $e) {
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
    $data["game"] = $game;
    $data["info"] = $info;
    $data["response"] = $response;
    $data["err"] = $err;
    $data["title"] = $title;

    $app->page->add("anax/v2/guess/get", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});



/**
* Showing Guess my number with $_SESSION, rendered within the standard page layout.
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    // Mini-game "Guess my number" Using $_SESSION
    // Starting SESSION

    /* session_name("mabn17");
    session_start(); */

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
    $game = new \Mabn\Guess\Guess($number, $tries);
    // Makes the guess
    if (isset($_POST["makeGuess"])) {
        $err = "";
        try {
            $response = $game->makeGuess($guess);
            $_SESSION["tries"] = $game->tries();
        } catch (Mabn\Guess\GuessException $e) {
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
    $data["game"] = $game;
    $data["info"] = $info;
    $data["response"] = $response;
    $data["err"] = $err;
    $data["title"] = $title;

    $app->page->add("anax/v2/guess/session", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
