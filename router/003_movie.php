<?php

/**
 * Show all movies.
 */
$app->router->get("movie", function () use ($app) {
    $title = "Movie database | oophp";

    $app->db->connect();

    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $data["res"] = $res;

    // $app->view->add("movie/index", $data);
    // $app->page->render($data);

    $app->page->add("anax/v2/movie/index", $data);

    return $app->page->render([
        "title" => $title,
    ]);
});