<?php

require_once '../models/Article.php';
require_once '../models/Category.php';

$article = new Article(
    null,
    $_POST['title'],
    $_POST['content'],
    $_POST['cover'],
    Category::findById($_POST['category'])
);

$article->save();
