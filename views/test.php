<?php

require_once '../models/Article.php';
require_once '../models/Category.php';

$article = new Article();

$article
    ->setTitle('Truc pouet')
    ->setContent('Bonjour les copains')
    ->setCover('http://2.bp.blogspot.com/-lme4WyXEZzA/UN3LR_MwoZI/AAAAAAAAQMA/JpMjDk6l9nA/s1600/Fantasy+Art+Scenery+Wallpapers+02.jpg')
    ->setCategory(new Category(1, 'News', ''))
;

$article->save();
