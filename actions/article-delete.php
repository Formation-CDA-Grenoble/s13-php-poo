<?php

require_once '../models/Article.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

$article->delete();

header('Location: /views/article-list.php');
