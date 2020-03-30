<?php

require_once 'models/Article.php';

// Crée un article à l'aide de son constructeur
$myArticle = new Article(
    'My first article',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti obcaecati quibusdam asperiores soluta dolore. Provident similique obcaecati minus qui natus officia et! Unde similique assumenda mollitia sunt voluptas cum, quae officiis? Nisi mollitia nulla aliquid, unde impedit, labore quibusdam maiores quidem, et velit blanditiis? Magni exercitationem rem asperiores sint cum.',
    'http://imgs.abduzeedo.com/files/francois/wallpapers/wpw408/abdz_infrared_arashiyama_mockup.jpg',
    'News'
);

// Crée un article à l'aide des setters
$myArticle = new Article();

$myArticle
    ->setTitle('My first article')
    ->setContent('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti obcaecati quibusdam asperiores soluta dolore. Provident similique obcaecati minus qui natus officia et! Unde similique assumenda mollitia sunt voluptas cum, quae officiis? Nisi mollitia nulla aliquid, unde impedit, labore quibusdam maiores quidem, et velit blanditiis? Magni exercitationem rem asperiores sint cum.')
    ->setCover('http://imgs.abduzeedo.com/files/francois/wallpapers/wpw408/abdz_infrared_arashiyama_mockup.jpg')
    ->setCategory('News');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $myArticle->getTitle() ?></h1>
    <img src="<?= $myArticle->getCover() ?>" />
    <p>
        <?= $myArticle->getContent() ?>
    </p>
    <div>
        Published in <?= $myArticle->getCategory() ?>
    </div>
</body>
</html>
