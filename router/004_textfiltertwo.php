<?php
/**
 * Guess game specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing Guess my number with $_POST, rendered within the standard page layout.
 */
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
                // Delete where the id = id
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
                $params = [
                    "title" => $app->request->getPost('title'),
                    "path" => $app->request->getPost('path'),
                    "slug" => $app->request->getPost('slug'),
                    "data" => $app->request->getPost('data'),
                    "type" => $app->request->getPost('type'),
                    "filter" => $app->request->getPost('filter'),
                    "published" => $app->request->getPost('published'),
                    "id" => $app->request->getGet('id'),
                ];

                if (!$params["slug"]) {
                    $params["slug"] = slugify($params["title"]);
                    foreach ($res as $row) {
                        if ($row->slug == $params['slug'] && $row->id != $app->request->getGet('id')) {
                            $params['slug'] = "{$params['slug']}-{$params['id']}";
                        }
                    }
                } else {
                    foreach ($res as $row) {
                        if ($row->slug == $params['slug'] && $row->id != $app->request->getGet('id')) {
                            $params['slug'] = "{$params['slug']}-{$params['id']}";
                        }
                    }
                }
    
                if (!$params["path"]) {
                    $params["path"] = null;
                } else {
                    foreach ($res as $row) {
                        if ($row->path == $params['path'] && $row->id != $app->request->getGet('id')) {
                            $params['path'] = "{$params['path']}-{$params['id']}";
                        }
                    }
                }

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
            $sql = "
                SELECT *, 
                    CASE WHEN (deleted <= NOW()) 
                        THEN 'isDeleted' 
                    WHEN (published <= NOW()) 
                        THEN 'isPublished' ELSE 'notPublished'
                    END AS status
                FROM content 
                    WHERE `type` = ? AND path IS NOT NULL";
            $res = $app->db->executeFetchAll($sql, ["page"]);
            $data["res"] = $res;
            $app->page->add("anax/v2/textfiltertwo/pages", $data);
            break;

        case 'blog':
            $sql = "
                SELECT *,
                    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
                    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
                FROM content
                    WHERE type = ?
                ORDER BY published DESC;";
            $res = $app->db->executeFetchAll($sql, ["post"]);
            $data["res"] = $res;
            $app->page->add("anax/v2/textfiltertwo/blog", $data);
            break;

        default: // JUST ME LEFT I WILL HANDLE Spesific BLOG/PAGE POSTS
            if (substr($route, 0, 5) === "blog/") {
                //  Matches blog/slug, display content by slug and type post
                $sql = "
                    SELECT *,
                        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
                        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
                    FROM content
                    WHERE
                        slug = ?
                        AND type = ?
                        AND (deleted IS NULL OR deleted > NOW())
                        AND published <= NOW()
                    ORDER BY published DESC;";

                $slug = substr($route, 5);
                $res = $app->db->executeFetch($sql, [$slug, "post"]);
                if (!$res) {
                    $data["title"] = "404";
                    $app->response->redirect('404', $data);
                    break;
                }
                $title = $res->title;
                $data["res"] = $res;
                $app->page->add("anax/v2/textfiltertwo/blogpost", $data);
            } else {
                $sql = "
                    SELECT *,
                        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
                        DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
                    FROM content
                    WHERE
                        path = ?
                        AND type = ?
                        AND (deleted IS NULL OR deleted > NOW())
                        AND published <= NOW();";

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
