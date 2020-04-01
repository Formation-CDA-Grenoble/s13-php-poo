<?php

require_once '../models/Article.php';
require_once '../models/Category.php';

$new = !isset($_GET['id']);

if ($new === false) {
    $articleId = $_GET['id'];

    $article = Article::findById($articleId);
}

$categories = Category::findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $new ? 'Create new' : 'Update' ?> article</h1>
    <form method="post" action="../actions/article-<?= $new ? 'create' : 'update' ?>.php<?= $new ? '' : '?id=' . $articleId ?>">
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $new ? '' : $article->getTitle() ?>" />
        <label for="content">Article content</label>
        <textarea name="content"><?= $new ? '' : $article->getContent() ?></textarea>
        <label for="cover">Cover</label>
        <input type="text" name="cover" value="<?= $new ? '' : $article->getCover() ?>" />
        <label for="category">Category</label>
        <select name="category">
            <?php foreach($categories as $category): ?>
            <option
                value="<?= $category->getId() ?>"
                <?= !$new && $category->getId() === $article->getCategory()->getId() ? 'selected="selected"' : '' ?>
            >
                <?= $category->getName() ?>
            </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Send</button>
    </form>
</body>
</html>
