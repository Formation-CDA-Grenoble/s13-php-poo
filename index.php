<?php

require_once 'services/Database.php';

require_once 'models/Article.php';
require_once 'models/Category.php';

require_once 'controllers/ArticleController.php';

$uri = $_SERVER['REQUEST_URI'];

if (preg_match('/^\/articles(.*)$/', $uri, $matches)) {
    $articleUri = $matches[1];

    $controller = new ArticleController();

    if (empty($articleUri)) {
        $controller->list();    
    } else if (preg_match('/^\/(\d+)$/', $articleUri, $matches)) {
        $id = $matches[1];
        $controller->show($id);
    } else if ($articleUri === '/new') {
        $controller->new();
    } else if (preg_match('/^\/(\d+)\/edit/', $articleUri, $matches)) {
        $id = $matches[1];
        $controller->edit($id);
    }
    
    die();
}

echo 'Page not found';
