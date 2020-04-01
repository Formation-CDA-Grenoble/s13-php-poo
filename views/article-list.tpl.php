<ul>
    <?php foreach($articles as $article): ?>
    <li>
        <a href="/articles/<?= $article->getId() ?>">
            <?= $article->getTitle() ?>
        </a>
        <form method="post" action="../views/article-edit.php?id=<?= $article->getId() ?>">
            <button type="submit">Modify</button>
        </form>
        <form method="post" action="../actions/article-delete.php?id=<?= $article->getId() ?>">
            <button type="submit">Delete</button>
        </form>
    </li>
    <?php endforeach; ?>
</ul>
