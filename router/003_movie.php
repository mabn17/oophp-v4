<?php
/**
 * Show all movies.
 */

$app->router->any(["GET", "POST"], "login", function () use ($app) {
    $title = "Login";
    $data = [];
    $res = null;
    $username = $app->request->getPost('user');
    $password = $app->request->getPost('password');
    $password = MD5($password);
    $app->db->connect();


    if ($app->request->getPost('login')) {
        $sql = "SELECT `username` FROM `login` WHERE `username` = ? AND `password` = ?";
        $res = $app->db->executeFetchAll($sql, [$username, $password]);
    }

    $data["res"] = $res;
    $data["username"] = $username;

    $app->page->add("anax/v2/movie/login", $data);
    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("movie", function () use ($app) {
    $title = "Movie database | oophp";
    $app->db->connect();
    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);
    $data["res"] = $res;

    $route = $app->request->getGet('route', "");

    $id = $app->request->getGet('id', null);
    $search = $app->request->getGet('search', "");
    $title = $app->request->getGet('title', null);
    $year = $app->request->getGet('year', null);
    $img = "img/" . $app->request->getGet('img', "noimage.png");

    $isLoggedIn = $app->session->get('username');

    switch ($route) {
        case '':
            $app->page->add("anax/v2/movie/index", $data);
            break;
        
        case 'search':
            $sql = "SELECT * FROM movie WHERE title LIKE ? OR `year` LIKE ?;";
            $res = $app->db->executeFetchAll($sql, ["%$search%", "%$search%"]);
            $data["res"] = $res;

            $app->page->add("anax/v2/movie/index", $data);
            break;
        
        case 'delete':
            if (!$isLoggedIn) {
                $app->response->redirect('login');
            }

            if ($app->request->getGet('delete') == 'yes') {
                // Delete where the id = id
                $sql = "DELETE FROM movie WHERE id LIKE ?;";
                $app->db->execute($sql, [$id]);

                $app->response->redirect('movie');
            }

            $sql = "SELECT * FROM movie WHERE id LIKE ?;";
            $res = $app->db->executeFetchAll($sql, [$id]);
            $data["res"] = $res;

            $app->page->add("anax/v2/movie/delete", $data);
            break;
        
        case 'edit':
            if (!$isLoggedIn) {
                $app->response->redirect('login');
            }

            if ($app->request->getGet('edit') == 'Klar') {
                $sql = "UPDATE movie SET 
                        title = ?,
                        `year` = ?,
                        `image` = ?
                    WHERE 
                        id = ?;"
                ;
                $res = $app->db->execute($sql, [$title, $year, $img, $id]);
                $app->response->redirect('movie');
            }

            $sql = "SELECT * FROM movie WHERE id LIKE ?;";
            $res = $app->db->executeFetchAll($sql, [$id]);
            $data["res"] = $res;
            $app->page->add("anax/v2/movie/edit", $data);
            break;
        
        case 'add':
            if (!$isLoggedIn) {
                $app->response->redirect('login');
            }

            if ($app->request->getGet('add') == 'Lägg till') {
                $sql = "INSERT INTO movie(title, `year`, `image`) VALUES (?, ?, ?);";
                $res = $app->db->execute($sql, [$title, $year, $img]);

                $app->response->redirect('movie');
            }

            $app->page->add("anax/v2/movie/add", $data);
            break;

        default:
            $app->page->add("anax/v2/movie/index", $data);
            break;
    }

    return $app->page->render([
        "title" => $title,
    ]);
});
