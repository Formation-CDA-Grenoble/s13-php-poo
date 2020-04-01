<?php

require_once 'services/Database.php';
require_once 'services/Router.php';

require_once 'models/Article.php';
require_once 'models/Category.php';

require_once 'controllers/AbstractController.php';
require_once 'controllers/ArticleController.php';
require_once 'controllers/ErrorController.php';

$uri = $_SERVER['REQUEST_URI'];

$router = new Router();

$match = $router->match($uri);

if (is_null($match)) {
    $params = [];
    $controllerName = ErrorController::class;
    $methodName = 'notFound';
} else {
    $controllerInfo = array_shift($match);

    list($controllerName, $methodName) = explode('#', $controllerInfo);

    $params = $match;
}

$controller = new $controllerName;
$controller->$methodName(...$params);

die();
