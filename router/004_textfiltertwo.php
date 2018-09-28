<?php
/**
 * Guess game specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing Guess my number with $_POST, rendered within the standard page layout.
 */
$app->router->any(["GET", "POST"], "textfiltertwo", function () use ($app) {
    $title = "Dice 100";

    $data = [
        "title" => $title,
    ];

    $app->page->add("anax/v2/textfiltertwo/index", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});
