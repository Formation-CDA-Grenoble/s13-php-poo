<ul>
    <form method="post" action="/articles/new">
        <button type="submit">Create new article</button>
    </form>
    <?php foreach($articles as $article): ?>
    <li>
        <a href="/articles/<?= $article->getId() ?>">
            <?= $article->getTitle() ?>
        </a>
        <form method="post" action="/articles/<?= $article->getId() ?>/edit">
            <button type="submit">Modify</button>
        </form>
        <form method="post" action="/articles/<?= $article->getId() ?>/delete">
            <button type="submit">Delete</button>
        </form>
    </li>
    <?php endforeach; ?>
</ul>
