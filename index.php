<?php

require_once 'services/Database.php';

require_once 'models/Article.php';
require_once 'models/Category.php';

require_once 'controllers/ArticleController.php';

$uri = $_SERVER['REQUEST_URI'];

if (preg_match('/\/articles\/(\d*)/', $uri, $matches)) {
    $id = $matches[1];

    $controller = new ArticleController();
    
    if (empty($id)) {
        $controller->list();    
    } else {
        $controller->show($id);
    }
    die();
}

echo 'Page not found';
