<?php

require_once '../models/Article.php';
require_once '../models/Category.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

$article
    ->setTitle($_POST['title'])
    ->setContent($_POST['content'])
    ->setCover($_POST['cover'])
    ->setCategory(Category::findById($_POST['category']))
;

$article->save();
