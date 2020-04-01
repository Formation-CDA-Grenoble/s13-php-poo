<?php

require_once 'services/Database.php';

require_once 'models/Article.php';
require_once 'models/Category.php';

require_once 'controllers/ArticleController.php';

$controller = new ArticleController();

$controller->list();
