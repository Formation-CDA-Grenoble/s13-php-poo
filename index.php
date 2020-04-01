<?php

require_once 'services/Database.php';

require_once 'models/Article.php';
require_once 'models/Category.php';

require_once 'controllers/ArticleController.php';

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/articles') {
    $controller = new ArticleController();

    $controller->list();
    die();
}

echo 'Page not found';
