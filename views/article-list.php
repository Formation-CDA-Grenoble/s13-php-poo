<?php

require_once '../models/Article.php';

$articles = Article::findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <?php foreach($articles as $article): ?>
        <li>
            <?= $article->getTitle() ?>
            <form method="post" action="../views/article-edit.php?id=<?= $article->getId() ?>">
                <button type="submit">Modify</button>
            </form>
            <form method="post" action="../actions/article-delete.php?id=<?= $article->getId() ?>">
                <button type="submit">Delete</button>
            </form>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>