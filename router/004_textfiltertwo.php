<?php
/**
 * Content specific routes.
 */

//var_dump(array_keys(get_defined_vars()));

$app->router->any(["GET", "POST"], "textfiltertwo", function () use ($app) {
    $app->page->add("anax/v2/textfiltertwo/header");
    $app->db->connect();
    
    $sql = "SELECT * FROM content ORDER BY deleted;";
    $res = $app->db->executeFetchAll($sql);
    $data["res"] = $res;

    $title = "Content || oophp";
    $data["title"] = $title;

    $isLoggedIn = $app->session->get("username");
    $route = $app->request->getGet("route", "");
    $id = $app->request->getGet("id");

    switch ($route) {
        case "":
            $app->page->add("anax/v2/textfiltertwo/index", $data);
            break;

        case "admin":
            if (!$isLoggedIn) {
                $app->page->add("anax/v2/textfiltertwo/login", $data);
            } else {
                $app->page->add("anax/v2/textfiltertwo/admin", $data);
            }
            break;

        case 'delete':
            if (!$isLoggedIn) {
                $app->response->redirect('login');
            }

            if ($app->request->getGet('delete') == 'yes') {
                $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
                $app->db->execute($sql, [$id]);

                $app->response->redirect('textfiltertwo?route=admin');
            }

            $sql = "SELECT * FROM content WHERE id LIKE ?;";
            $res = $app->db->executeFetchAll($sql, [$id]);
            $data["res"] = $res;

            $app->page->add("anax/v2/movie/delete", $data);
            break;

        case 'edit':
            if (!$isLoggedIn) {
                $app->response->redirect('login');
            }

            if ($app->request->getPost('edit') == 'yes') {
                $params = getAllParams($app);

                $params["slug"] = checkSlug($app, $res, $params);
                $params['path'] = checkPath($app, $res, $params);
                $params['published'] = $params['published'] == "" ? null : $params['published'];

                $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
                $res = $app->db->execute($sql, array_values($params));
                $data["res"] = $res;
                $app->response->redirect('textfiltertwo');
            }

            $sql = "SELECT * FROM content WHERE id LIKE ?;";
            $res = $app->db->executeFetchAll($sql, [$id]);
            $data["res"] = $res;
            $app->page->add("anax/v2/textfiltertwo/edit", $data);
            break;

        case 'add':
            if ($app->request->getGet('add') == 'yes') {
                $sql = "INSERT INTO content (title) VALUES (?);";
                $app->db->execute($sql, [$app->request->getGet('title')]);
                $id = $app->db->lastInsertId();

                $app->response->redirect("textfiltertwo?route=edit&id=$id");
            }

            $app->page->add("anax/v2/textfiltertwo/add", $data);
            break;
        
        case "ree":
            $sql = "CALL resetContent();";
            $app->db->execute($sql);
            $app->response->redirect("textfiltertwo");
            break;

        case 'pages':
            $sql = getAllPagesSql();
            $res = $app->db->executeFetchAll($sql, ["page"]);
            $data["res"] = $res;
            $app->page->add("anax/v2/textfiltertwo/pages", $data);
            break;

        case 'blog':
            $sql = getAllBlogPostsSql();
            $res = $app->db->executeFetchAll($sql, ["post"]);
            $data["res"] = $res;
            $app->page->add("anax/v2/textfiltertwo/blog", $data);
            break;

        default:
            //  Matches blog/slug, display content by slug and type post
            if (substr($route, 0, 5) === "blog/") {
                $sql = getSpesificBlogPost();

                $slug = substr($route, 5);
                $res = $app->db->executeFetch($sql, [$slug, "post"]);
                if (!$res) {
                    $data["title"] = "404";
                    $app->response->redirect('anax/v2/textfiltertwo/404', $data);
                    break;
                }
                $title = $res->title;
                $data["res"] = $res;
                $app->page->add("anax/v2/textfiltertwo/blogpost", $data);
            } else {
                $sql = getSpesificPage();

                $res = $app->db->executeFetch($sql, [$route, "page"]);
                if (!$res) {
                    $data["title"] = "404";
                    $app->response->redirect('404', $data);
                    break;
                }
                $title = $res->title;
                $data["res"] = $res;
                $app->page->add("anax/v2/textfiltertwo/page", $data);
            }
            break;
    };

    return $app->page->render([
        "title" => $title,
    ]);
});
