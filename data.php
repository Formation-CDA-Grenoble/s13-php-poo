<?php

require_once 'models/Article.php';
require_once 'models/Category.php';

function addArticleToCategory($articleId, $categoryId) {
    global $articles;
    global $categories;

    $article = $articles[$articleId];
    $category = $categories[$categoryId];

    $category->addArticle($article);
    $article->setCategory($category);
}

$categories = [
    new Category(
        'News'
    ),
    new Category(
        'Business'
    ),
    new Category(
        'Sports'
    )
];

$articles = [
    new Article(
        'My first article',
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti obcaecati quibusdam asperiores soluta dolore. Provident similique obcaecati minus qui natus officia et! Unde similique assumenda mollitia sunt voluptas cum, quae officiis? Nisi mollitia nulla aliquid, unde impedit, labore quibusdam maiores quidem, et velit blanditiis? Magni exercitationem rem asperiores sint cum.',
        'http://imgs.abduzeedo.com/files/francois/wallpapers/wpw408/abdz_infrared_arashiyama_mockup.jpg',
        $categories[1]
    ),
    new Article(
        'Tourism halted due to coronavirus',
        'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur corrupti ratione aperiam cupiditate animi, numquam, sunt omnis magnam nisi reiciendis voluptate quidem! Consequuntur repellendus cumque numquam, saepe vitae enim natus maiores, a fugit sit incidunt ad exercitationem ea suscipit impedit hic molestias rem consequatur culpa. Fugit repellat saepe cum porro.',
        'http://3.bp.blogspot.com/-2PfSfnFm34s/UEYPkEfSUdI/AAAAAAAAEwU/3O-C3gDfu_A/s1920/Beautiful-aerial-view-of-Hong-Kong-1920.jpg',
        $categories[0]
    )
];

addArticleToCategory(1, 0);
addArticleToCategory(0, 1);
