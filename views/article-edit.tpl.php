<?php $new = !isset($article); ?>

<h1><?= $new ? 'Create new' : 'Update' ?> article</h1>
<form method="post" action="/articles/<?= $new ? 'create' : $article->getId() . '/update' ?>">
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
<a href="/articles">
    Back to list
</a>
