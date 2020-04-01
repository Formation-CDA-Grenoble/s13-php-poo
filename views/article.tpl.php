<h1><?= $article->getTitle() ?></h1>
<img src="<?= $article->getCover() ?>" />
<p>
    <?= $article->getContent() ?>
</p>
<div>
    Published in <?= $article->getCategory()->getName() ?> on <?= $article->getCreatedAt()->format('Y-m-d H:i:s') ?>
</div>
<a href="/articles/">
    Back to list
</a>
